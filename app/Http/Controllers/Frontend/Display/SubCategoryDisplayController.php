<?php

namespace App\Http\Controllers\Frontend\Display;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryDisplayController extends Controller
{
    public function index()
    {
        return view('frontend.english.display.subcategorydisplayindex');
    }
}
