@extends('layouts.app')

@section('content')
<div class="card" style="height: 20%;">
    <div class="card-header bg-transparent text-center"><h2>Categories</h2></div>
</div>

<table class="table table-hover table-md" style="width:100%">
    <thead>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @if (count($categories) > 0)
            
        
        @foreach ($categories as $category)
            <tr>
                <th>{{$category->name}}</th>
                <td style="width:1%"><a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-outline-dark btn-sm"><i class="far fa-edit"></i></a></td>
                <td style="width:1%"><a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-outline-danger btn-sm"><span class='far fa-trash-alt'></span></a></td>
            </tr>
            
        @endforeach
        @else 
            <th colspan="5" class="text-center">No categories</th>
        @endif
    </tbody>
</table>
@endsection