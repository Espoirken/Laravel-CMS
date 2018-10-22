@extends('layouts.app')

@section('content')
@include('admin.inc.messages')

    <div class="card" style="width:65%;">
        <div class="card-body">
            <div class="card-title"><h2>Update tag</h2></div>
            <hr>
            <form action="{{ route('tags.update',['id' => $tag->id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tag">Tag</label>
                    <input type="text" name="tag" value="{{$tag->tag}}" class="form-control">
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