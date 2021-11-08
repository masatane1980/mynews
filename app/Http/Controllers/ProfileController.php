<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $profileline = $posts->shift();
        }else{
            $profileline = null;
        }
        
        return view('profile.index', ['profileline' => $profileline, 'posts' => $posts]);
    }
}
