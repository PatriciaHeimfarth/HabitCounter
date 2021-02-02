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

	public function createHabit(Request $request) {
		$habit = new Habits;
		$habit->name = $request->name;
		$habit->streak = $request->streak;
		$habit->save();
	
		return response()->json([
			"message" => "habit record created"
		], 201);
	  }
}
