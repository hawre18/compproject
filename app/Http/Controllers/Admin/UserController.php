<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users=User::orderby('created_at','asc')->get();
        return view('v1.index.admin.user.index',compact(['users']));
    }
    public function levelChange($id){
        $user=User::findorfail($id);
        $user->level='admin';
        $user->save();
        return back();
    }
    public function destroy($id){
        $user=User::findorfail($id);
        $user->level='admin';
        $user->delete();
        return back();
    }
}
