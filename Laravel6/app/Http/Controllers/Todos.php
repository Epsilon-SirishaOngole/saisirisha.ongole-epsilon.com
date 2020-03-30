<?php

namespace LearnApp\Http\Controllers;

use Illuminate\Http\Request;
use LearnApp\todo;
use LearnApp\Http\Requests\CreatetodoRequest;

class Todos extends Controller
{
  public function index(){
    $todos = todo::all();
    return view('todos.index')->with('todos',$todos);
  }

  public function show($todoId){
   // $todo = Todo::find($todoId);

    return view('todos.show')->with('todo',Todo::find($todoId));
  }
  public function create(){
    return view('todos.newtodo');
  }
  public function store(CreatetodoRequest $request){

    $data = $request->all();

    $todoDB = new Todo();
    $todoDB->name = $data['name'];
    $todoDB->description = $data['description'];
    $todoDB->completed = false;

    $todoDB->save();

    session()->flash('success','Todo creted sucessfully');

    return redirect('/todos');
  }

  public function edit($todoId){
    $todo = Todo::find($todoId);
    return view('todos.edit')->with('todo',$todo);
  }
  public function update(CreatetodoRequest $request){
    $data = $request->all();
    
    $todo = Todo::find($data['todoId']);
    $todo->name = $data['name'];
    $todo->description = $data['description'];
    $todo->save();
    session()->flash('success','Todo updated sucessfully');
    return redirect('/todos');

  }
}
