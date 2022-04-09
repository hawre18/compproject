<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class BlogController extends Controller
{
    public function indexNews(){
        return view('v1.index.users.newslist');
    }
    public function technologyIndex(){
        return view('v1.index.users.technologylist');
    }
    public function articleIndex(){
        return view('v1.index.users.articlelist');
    }
    public function newsDetails($id){
        $news=News::findorfail($id)->first();
        return view('v1.index.users.newsdetails',compact(['news']));
    }
}
