<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(Request $request){
        //每页显示5条记录
        $posts=Post::orderBy('published_at','desc')->simplePaginate(5);
        $items=[];
        foreach($posts->items() as $post){
            $item['id']=$post->id;
            $item['title']=$post->title;
            $item['summary']=$post->subtitle;
            $item['posted_at']=$post->published_at;
            $item['thumb']=url(config('blog.uploads.webpath').'/'.$post->page_image);
            $item['views']=mt_rand(1,100000);//随机
            $items[]=$item;
        }
        $data=[
            'message'=>'success',
            'articles'=>$items
        ];
        return response()->json($data);
    }
}
