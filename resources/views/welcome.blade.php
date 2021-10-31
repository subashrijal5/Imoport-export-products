@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <a href="{{route('clients.index')}}" class="btn btn-primary">Client Lists</a>
            <a href="{{route('clients.create')}}" class="btn btn-primary">Create Client</a>
        </div>
    </div>
</div>
@endsection
