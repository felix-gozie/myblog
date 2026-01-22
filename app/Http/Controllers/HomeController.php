<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
    {
        $featuredPosts = Post::where('is_published', true)
            ->latest()
            ->take(6)
            ->get();

        return view('pages.home', compact('featuredPosts'));
    }

}