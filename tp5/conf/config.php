<?php 
return [
	// 应用调试模式
    'app_debug'              => true,
    // +----------------------------------------------------------------------
    // | 模板设置
    // +----------------------------------------------------------------------

    'template'               => [
        // 模板路径
        'view_path'    => '../application/'
	],
	// 视图输出字符串内容替换
    'view_replace_str'       => [
        '__home__'=> '/tp/public/static/',
        '__IMG__'=>'/tp/public/static/img/',
        '__PUBLIC__'=> '/tp/public/index.php/'
    ],
];