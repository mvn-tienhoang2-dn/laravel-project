@extends('client.master')
@section('title')
    Add User Page
@endsection
@section('content')
    <form action="{{ route('user.create.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" required class="form-control" id="nameInput" name="name">
            </div>
            <div class="col-md-3 mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" required class="form-control" id="emailInput" name="email">
            </div>
            <div class="col-md-3 mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" required class="form-control" id="passwordInput" name="password">
            </div>
            <div class="col-md-2 mb-3">
                <label for="statusInput" class="form-label">Status</label>
                <select class="form-select" name="status">
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label for="dateInput" class="form-label">Birthday</label>
                <input type="date" required class="form-control" id="dateInput" name="birthday">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@section('js')
@endsection
