<?php
namespace app\admin\controller;

use app\admin\controller\Common as adminCommon;
use think\Request;
use think\Db;
use think\Session;

class User extends adminCommon
{
	public function __construct(Request $request)
	{
        parent::__construct();
	}

    public function index(Request $request)
    {
    	$data = Db::name('user')->select();
        //print_r($data);exit;
    	return $this->fetch('admin/view/user/index',['data'=>$data]);
		//return view('admin/view/index/home',['userinfo'=>$data]);
    }

    public function add(Request $request)
    {
        if($request->method() == 'POST'){
            $data = $request->post();
            $name = $this->getImgName($_FILES);
            $data['user_img'] = $name;
            $res = Db::name('user')->insert($data);
            if($res){
                return $this->success('添加成功',PUBLIC_PATH.'admin/user/index');
            }else{
                return $this->error('添加失败',PUBLIC_PATH.'admin/user/add');
            }
        }
        return $this->fetch('admin/view/user/add');
        //return view('admin/view/index/home',['userinfo'=>$data]);
    }

    public function edit($id,Request $request)
    {
        if(!is_numeric($id)){
            return $this->error('参数错误',PUBLIC_PATH.'admin/user/index');
        }
        $up_data = Db::name('user')->find(['id'=>$id]);
        if (empty($up_data)) {
            return $this->error('没有对应的数据',PUBLIC_PATH.'admin/user/index');
        }
        $this->assign('id',$id);
        $this->assign('data',$up_data);
        if($request->method() == 'POST'){
            $data = $request->post();
            $name = $this->getImgName($_FILES);
            if($name){
                $data['user_img'] = $name;
            }else{
                $data['user_img'] = $up_data['user_img'];
            }
            $update_data = $this->getDataUpdata($data,$up_data);
            if($update_data){
                $res = Db::name('user')->where('id',$id)->update($data);
                if($res){
                    return $this->success('修改成功',PUBLIC_PATH.'admin/user/index');
                }else{
                    return $this->error('修改失败',PUBLIC_PATH.'admin/user/index');
                }
            }else{
                return $this->success('无操作',PUBLIC_PATH.'admin/user/index');
            }
        }
        return $this->fetch('admin/view/user/edit');
        //return view('admin/view/index/home',['userinfo'=>$data]);
    }

    public function del($id,Request $request)
    {
        if($id == 1){
            return $this->error('管理员无法删除',PUBLIC_PATH.'admin/user/index');
        }else if($id == Session::get('userinfo')['id']){
            return $this->error('无法删除正在登陆的用户',PUBLIC_PATH.'admin/user/index');
        }else{
            $res = Db::name('user')->where('id',$id)->delete();
            if($res){
                return $this->success('删除成功',PUBLIC_PATH.'admin/user/index');
            }else{
                return $this->error('删除失败',PUBLIC_PATH.'admin/user/index');
            }
        }
        //print_r($request->instance()->param());exit;
        //return $this->fetch('admin/view/user/add');
        //return view('admin/view/index/home',['userinfo'=>$data]);
    }
}