<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $user = Auth::user();
        if (is_null($user->type_id) || is_null($user->target)) {
            return redirect('/setting');
        } else {
            if(is_null($user->way_id)){
                $message = 'まだ金融の方法が決まっていないようですね。金融方法診断を受けてみませんか？';
                return view('index', compact('message', 'user'));
            } else {
                return view('index', compact('user'));
            }
        }
    }
    
}
