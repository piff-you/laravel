<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 前台首页
    public function welcome() {

        return 'index/index/welcome';
    }

    public function aa() {
        return 'aa';
    }

    public function bb() {
        return 'bb';
    }
}
