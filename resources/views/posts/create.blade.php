@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
    <ul class="list-group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
        @endforeach
    </ul>
    <hr>
@endif

    <div class="card" style="width:65%;">
        <div class="card-body">
            <div class="card-title"><h2>Create a new post</h2></div>
            <hr>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category_id">Select a Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="tags">Select tags</label>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}
                        </label>
                    </div>
                @endforeach
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" id="content" cols="5" rows="5"></textarea>
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

@section('styles')

@endsection
@section('scripts')


    <script type="text/javascript">
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@endsection