<?php

namespace App\Http\Controllers\Service;

use App\Models\M3Email;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\M3Result;
use App\Entity\Category;

class BookController extends Controller
{
    public function getCategoryByParentId($parent_id)
    {
        $categorys=Category::where('parent_id',$parent_id)->get();
        $m3_result=new M3Result();
        $m3_result->status=0;
        $m3_result->message='返回成功';
        //php可以随时添加成员变量
        $m3_result->categorys=$categorys;

        return $m3_result->toJson();
    }
}
