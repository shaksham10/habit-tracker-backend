<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habit;

class HabitController extends Controller
{
    // GET ALL HABITS
    public function index()
    {
        return Habit::latest()->get();
    }

    // CREATE HABIT
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        $habit = Habit::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? '',
            'completed' => false
        ]);

        return response()->json($habit);
    }

    // DELETE HABIT
    public function destroy(Habit $habit)
    {
        $habit->delete();

        return response()->json([
            'message' => 'Habit deleted'
        ]);
    }
}