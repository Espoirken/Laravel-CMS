@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-lg-3">
    <div class="card border-primary">
        <div class="card-header text-center text-primary"><h5>Posted</h5></div>
        <div class="card-body">
            <h1 class="text-center">{{$posts_count}}</h1>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card border-danger">
        <div class="card-header text-center text-danger"><h5>Trashed Posts</h5></div>
        <div class="card-body">
            <h1 class="text-center">{{$trashed_count}}</h1>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card border-success">
        <div class="card-header text-center text-success"><h5>Categories</h5></div>
        <div class="card-body">
            <h1 class="text-center">{{$categories_count}}</h1>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card border-primary">
        <div class="card-header text-center text-primary"><h5>Users</h5></div>
        <div class="card-body">
            <h1 class="text-center">{{$users_count}}</h1>
        </div>
    </div>
</div>
</div>
@endsection
