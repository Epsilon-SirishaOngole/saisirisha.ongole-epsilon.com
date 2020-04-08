@extends('layouts.app')

@section('title', 'Tag Create')

@section('content')
        <div class="card card-default">
        <div class="card-header">
         {{ isset($tag) ? 'Edit Tag' : 'Create Tag' }}
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
            <form method="POST" action="{{ isset($tag) ? route('tags.update',$tag->id) : route('tags.store') }}">
                @if(isset($tag))
                @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Tag Name" value="{{ isset($tag) ? $tag->name : '' }}"></input>
                </div>
                <button type="submit" class="btn btn-success" >{{ isset($tag) ? 'Update Tag' : 'Add Tag' }}</button>
            </form>
        </div>
        </div>
        
    </div>
    @endsection