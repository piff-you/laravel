<?php

// 默认就是了csrf验证功能，提高网站的安全级别
/*Route::any('/aaa', function () {
    if (!empty($_POST['uname'])) {
        echo $_POST['uname'];
    }
    return '<form action="" method="post">
    <input type="text" name="uname">
    <input type="submit" value="登录">
</form>';
});*/


// GET   只有它不进行csrf验证
/*// http状态码  200
Route::get('/req',function (){
    return '我就是一个GET请求';
});

// POST 进行csrf验证  实验的时候要排除csrf验证才可以进行下去
// post请求用于 数据的添加  http状态码  201
Route::post('/req',function (){
    return '我就是一个POST请求';
});

// PUT  进行csrf验证
// 数据的更新 修改 http状态码  202
Route::put('/req',function (){
    return '我就是一个PUT请求';
});

// DELETE  进行csrf验证
// 数据的删除  http状态码  204
Route::delete('/req',function (){
    return '我就是一个DELETE请求';
});*/


// 匹配所有请求 工作不用  不安全
/*Route::any('/req',function (){
    echo $_SERVER['REQUEST_METHOD'];
});*/

// 一次性匹配多种请求类型
/*Route::match(['get','post'],'/req',function (){
    echo $_SERVER['REQUEST_METHOD'];
});*/


// 路由参数
// 必传参数 如果不传则报异常
/*Route::get('art/{id}',function ($id){
    dump($id);
});*/
/*// 可选参数 可以不传，如果函数中有参数，一定要加默认值
Route::get('art/{id?}',function ($id = 0){
    dump($id);
});*/
// 参数限制 laravel路由提供
/*Route::get('art/{id}',function ($id){
    dump($id);
})->where(['id'=>'\d+']);*/

// php7之后可以有在函数或方法中添加参数限制  推荐用此方法
/*Route::get('art/{id}',function (int $id){
    dump($id);
});*/




// 路由别名
/*
/article/1
/about/1/2/3
/news/12 = /xinwen/12 = xw

<a href="/news/12">新闻</a>
<a href="/xinwen/12">新闻</a>
<a href="xw/12">新闻</a>

权限 超管【xw,ls】
普通管理员 【xw】
*/

/*Route::get('i',function (){
    // 根据路由别名生成相对应的URL地址
    $url = route('news',['name'=>'aaa']);
    return '<a href="'.$url.'">去新闻页</a>';
})->name('index');

Route::get('n',function (){
    // 根据路由别名生成相对应的URL地址
    $url = route('index',['name'=>'bbb']);
    return '<a href="'.$url.'">去首页</a>';
})->name('news');*/


// 路由组之路由前缀
/*
admin/login
admin/logout
admin/index/index
admin/index/welcome
*/
/*Route::get('admin/login',function(){
    return 'admin/login';
});
Route::get('admin/logout',function(){
    return 'admin/logout';
});*/
// 路由分组前缀
/*Route::group(['prefix'=>'admin'],function(){

    Route::get('login',function(){
        return 'admin/login';
    });
    Route::get('logout',function(){
        return 'admin/logout';
    });

    // 分组可以嵌套的，但是不要嵌套太多的层级，3层最大了
    Route::group(['prefix'=>'index'],function(){

        Route::get('index',function(){
            return 'admin/index/index';
        });
        Route::get('welcome',function(){
            return 'admin/index/welcome';
        });
    });
});*/


// 控制器路由
//Route::get('index','IndexController@index')->name('index.index');

/*// 自定义控制器模块目录路由的定义
Route::get('welcome','Index\IndexController@welcome')->name('index.welcome');

// 分组之命名空间
Route::group(['namespace'=>'Index'],function(){
    Route::get('aa','IndexController@aa')->name('index.aa');
    Route::get('bb','IndexController@bb')->name('index.bb');
});
*/


Route::any('index','IndexController@index')->name('index.index');

// 添加用户
Route::match(['get','post'],'add','IndexController@add')->name('add');


// 视图
Route::get('html','IndexController@html')->name('html');


// 用户登录
// 显示界面
Route::get('login','LoginController@index')->name('login');
// 验证动作
Route::post('login','LoginController@login')->name('login');




















