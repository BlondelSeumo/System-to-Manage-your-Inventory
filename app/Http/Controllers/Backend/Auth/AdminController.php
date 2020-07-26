<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.home.inventoryhome');
    }

    public function accountindex()
    {
        return view('backend.home.accountshome');
    }
}
