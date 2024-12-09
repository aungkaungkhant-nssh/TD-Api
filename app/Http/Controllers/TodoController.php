<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return response()->json(Todo::orderBy('created_at', 'desc')->get());
    }
    public function store(StoreTodoRequest $request)
    {
        $todo = Todo::create($request->validated());
        return response()->json($todo, 201);
    }

    public function update(StoreTodoRequest $request, $id)
    {
        $todo = $this->findOne($id);
        $todo->update($request->validated());
        return response()->json($todo);
    }
    public function destroy($id)
    {

        $todo = $this->findOne($id);
        $todo->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Todo deleted successfully',
        ], 200);
    }

    private function findOne($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return sendNotFoundResponse("Todo not found");
        }
        return $todo;
    }
}
