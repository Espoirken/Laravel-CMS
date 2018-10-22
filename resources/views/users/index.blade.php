@extends('layouts.app')

@section('content')
<div class="card" style="height: 20%;">
    <div class="card-header bg-transparent text-center"><h2>Users</h2></div>
</div>
<table class="table table-hover table-md" style="width:100%">
    <thead>
        <th>Image</th>
        <th>Name</th>
        <th>Permissions</th>
        <th>Delete</th>
    </thead>
    <tbody>
        @if (count($users) > 0)
        @foreach ($users as $user)
        <tr>
            <td><img src="{{ asset($user->profile->avatar) }}" alt="users profile" width="60px" height="60px" style="border-radius:50%"></td>
            <td>{{$user->name}}</td>
            <td>
                @if($user->admin)
                    <a href="{{ route('users.notadmin', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Remove permissions</a>
                @else
                    <a href="{{ route('users.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success">Make admin</a>
                @endif
            </td>
            <td>
                @if(Auth::id() !== $user->id)
                <a href="{{ route('users.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                @endif
            </td>
        </tr>
        @endforeach
        
        @else
             <tr>    
                <th colspan="5" class="text-center">No users</th>
            </tr>
        @endif
    </tbody>
</table>
@endsection