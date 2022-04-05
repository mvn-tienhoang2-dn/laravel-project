@extends('client.master')
@section('title')
    Add User Page
@endsection
@section('content')
    <form enctype="multipart/form-data" action="{{ route('user.create.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" required class="form-control" value="{{ old('name') }}" id="nameInput" name="name">
                @if ($errors->has('name'))
                    <p style="color:red">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="col-md-3 mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" required class="form-control" value="{{ old('email') }}" id="emailInput"
                    name="email">
                @if ($errors->has('email'))
                    <p style="color:red">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="col-md-3 mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" required class="form-control" value="{{ old('password') }}" id="passwordInput"
                    name="password">
                @if ($errors->has('password'))
                    <p style="color:red">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="col-md-2 mb-3">
                <label for="statusInput" class="form-label">Status</label>
                <select class="form-select" value="{{ old('status') }}" name="status">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
                @if ($errors->has('status'))
                    <p style="color:red">{{ $errors->first('status') }}</p>
                @endif
            </div>
            <div class="col-md-3 mb-3">
                <label for="dateInput" class="form-label">Birthday</label>
                <input type="date" required class="form-control" value="{{ old('birthday') }}" id="dateInput"
                    name="birthday">
                @if ($errors->has('birthday'))
                    <p style="color:red">{{ $errors->first('birthday') }}</p>
                @endif
            </div>
            <div class="col-md-3 mb-3">
                <label for="avatarInput" class="form-label">Avatar</label>
                <input type="file" multiple class="form-control" value="{{ old('avatar') }}" id="avatarInput"
                    name="avatar">
                @if ($errors->has('avatar'))
                    <p style="color:red">{{ $errors->first('avatar') }}</p>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@section('js')
@endsection
