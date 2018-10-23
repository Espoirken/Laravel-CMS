@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-transparent text-center"><h2>Published Posts</h2></div>
</div>
<table class="table table-hover table-md" style="width:100%">
    <thead>
        <th>Image</th>
        <th>Title</th>
        <th>Edit</th>
        <th>Trash</th>
    </thead>
    <tbody>
        @if (count($posts) > 0)
        @foreach ($posts as $post)
        <tr>
            <td><img src="{{ $post->featured }}" alt="{{$post->title}}" width="90px" height="50px"> </td>
            <td>{{ $post->title }}</td>
            <td><a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">Edit</a> </td>
            <td><a href="{{ route('posts.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Trash</a> </td>
        </tr>
        @endforeach
        
        @else
             <tr>    
                <th colspan="5" class="text-center">No published posts</th>
            </tr>
        @endif
    </tbody>
</table>
@endsection