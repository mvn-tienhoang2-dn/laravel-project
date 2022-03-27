@extends('client.master')
@section('title')
    List User Page
@endsection

@section('content')
    <div class="row text-wrap">
        <a href="{{ route('user.create.view') }}" class="  btn btn-primary col-md-2" style="margin-right: 50px">Add
            user</a>
        <a href="{{ route('user.comment.index') }}" class="  btn btn-primary col-md-2" style="margin-right: 50px">Show List
            Comment</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><a href="{{ route('user.post.show', $value->id) }}">{{ $value->name }}</a></td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->status }}</td>
                    <td>
                        <a href="{{ route('user.comment.show', $value->id) }} " class="btn btn-success text-wrap">Show
                            Comment</a>
                        <a href="{{ route('user.profile.show', $value->id) }}"
                            class="btn btn-info text-wrap text-white">Show</a>
                        <a class="btn btn-danger text-wrap">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
