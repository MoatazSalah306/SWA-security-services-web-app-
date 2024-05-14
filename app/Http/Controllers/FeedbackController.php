<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class FeedbackController extends Controller
{
    public function index(){
        $currentUserId = Auth::user()->id;
        $users = User::all();
        $feedback = Feedback::all();
        return view("feedback.index",["feedback"=>$feedback,"users"=>$users,"current_user_id"=>$currentUserId]);
    }

    public function create(){
        return view("feedback.create");
    }

    public function store(){
       try {
        Feedback::create([
            "user_id"=>Auth()->user()->id,
            "body"=>request()->body,
        ]);
        return to_route("feedback.index");
       } catch (\Throwable $th) {
         return abort(510,"THERE IS A PROBLEM OCCURED!!");
       }
    }
}
