<?php
/**
 * CLASS
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-7-26
 * Time: 10:31
 */

namespace App\Http\Controllers\WWW;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use QrCode;1
use SimpleSoftwareIO\QrCode\Facades\QrCode;//2

class TestController extends Controller
{
    //二维码1
    /*public function index(Request $request){
        QrCode::format('png')->size(300)->generate('weixin://wxpay/bizpayurl?pr=nSwMuyb',public_path('upload/qrcodes/qrcode.png'));
        echo "<img src='/qrcodes/qrcode.png'>";
        dd(11);

        return view('www.test.index');
    }*/

    //二维码2
    public function index(Request $request){
        return view('www.test.index');
    }
}