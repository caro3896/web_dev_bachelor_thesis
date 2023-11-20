<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Controller;
use Inertia\Inertia;

class MainController extends Controller
{
    // Call index page (rewards page)
    public function index()
    {
        // Render Index page
        return Inertia::render('Index');
    }

    // Call admin page
    public function admin(){
    
        // Render Admin page and send data
        return Inertia::render('Admin');    
    }
}

