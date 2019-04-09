<?php
/**
 * CLASS
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-7-19
 * Time: 16:44
 */

namespace App\Http\Controllers\WWW;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use App\Model\Sms;

class UserController extends Controller
{
    public function login(){
        return view('www.user.login');
    }

    public function register(){
        return view('www.user.register');
    }

    public function addMember(){
        $model = new User();
        $data = $model->add();
        if($data === true){
            return redirect('user/login');
        }else{
            return view('www.user.register',['message' => $data['message']]);
        }
    }

    public function doLogin(){
        $model = new User();
        $data = $model->doLogin();
        if($data === true){
            return redirect()->intended();
        }else{
            return view('www.user.login',['error' => $data['message']]);
        }

        /*if($data == true){
            return redirect()->intended();
        }else{
            return back()->withInput();
        }*/
    }

    public function outLogin(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function userInfo(Request $request){
        $arr = $request->session()->get('memberInfo');
        return view('www.user.info',['arr' => $arr]);
    }

    public function editInfo(){
        $model = new User();
        $data = $model->editInfo();
        if($data == true){
            return response()->json(['state' => true ,'message' => '修改成功']);
        }else{
            $messages = session('errors',['error' => ['参数错误']])->toArray();
            return response()->json(['state' => false ,'message' => $messages['error']]);
        }
    }

    public function verify(Request $request){
        $arr = $request->all();
        return view('www.user.verify',['arr' => $arr]);
    }

    public function sendMessage(){
        $model = new Sms();
        $data = $model->sendMessage();
        if($data == true){
            return response()->json(['state' => true ,'message' => '发送成功']);
        }else{
            $messages = session('errors',['error' => ['参数错误']])->toArray();
            return response()->json(['state' => false ,'message' => $messages['error']]);
        }
    }
}