<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return Task::all();
        }

        return Task::where('user_id', $user->id)->get();
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        $user = Auth::user();

        if ($user->role !== 'admin' && $task->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return $task;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
        ]);

        return Task::create($validated);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $user = Auth::user();

        if ($user->role !== 'admin' && $task->user_id !== $user->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'description' => 'sometimes|nullable|string',
        ]);

        $task->update($validated);
        return $task;
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}

