<?php

namespace App\Http\Controllers;

class VoteController extends Controller
{
	public function index()
	{
		return view('vote');
	}
}