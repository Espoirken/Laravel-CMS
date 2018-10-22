@extends('layouts.app')

@section('content')
@include('admin.inc.messages')

    <div class="card" style="width:65%;">
        <div class="card-body">
            <div class="card-title"><h2>Create a new user</h2></div>
            <hr>
            <form action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Users</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Add User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection