<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Hello, and Welcome';
        //return view('pages.index', compact('title')); We can use this or the following:
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Me!';
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = [
            'title' => 'Services',
            'services' => ['Web Design', 'SEO', 'e-Commerce', 'Front-End', 'Full Stack']
        ];
        return view('pages.services')->with($data);
    }
}
