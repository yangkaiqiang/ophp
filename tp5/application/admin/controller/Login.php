<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Session;

class Login extends Controller
{

	public function __construct(Request $request)
	{
        parent::__construct();
	}
    
    public function index(Request $request)
    {
        if($request->method() == 'POST'){
            $data = $request->post();
            $res = Db::name('user')->where(['username'=>$data['username'],'password'=>$data['password']])->find();
            if($res){
                Session::set('userinfo',$res);
                return $this->success('登陆成功',PUBLIC_PATH.'admin/index/index');
            }else{
                return $this->error('登陆失败');
            }
            
        }
        return $this->fetch('admin/view/index/login');
        //return view('admin/view/index/login');
    }

    public function loginOut()
    {
        Session::delete('userinfo');
        return $this->success('已退出',PUBLIC_PATH.'admin/login/index');
    }


}
