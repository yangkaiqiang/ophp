<?php
namespace app\admin\controller;

use app\admin\controller\Common as adminCommon;
use think\Request;
use think\Db;
use think\Session;

class Index extends adminCommon
{
	public function __construct(Request $request)
	{
        parent::__construct();
	}

    public function index(Request $request)
    {
    	return $this->fetch('admin/view/index/home');
		//return view('admin/view/index/home',['userinfo'=>$data]);
    }
}