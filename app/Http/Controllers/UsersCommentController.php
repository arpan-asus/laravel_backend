<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersCommentController extends Controller
{
    public function getUsersComment(){
        return view('admin.userscomment.UserComment');
    }
}
