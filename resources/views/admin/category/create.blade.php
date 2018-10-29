@extends('layouts.app')

@section('content')
@include('inc.messages')

    <div class="card">
        <div class="card-body">
            <div class="card-title text-center"><h2>Create a new category</h2></div>
            <hr>
            <form action="{{ route('category.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection