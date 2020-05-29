<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	$message = 'This is my little library';
    	return view('pages.index')->withMessage($message);
    }
    
}
