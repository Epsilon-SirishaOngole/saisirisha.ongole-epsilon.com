@extends('layouts.app')

@section('title', 'Tags List')

@section('content')
            <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('tags.create')}}" class="btn btn-primary">Add Tags</a>
            </div>
        <div class="card card-default">
        <div class="card-header">
         Tags
        </div>
        <div class="card-body">
            <ul clas="list-group">
            @foreach($tags as $tag)
                <li class="list-group-item">
                {{ $tag->name }}
                <div class="d-flex justify-content-end"> 
                <div>number of posts: {{ $tag->posts->count() }}</div>
                <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-info btn-sm mx-2">edit</a> 
                <button class="btn btn-danger btn-sm mx-2" onclick="handleDelete({{ $tag->id }})">delete</a>
                </div>
                </li>
            @endforeach
            </ul>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteTagform">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure do you want to delete the selected Tag?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Go Back</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
        
    </div>
    @endsection

    @section('scripts')

    <script>
        function handleDelete($id) {
            var form = document.getElementById('deleteCatogryform');
            form.action = '/catogries/' + $id;
           $('#deleteModal').modal('show');
        }
    </script>

    @endsection