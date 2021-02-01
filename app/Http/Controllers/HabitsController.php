<?php

namespace App\Http\Controllers;
use App\Models\Habits;
use Illuminate\Http\Request;

class HabitsController extends Controller
{
    public function index()
	{
	    return Habits::all();
	}
}
