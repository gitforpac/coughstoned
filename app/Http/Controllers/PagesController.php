<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function aboutus()
    {
    	return view('pages.about-us');
	}

	public function contactus()
    {
    	return view('pages.contact-us');
	}
}
