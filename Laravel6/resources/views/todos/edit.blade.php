@extends('layouts.app')
@section('title', 'Edit todo')
@section('content')
<div class="card card-default">
<div class="card-header">
Edit todo
</div>
<div class="card-body">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="/update-todo">
    @csrf
    <div class="form-group">
    <input type="hidden" name="todoId" class="form-control" value="{{ $todo->id }}"></input>
    <input type="text" name="name" class="form-control" placeholder="todo name" value="{{ $todo->name }}"></input>
    </div>
    <div class="form-group">
    <textarea name="description" cols="5" rows="5" class="form-control" placeholder="todo description">{{ $todo->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-success text-center">submit</button>
    <a href="/todos" type="cancle" class="btn btn-primary text-center">cancel</a>
    </div>
    </form>
</div>
</div>
@endsection