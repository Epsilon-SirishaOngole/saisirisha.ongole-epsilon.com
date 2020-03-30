@extends('layouts.app')
@section('title', 'New Todo')
@section('content')
<div class="card card-default">
<div class="card-header">
Create New todo
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
    <form method="POST" action="/store-todo">
    @csrf
    <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="todo name"></input>
    </div>
    <div class="form-group">
    <textarea name="description" cols="5" rows="5" class="form-control" placeholder="todo description"></textarea>
    </div>
    <button type="submit" class="btn btn-success text-center">submit</button>
    </div>
    </form>
</div>
</div>
@endsection