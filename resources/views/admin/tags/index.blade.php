@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-transparent text-center"><h2>Tags</h2></div>
</div>

<table class="table table-hover table-md" style="width:100%">
    <thead>
        <th>Tag Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @if (count($tags) > 0)
            
        
        @foreach ($tags as $tag)
            <tr>
                <th>{{$tag->tag}}</th>
                <td style="width:1%"><a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-outline-dark btn-sm"><i class="far fa-edit"></i></a></td>
                <td style="width:1%"><a href="{{ route('tags.delete', ['id' => $tag->id]) }}" class="btn btn-outline-danger btn-sm"><span class='far fa-trash-alt'></span></a></td>
            </tr>
            
        @endforeach
        @else 
            <th colspan="5" class="text-center">No tags</th>
        @endif
    </tbody>
</table>
@endsection