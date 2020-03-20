<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;

/**
* 
*/
class Common extends Controller
{
	
	protected function __construct()
	{
		parent::__construct();
		$this->checkUser();
	}

    /**
     * [checkUser 检查是否登录]
     * @return [type] [description]
     */
	protected function checkUser()
	{
	    if (empty(Session::get('userinfo'))) {
            return $this->redirect(PUBLIC_PATH.'admin/login/index');
        }else{
        	$this->assign('userinfo',Session::get('userinfo'));
        }
	}

    /**
     * [getImgName 获取提交的图片名字]
     * @param  [type] $data [$_FILES]
     * @return [type] $img_anme  [返回图片的名字]
     */
	public function getImgName($data)
    {
        $filetype = ['jpg', 'jpeg', 'gif', 'bmp', 'png'];
        foreach ($data as $k => $v) {
            if($v['error'] == 0 && $v['size'] > 0){
                $type = explode('/',$v['type'])[1];
                if(in_array($type, $filetype)){
                    $img_name = uniqid().'.'.$type;
                    if(!move_uploaded_file($v['tmp_name'],IMG_PATH.$img_name)){
                        return $this->error('图片移动出错');
                    }
                    return $img_name;
                }else{
                    return $this->error('请更换图片');
                }
            }else{
                return false;
            }
        }
    }

    /**
     * [checkDataUpdata 获取修改的数据]
     * @param  [type] $post_data    [提交的数据]
     * @param  [type] $select_data [查询的数据]
     * @return [type] $res         [返回修改的数据]
     */
    protected function getDataUpdata($post_data,$select_data)
    {
        $res = [];
        foreach ($post_data as $k => $v) {
            foreach ($select_data as $k1 => $v1) {
                if($k == $k1 && $v != $v1){
                    $res[$k] = $v;
                }
            }
        }
        return $res;
    }
}