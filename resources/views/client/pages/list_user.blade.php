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
        <a href="{{ route('user.search.searchIndex') }}" class="  btn btn-primary col-md-2"
            style="margin-right: 50px">Search</a>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="width: 250px">Name <span id="sort-name-icon"></span></th>
                <th scope="col">Age<span id="sort-age-icon"></span></th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
                <th scope="col">Posts</th>
                <th scope="col">Comments</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($data as $key => $value)
                <tr>
                    <td>{{ $data->currentPage() > 1? ($data->currentPage() - 1) * $data->perPage() + $key + 1: $data->currentPage() + $key }}
                    </td>
                    <td><a href="{{ route('user.post.show', $value->id) }}">{{ $value->name }}</a></td>
                    <td>{{ $value->age }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->status }}</td>
                    <td>
                        <a href="{{ route('user.post.show', $value->id) }}">
                            {{ count($value->posts) }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('user.comment.show', $value->id) }}">
                            {{ count($value->comments) }}
                        </a>
                    </td>
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
    <div class="col-md-12 text-center" id="paginate">
        {!! $data->links() !!}
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            if (localStorage.getItem('icon') != null) {
                let icon = JSON.parse(localStorage.getItem('icon'));
                $('#sort-name-icon').html(icon);
            }
            if (localStorage.getItem('age-icon') != null) {
                let icon = JSON.parse(localStorage.getItem('age-icon'));
                $('#sort-age-icon').html(icon);
            }
            $('#sort-name-asc').click(function() {
                let route = "{{ route('user.sort.nameasc') }}";
                window.location = route;
                let html =
                    ` <i class="fas fa-sort-up" id= "sort-name-desc" style="margin-left: 30px; cursor: pointer;"></i>`;
                let age_html =
                    `<i class="fas fa-sort" id= "sort-age-asc" style="margin-left: 30px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-name-desc', function() {
                let route = "{{ route('user.sort.namedesc') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort-down" id= "sort-name-original" style="margin-left: 30px; cursor: pointer;"></i>`;
                let age_html =
                    `<i class="fas fa-sort" id= "sort-age-asc" style="margin-left: 30px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-name-original', function() {
                let route = "{{ route('user.list.index') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort" id= "sort-name-asc" style="margin-left: 30px; cursor: pointer;"></i>`
                let age_html =
                    `<i class="fas fa-sort" id= "sort-age-asc" style="margin-left: 30px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-age-asc', function() {
                let route = "{{ route('user.sort.ageasc') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort" id= "sort-name-asc" style="margin-left: 30px; cursor: pointer;"></i>`
                let age_html =
                    `<i class="fas fa-sort-up" id= "sort-age-desc" style="margin-left: 30px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-age-desc', function() {
                let route = "{{ route('user.sort.agedesc') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort" id= "sort-name-asc" style="margin-left: 30px; cursor: pointer;"></i>`
                let age_html =
                    `<i class="fas fa-sort-down" id= "sort-age-original" style="margin-left: 30px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-age-original', function() {
                let route = "{{ route('user.list.index') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort" id= "sort-name-asc" style="margin-left: 30px; cursor: pointer;"></i>`
                let age_html =
                    `<i class="fas fa-sort" id= "sort-age-asc" style="margin-left: 30px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
        });
    </script>
@endsection
