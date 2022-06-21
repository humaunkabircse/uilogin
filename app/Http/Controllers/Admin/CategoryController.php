<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Constructor 
    public function __construct()
    {
        $this->middleware('auth');
    }
}
