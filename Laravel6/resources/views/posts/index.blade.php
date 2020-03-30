@extends('layouts.app')

@section('title', 'Posts list')

@section('content')
            <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Posts</a>
            </div>
        <div class="card card-default">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
      <table class="table">
      <thead>
      <th>Image</th>
      <th>Title</th>
      <th>description</th>
      <th>Action buttons</th>
      <th></th>
      </thead>
      <tbody>
      @if($posts->count() > 0)
      @foreach($posts as $post)
            <tr>
            <td><img src="{{ asset('storage/'.$post->image) }}" alt="image" width="100" height="50"></td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
                <td><a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
            <td>
            <form action="{{ route('posts.destroy',$post->id) }}" method="POST" >
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
            </td>
            </tr>
      @endforeach
      @else
            <th colspan="5" class="text-center">No Publised posts</th>
            @endif
      </tbody>
      </table>
        </div>
        </div>
        @endsection