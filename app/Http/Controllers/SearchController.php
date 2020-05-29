<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;
class SearchController extends Controller
{

	public function results(){
		return view('searches.results');
	}

	public function getSearch(){
		return view('searches.search');
	}
    public function postSearch(Request $request){
    	$query = $request->get('query');

    	$books = DB::table('books')
    				->where('title','like',"%$query%")
    				->orWhere('series_title','like',"%$query%")
    				->get();

    	return view('searches.results',compact('books'));
    }

}
