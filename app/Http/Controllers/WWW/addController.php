<?php
/**
 * CLASS
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-8-28
 * Time: 15:57
 */

namespace App\Http\Controllers\WWW;
use App\Http\Controllers\Controller;

class addController extends Controller
{
    public function index(){
        $type = Request()->route('type');
        switch ($type){
            case 'news':
                $name = '图文';
                break;
            case 'video':
                $name = '视频';
                break;
            case 'audio':
                $name = '音频';
                break;
            case 'image':
                $name = '图片';
                break;
            default:
                $name = '全部资源';
                break;
        }
        $title = "添加{$name}素材";
        return view("www.$type.add",['title' => $title]);
    }
}