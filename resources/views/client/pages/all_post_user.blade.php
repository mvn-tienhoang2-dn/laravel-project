@extends('client.master')
@section('title')
    {{ ucfirst($user->name) }}'s Posts
@endsection
@section('content')
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Content</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $value->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('user.list.index') }}" class="btn btn-danger mt-4">Back to list user</a>
@endsection
