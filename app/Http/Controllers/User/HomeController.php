<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\News;

class HomeController extends Controller
{
    public function index(){
        $coustmers=Customer::with('image')->get();
        $news=News::with('image')->get();
        return view('v1.index.users.index',compact(['coustmers','news']));
    }
    public function contact(){
        return view('v1.index.users.contact');
    }
}
