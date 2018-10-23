@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-transparent text-center"><h2>Trashed Posts</h2></div>
</div>
<table class="table table-hover table-md" style="width:100%">
    <thead>
        <th>Image</th>
        <th>Title</th>
        <th>Restore</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @if (count($posts) > 0)
            
        
        @foreach ($posts as $post)
        <tr>
            <td><img src="{{ $post->featured }}" alt="{{$post->title}}" width="30%" height="21%"> </td>
            <td>{{ $post->title }}</td>
            <td><a href="{{ route('posts.restore', ['id' => $post->id]) }}" class="btn btn-success btn-sm">Restore</a> </td>
            <td><a href="{{ route('posts.kill', ['id' => $post->id]) }}" class="btn btn-danger btn-sm">Delete</a> </td>
        </tr>
        @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">No trashed posts</th>
            </tr>
        @endif
    </tbody>
</table>
@endsection