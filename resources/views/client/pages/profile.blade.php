@extends('client.master')
@section('title')
    <div class="text-center">
        {{ ucfirst($user->name) }}'s Profile
    </div>
@endsection
@section('content')
    <div class="col-md-8" style="margin-left: 200px">
        <div class="card">
            <div class="card-body">
                <p>Address: {{ $profile->address }}</p>
                <p>Tel: {{ $profile->tel }}</p>
                <p>Province: {{ $profile->province }}</p>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($posts as $posts_key => $post)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Post {{ $posts_key + 1 }}</h4>
                        <p>Content: {{ $post->content }}</p>
                        <p>Post At: {{ $post->created_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        @foreach ($comments as $comments_key => $comment)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Comment {{ $comments_key + 1 }}</h4>
                        <p>Content: {{ $comment->content }}</p>
                        <p>Post : {{ $comment->post_id }}</p>
                        <p>Comment At : {{ $comment->created_at }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('user.list.index') }}" class="btn btn-danger mt-4">Back to list user</a>
@endsection
