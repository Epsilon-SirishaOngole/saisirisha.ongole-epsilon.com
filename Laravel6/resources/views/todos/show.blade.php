@extends('layouts.app')
@section('title', 'todo description')
@section('content')
            <div class="card card-default">
                <div class="card-header">
                <strong>{{ $todo->name }}</strong> Details
                </div>
                <div class="card-body">
                {{ $todo->description }}
                </div>
            </div>
            <a href="/todos/{{ $todo->id }}/edit" type="submit" class="btn btn-info my-3">edit</a>
@endsection
