@extends('layouts.app')

@section('title', 'Catogery Create')

@section('content')
        <div class="card card-default">
        <div class="card-header">
         {{ isset($category) ? 'Edit Catogery' : 'Create Catogery' }}
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
            <form method="POST" action="{{ isset($category) ? route('catogries.update',$category->id) : route('catogries.store') }}">
                @if(isset($category))
                @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Catogery Name" value="{{ isset($category) ? $category->name : '' }}"></input>
                </div>
                <button type="submit" class="btn btn-success" >{{ isset($category) ? 'Update Catogery' : 'Add Catogery' }}</button>
            </form>
        </div>
        </div>
        
    </div>
    @endsection