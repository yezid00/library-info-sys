<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	$message = 'This is an information retrival system';
    	return view('pages.index')->withMessage($message);
    }
    public function store($Request){
    	
    }
}
