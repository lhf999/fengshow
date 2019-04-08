<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Library extends Model
{
    /**
     * CLASS getNewsList
     * Created by PhpStorm.
     * User: lv
     * Date: 2018-7-18
     * Time: 15:59
     */
    public function getList(){
        $type = 'news';
        $where = array();
        switch ($type){
            case 'news':
                $where['type'] = 2;
                break;
            case 'video':
                $where['type'] = 1;
                break;
            case 'audio':
                $where['type'] = 4;
                break;
            case 'image':
                $where['type'] = 3;
                break;
            default:
                break;
        }
        $select = array();
        $select[] = 'library.id';
        $select[] = 'library.name';
        $select[] = 'library.thumb';
        $select[] = 'library.describe';
        $select[] = 'library.created';
        $select[] = 'member.username';
        if(!Request()->has('search')){
            $arr = DB::table('library')
                ->select($select)
                ->where($where)
                ->leftJoin('member','library.uid','=','member.id')
                ->paginate(20)
                ->toArray();
        }else{
            $searchText = Request()->input('search');
            $arr = DB::table('library')
                ->select($select)
                ->where($where)
                ->leftJoin('member','library.uid','=','member.id')
                ->where('library.name', 'like', "%{$searchText}%")
                ->paginate(20)
                ->toArray();
        }

        $url = $url = Request()->getScheme()."://".$_SERVER['HTTP_HOST'];
        foreach ($arr['data'] as $key => $val){
            if(strpos($val['thumb'],'lorempixel') == false){
                $val['thumb'] = "<img src='".$url.$val['thumb']."' width='60' height='60' />";$url.$val['thumb'];
                $arr['data'][$key] = $val;
            }else{
                $val['thumb'] = "<img src='".$val['thumb']."' width='60' height='60' />";$url.$val['thumb'];
                $arr['data'][$key] = $val;
            }

        }
        return $arr;
    }
}
