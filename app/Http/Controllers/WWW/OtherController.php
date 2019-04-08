<?php
/**
 * CLASS
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-9-3
 * Time: 16:27
 */

namespace App\Http\Controllers\WWW;


class OtherController
{
    public function family(){
        $name = Request()->session()->get('memberInfo')['username'];
        if($name != '子熙'){
            return view('errors',['errors' => "请获取权限"]);
        }
        $title = 'family';
        return view('www.other.family',['title' => $title]);
    }
}