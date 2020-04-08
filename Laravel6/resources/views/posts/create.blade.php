@extends('layouts.app')

@section('title', 'Catogery Create')

@section('content')
        <div class="card card-default">
        <div class="card-header">
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
            <form method="POST" action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store') }}" enctype="multipart/form-data">
                @if(isset($post))
                @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                <lable for="name">Content</lable>
                <input type="text" name="name" class="form-control" placeholder="Posts Name" id="title" value="{{isset($post) ? $post->title : '' }}"></input>
                </div>
                <div class="form-group">
                <lable for="description">Content</lable>
                <textarea name="description" class="form-control" cols="5" rows="5" >{{isset($post) ? $post->description : ''}}</textarea>
                </div>
                <div class="form-group">
                <lable for="content">Content</lable>
                <textarea name="content" class="form-control" cols="5" rows="5" >{{isset($post) ? $post->content : ''}}</textarea>
                </div>
                <div class="form-group">
                <lable for="published_at">published at</lable>
                <input type="text" name="published_at" class="form-control" placeholder="Published at" id="published_at"></input>
                </div>
                @if(isset($post))
                <div class="form-group"><img src="{{ asset('storage/'.$post->image)}}" alt="Image" height="200" width="50%" /><div>
                @endif
                <div class="form-group">
                <lable for="image">Image</lable>
                <input type="file" name="image" class="form-control" id="image"></input>
                </div>
                
                <div class="form-group">
                <lable for="catogery">Catogery</lable>
                <select name="catogery" class="form-control" id="catogery">      
                @foreach($categories as $catogery)
                <option value="{{ $catogery->id }}" @if(isset($post)){{ ($catogery->id == $post->category_id) ? 'selected' : '' }} @endif >{{ $catogery->name }}</option>
                @endforeach 
                </select>
                </div>

                <div class="form-group">
                <lable for="tags">Tags</lable>
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @if($tags->count() > 0)
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" 
                            @if(isset($post))
                                {{(in_array($tag->id,$post->tags->pluck('id')->toArray())) ? 'selected' : ''
                                }}
                            @endif
                            >{{ $tag->name }}</option>     
                        @endforeach 
                    @endif
                </select>
                </div>

                <button type="submit" class="btn btn-success" >{{isset($post) ? 'Update Post' : 'Create Post'}}</button>
            </form>
        </div>
        </div>
        
    </div>
    @endsection