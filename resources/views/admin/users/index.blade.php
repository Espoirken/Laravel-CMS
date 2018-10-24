@extends('layouts.app')

@section('content')
@include('admin.inc.messages')

<div class="card">
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
            <td><img src="{{ asset($user->profile->avatar) }}" alt="users_profile" width="60px" height="60px" style="border-radius:50%"></td>
            @if(Auth::id() == $user->id)
                <td><b>{{$user->name}}</b></td>
            @else
                <td>{{$user->name}}</td>
            @endif
            <td>
                @if(Auth::id() !== $user->id)
                @if($user->admin)
                    <a href="{{ route('users.notadmin', ['id' => $user->id]) }}" class="btn btn-sm btn-danger" style="width:140px">Remove permissions</a>
                @else
                    <a href="{{ route('users.admin', ['id' => $user->id]) }}" class="btn btn-sm btn-success" style="width:140px">Make admin</a>
                @endif
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