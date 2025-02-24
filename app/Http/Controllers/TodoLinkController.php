<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Enums\Type;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;

class TodoLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Todo::query()
            ->where('user_id', auth()->user()->id)
            ->where('type', Type::LINK)
            ->orderBy('status', 'desc')
            ->orderBy('id', 'asc')
            ->simplePaginate(5)
            ->withQueryString();

        return inertia()
            ->render('Todos/Link', [
                'todos' => inertia()->always(fn() => $data),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $data = array_merge($request->validated(), [
            'user_id' => auth()->user()->id,
            'status' => Status::TODO,
        ]);
        Todo::query()
            ->create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    }
}
