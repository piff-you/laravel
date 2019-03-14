<?php

namespace App\Http\Controllers;


#use Illuminate\Http\Request;


use Illuminate\Support\Facades\Input;

# 如果在app.php文件中定义好了门面，则直接引入名称就可以引入此类
#use Input;

class IndexController extends Controller {
    // 首页
    public function index2() {
        // 获取方法，获取所有的请求方法 get post put delete
        echo Input::get('id');
        // 获取所有的参数
        dump(Input::all());
        // 只获取部份参数  白名单
        dump(Input::only(['name', 'age']));
        // 排除不要的参数  黑名单
        dump(Input::except(['age']));
        // 判断一个key是否存在
        dump(Input::has('sex'));


        #return 'index/index';
    }

    public function index() {
        // 使用此request()函数，则可以在任意的地方来调用请求
        dump(request()->ip());
    }

    /*    public function index(Request $request) {
            // 获取单个 get post put delete
            dump($request->get('id'));
            // 获取全部
            dump($request->all());
            // 白名单
            dump($request->only(['name', 'age']));
            // 黑名单
            #dump($request->except('id')); # 单个取消
            dump($request->except(['id', 'age']));
            // 判断一个值是否存在
            dump($request->has('sex'));
            // 判断请求的类型  GET POST PUT DELETE
            dump($request->method());
            // 判断是否是指定的请求类型  布尔类型
            dump($request->isMethod('post'));
            // 查看当前server  相当于 $_SERVER
            #dump($request->server());
            // 获取当前IP
            dump($request->ip());





            # 查看当前对象中可用的方法
            #dump(get_class_methods($request));
        }*/

    public function add(Request $request) {
        // 一个方法，又能显示添加界面，又能处理添加
        if ($request->isMethod('post')) {
            dump($request->except('_token'));
            return;
        }
        $url = route('add');
        // 得到token值
        $token = csrf_field();
        return '<form action="' . $url . '" method="post">
                    ' . $token . '
                    <input type="text" name="uname">
                    <input type="submit" value="登录">
                </form>';
    }


    public function html() {

        $id = 1;
        $name = '张三';

        $data = ['id' => $id, 'name' => $name];

        #return view('index/html');
        // 关联数组
        #return view('index.html',['id'=>$id,'name'=>$name]);

        // with方法
        #return view('index.html')->with(['id'=>$id,'name'=>$name]);
        #return view('index.html')->with('id',$id)->with('name',$name);

        // compact 赋值
        return view('index.html',compact('id','name'));
    }


}
