@extends('layouts.app')

@section('content')
@include('admin.inc.messages')

    <div class="card" style="width:65%;">
        <div class="card-body">
            <div class="card-title"><h2>Edit blog settings</h2></div>
            <hr>
            <form action="{{ route('settings.update') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value ="{{$settings->address}}" class="form-control">
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" value ="{{$settings->contact_number}}" class="form-control">
                <div class="form-group">
                    <label for="email">Contact Email</label>
                    <input type="text" name="contact_email" value ="{{$settings->contact_email}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection