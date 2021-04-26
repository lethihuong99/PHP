<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('admin.review.list');
    }
 
    public function Editproduct(){
        return view('admin.review.edit');
    }

}
