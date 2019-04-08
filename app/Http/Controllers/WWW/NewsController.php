<?php

namespace App\Http\Controllers\WWW;

use App\Http\Controllers\Controller;
use App\Model\Library;
use App\Library as Articles;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(){
        $type = Request()->path();
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
                return view('errors',['errors' => "类型有误"]);
                break;
        }
        $title = $name;
        return view('www.'.$type.'.index',['title' => $title]);
    }

    public function getList(){
        $model = new Library();
        $data = $model->getList();
        if($data != false){
            return $data;
        }else{
            $messages = session('errors',['error' => ['参数错误']])->toArray();
            return response()->json(['state' => false ,'message' => $messages['error']]);
        }
    }

    public function all()
    {
        //$article = Articles::latest()->get();
        $article = Articles::latest()->paginate(15);
        $title = '全部资源';
        return view('www.index.allnews',compact('article','title'));
    }

    public function insert()
    {
        //接受参数
        $list = Request()->input();
        //模拟数据
        if(empty($list['_token'])){
            $arr['_token'] = 'uuSXChnGiFCzqAaQczyVtaHTLnOmOo2e0AQfHZtV';
        }else{
            $arr['_token'] = $list['_token'];
        }

        if(!empty($list['city'])){
            $arr['city'] = $list['city'];
        }else{
            $arr['city'] = '北京市';
        }
        //小区id
        if(!empty($list['xiaoqu_id'])){
            $arr['xiaoqu_id'] = $list['xiaoqu_id'];
        }else{
            $arr['xiaoqu_id'] = '8211';
        }

        //详细门牌号
        if(!empty($list['doorplate'])){
            $arr['doorplate'] = $list['doorplate'];
        }else{
            $arr['doorplate'] = '101-2';
        }

        if(!empty($list['landlord_phone'])){
            $arr['landlord_phone'] = $list['landlord_phone'];
        }else{
            $arr['landlord_phone'] = '17689569856';
        }

        if(!empty($list['landlord_name'])){
            $arr['landlord_name'] = $list['landlord_name'];
        }else{
            $arr['landlord_name'] = '张先生';
        }
        //卧室数量
        if(!empty($list['record_bedroom_num'])){
            $arr['record_bedroom_num'] = $list['record_bedroom_num'];
        }else{
            $arr['record_bedroom_num'] = '3';
        }
        //客厅数量
        if(!empty($list['record_keting_num'])){
            $arr['record_keting_num'] = $list['record_keting_num'];
        }else{
            $arr['record_keting_num'] = '1';
        }
        //卫生间数量
        if(!empty($list['record_toilet_num'])){
            $arr['record_toilet_num'] = $list['record_toilet_num'];
        }else{
            $arr['record_toilet_num'] = '1';
        }
        //房屋面积
        if(!empty($list['record_area'])){
            $arr['record_area'] = $list['record_area'];
        }else{
            $arr['record_area'] = '25';
        }
        //备注
        if(!empty($list['recorder_note'])){
            $arr['recorder_note'] = $list['recorder_note'];
        }else{
            $arr['recorder_note'] = '';
        }
        dd($arr);
        $referer = 'https://www.dankegongyu.com/u/house-resource/add';
        $re = $this->requestCurl(http_build_query($arr),$referer);
        dd($re);

    }
}
