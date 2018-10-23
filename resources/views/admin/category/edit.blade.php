@extends('layouts.app')

@section('content')
@include('admin.inc.messages')

    <div class="card">
        <div class="card-body">
            <div class="card-title text-center"><h2>Update category: {{$category->name}}</h2></div>
            <hr>
            <form action="{{ route('category.update', ['id' => $category->id ]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection