@extends('client.master')
@section('title')
    Comment Post Of User {{ $user->name }}
@endsection
@section('content')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Content</th>
                <th scope="col">Post_id</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->content }}</td>
                    <td>{{ $value->post_id }}</td>
                    <td>
                        <a href="{{ route('user.profile.show', $value->user_id) }}" class="btn btn-info">Show User</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('user.list.index') }}" class="btn btn-danger mt-4">Back to list user</a>
@endsection
