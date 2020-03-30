@extends('layouts.app')

@section('title', 'Catogery List')

@section('content')
            <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('catogries.create')}}" class="btn btn-primary">Add Catogery</a>
            </div>
        <div class="card card-default">
        <div class="card-header">
         Catogery
        </div>
        <div class="card-body">
            <ul clas="list-group">
            @foreach($catogries as $catogery)
                <li class="list-group-item">
                {{ $catogery->name }}
                <div class="d-flex justify-content-end"> 
                <div>number of posts: {{ $catogery->posts->count() }}</div>
                <a href="{{ route('catogries.edit',$catogery->id) }}" class="btn btn-info btn-sm mx-2">edit</a> 
                <button class="btn btn-danger btn-sm mx-2" onclick="handleDelete({{ $catogery->id }})">delete</a>
                </div>
                </li>
            @endforeach
            </ul>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteCatogryform">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Catogery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure do you want to delete the selected catogery?
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