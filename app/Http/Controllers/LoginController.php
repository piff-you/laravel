<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
    // 界面
    public function index() {
        echo storage_path('login');
        /*$token = csrf_field();
        return view('login.index', ['token' => $token]);*/
        return view('login.index');
    }

    // 验证动作
    public function login(Request $request) {

        dump($request->all());
    }
}
