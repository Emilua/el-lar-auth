<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tasks;

class TaskController extends Controller {

/**
 * Создание нового экземпляра контроллера.
 *
 * @return void
 */
public function __construct() {
$this->middleware('auth');
}

function index(Request $request) {
    $request->user()->tasks()->get();
return view('tasks.index',['tasks'=>$tasks]);
}

function create() {
return view('tasks.create');
}

function store(Request $request) {
    $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect(route('tasks.index'));
}

function show() {
return view('tasks.show');
}

function edit() {
return view('tasks.edit');
}

function update() {
return redirect();
}

function destroy(Taask $task) {
    $task->delete();
return redirect(route('tasks.index'));
}

}
