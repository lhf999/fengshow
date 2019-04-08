<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class User extends Model
{
    public function add(){
        if(!Request()->has('username')){
            $data['message'] = 'username不能为空';
            return $data;
        }
        if(!Request()->has('password')){
            $data = 'password不能为空';
            return $data;
        }
        $insert = array();
        $insert['username'] = Request()->input('username');

        $arr = DB::table('member')->where($insert)->first();
        if($arr){
            $data['message'] = '用户名已存在';
            return $data;
        }
        $insert['password'] = encrypt(base64_decode(Request()->input('password')));

        $re = DB::table('member')->insert($insert);
        if(!$re){
            $data['message'] = '添加失败';
            return $data;
        }
        return true;

    }

    public function doLogin(){
        if(!Request()->has('username') || Request()->input('username') == null){
            $data['message'] = 'username不能为空';
            return $data;
        }
        if(!Request()->has('password') || Request()->input('password') == null){
            $data['message'] = 'password不能为空';
            return $data;
        }
        $where = array();
        $where['username'] = Request()->input('username');
        $arr = DB::table('member')->where($where)->first();
        if(!$arr){
            $data['message'] = '用户名不存在';
            return $data;
        }
        $password = Request()->input('password');
        $newPassword = base64_decode($password);
        if($newPassword != decrypt($arr['password'])){
            $data['message'] = '密码错误';
            return $data;
        }
        Request()->session()->put('memberInfo',$arr);
        return true;
    }

    public function editInfo(){
        $data = request()->all();
        $id = intval(Request()->session()->get('memberInfo')['id']);
        if(!empty($data['_token'])){
            unset($data['_token']);
        }
        $re = DB::table('member')->where('id',$id)->update($data);
        if(!$re){
            $data['message'] = '修改失败';
            return $data;
        }
        $arr = Request()->session()->get('memberInfo');
        Request()->session()->flush();
        Request()->session()->put('memberInfo',array_merge($arr,$data));
        return true;
    }
}
