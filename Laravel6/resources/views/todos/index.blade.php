@extends('layouts.app')

@section('title', 'Todo Page')

@section('content')
        <div class="card card-default">
        <div class="card-header">
            todos
        </div>
        <div class="card-body">
            <ul clas="list-group">
            @foreach($todos as $todo)
                <li class="list-group-item">
                {{ $todo->name }}
                <a href="todos/{{ $todo->id }}" class=" btn btn-primary btn-sm float-right">view</a>
                </li>
            @endforeach
            </ul>
        </div>
        </div>
        
    </div>
    @endsection
