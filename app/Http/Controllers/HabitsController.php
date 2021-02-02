<?php

namespace App\Http\Controllers;
use App\Models\Habits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

	  public function updateHabit(Request $request, $id) {
		if (Habits::where('id', $id)->exists()) {
			$habit = Habits::find($id);
			$habit->name = is_null($request->name) ? $habit->name : $request->name;
			$habit->streak = is_null($request->streak) ? $habit->streak : $request->streak;
			$habit->save();
			error_log( $habit);
			return response()->json([
				
				"message" => "records updated successfully"
			], 200);
			} else {
				error_log( $request);
			 
			return response()->json([
				"message" => "Habit not found"
			], 404);
			
		}
	}
	
}
