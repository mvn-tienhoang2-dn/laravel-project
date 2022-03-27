@extends('client.master')
@section('title')
    <div class="text-center">
        {{ ucfirst($user->name) }}'s Information
    </div>
@endsection
@section('content')
    <div class="col-md-8" style="margin-left: 230px">
        <div class="card">
            <div class="card-body">
                <p>Name: {{ $user->name }}</p>
                <p>Age: {{ $user->age }}</p>
                <p>Age: {{ $user->email }}</p>
                <p>Comment At : {{ date('d-m-Y', strtotime($user->birthday)) }}</p>
                <p>Status: {{ $user->status }}</p>
            </div>
        </div>
        <a href="{{ route('user.list.index') }}" class="btn btn-danger mt-4">Back to list user</a>
    </div>
@endsection
