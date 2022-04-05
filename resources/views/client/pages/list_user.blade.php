@extends('client.master')
@section('title')
    List User Page
@endsection

@section('content')
    <div class="row text-wrap">
        <button class=" btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#create-user-modal"
            style="margin-right: 50px">Add user</button>
        <a href="{{ route('user.comment.index') }}" class="  btn btn-primary col-md-2" style="margin-right: 50px">Show List
            Comment</a>
        <a href="{{ route('user.search.searchIndex') }}" class="  btn btn-primary col-md-2"
            style="margin-right: 50px">Search</a>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 200px">
                            Name
                            <span class="text-primary" id="sort-name-icon"></span>
                        </th>
                        <th scope="col" style="width: 80px">
                            Age
                            <span class="text-primary" id="sort-age-icon"></span>
                        </th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Status</th>
                        <th scope="col">Posts</th>
                        <th scope="col">Comments</th>
                        <th scope="col" style="width: 400px">Action</th>
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
                                <a href="{{ route('user.comment.show', $value->id) }} "
                                    class="btn btn-outline-success text-wrap">Show
                                    Comment</a>
                                <a href="{{ route('user.profile.show', $value->id) }}"
                                    class="btn btn-outline-warning text-wrap">Show</a>
                                <button class="btn btn-outline-danger text-wrap delete" data-id="{{ $value->id }}"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                <button class="btn btn-outline-info text-wrap edit" data-id="{{ $value->id }}"
                                    data-bs-toggle="modal" data-bs-target="#edit-modal"">Edit</button>
                                                            </td>
                                                        </tr>
     @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
            } else {
                let temp =
                    ` <i class="fas fa-sort" id= "sort-name-original" style="margin-left: 30px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(temp));
            }
            if (localStorage.getItem('age-icon') != null) {
                let icon = JSON.parse(localStorage.getItem('age-icon'));
                $('#sort-age-icon').html(icon);
            } else {
                let temp2 =
                    `<i class="fas fa-sort" id= "sort-age-original" style="margin-left: 5px; cursor: pointer;"></i>`;
                localStorage.setItem('age-icon', JSON.stringify(temp2));
            }

            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2)
                    month = '0' + month;
                if (day.length < 2)
                    day = '0' + day;

                return [year, month, day].join('-');
            }

            $('#sort-name-asc').click(function() {
                let route = "{{ route('user.sort.nameasc') }}";
                window.location = route;
                let html =
                    ` <i class="fas fa-sort-up" id= "sort-name-desc" style="margin-left: 30px; cursor: pointer;"></i>`;
                let age_html =
                    `<i class="fas fa-sort" id= "sort-age-asc" style="margin-left: 5px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-name-desc', function() {
                let route = "{{ route('user.sort.namedesc') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort-down" id= "sort-name-original" style="margin-left: 30px; cursor: pointer;"></i>`;
                let age_html =
                    `<i class="fas fa-sort" id= "sort-age-asc" style="margin-left: 5px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-name-original', function() {
                let route = "{{ route('user.list.index') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort" id= "sort-name-asc" style="margin-left: 30px; cursor: pointer;"></i>`
                let age_html =
                    `<i class="fas fa-sort" id= "sort-age-asc" style="margin-left: 5px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-age-asc', function() {
                let route = "{{ route('user.sort.ageasc') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort" id= "sort-name-asc" style="margin-left: 30px; cursor: pointer;"></i>`
                let age_html =
                    `<i class="fas fa-sort-up" id= "sort-age-desc" style="margin-left: 5px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-age-desc', function() {
                let route = "{{ route('user.sort.agedesc') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort" id= "sort-name-asc" style="margin-left: 30px; cursor: pointer;"></i>`
                let age_html =
                    `<i class="fas fa-sort-down" id= "sort-age-original" style="margin-left: 5px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('body').on('click', '#sort-age-original', function() {
                let route = "{{ route('user.list.index') }}";
                window.location = route;
                html =
                    ` <i class="fas fa-sort" id= "sort-name-asc" style="margin-left: 30px; cursor: pointer;"></i>`
                let age_html =
                    `<i class="fas fa-sort" id= "sort-age-asc" style="margin-left: 5px; cursor: pointer;"></i>`;
                localStorage.setItem('icon', JSON.stringify(html));
                localStorage.setItem('age-icon', JSON.stringify(age_html));
            });
            $('.delete').click(function() {
                let id = $(this).data('id');
                $("#user-id-delete").val(id);
            });
            $('#confirm-delete').click(function() {
                var id_user = $("#user-id-delete").val();
                $.ajax({
                    url: '/api/delete-user/' + id_user,
                    type: "DELETE",
                    success: function(res) {
                        if (res.status) {
                            location.reload();
                        }
                    }
                })
            })
            $('.edit').click(function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                $.ajax({
                    url: '/api/edit-user/' + id,
                    type: 'get',
                    success: function(res) {
                        let data = res.data;
                        let title = 'Edit User ' + res.data.name;
                        let date = new Date(res.data.birthday).toDateString();
                        date = formatDate(date);
                        $('form#update-form').attr('action', "/api/update-user/" + data.id);
                        $('#edit-modal-label').text(title);
                        $('#user-id-edit').val(data.id);
                        $('#edit-name').val(data.name);
                        $('#edit-email').val(data.email);
                        $('#edit-status').val(data.status);
                        $('#edit-birthday').val(date);
                        $('#edit-avatar').attr("src", res.data.avatar);
                    }
                })
            });
            $('#edit-upload-avatar').change(function(e) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#edit-avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })
            $('form#form-update').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                var url = window.location.href;
                let id = $('#user-id-edit').val();
                $.ajax({
                    url: '/api/update-user/' + id,
                    type: 'POST',
                    data: payload,
                    success: function(res) {
                        if (res.status) {
                            window.location.href = url;
                        }
                    }
                });
            })
            $('#avatar-input').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#avatar-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            })
            $('form#form-create').submit(function(e) {
                e.preventDefault();
                var url = window.location.href;
                let formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('api.user.store') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.status) {
                            window.location.href = url;
                        }
                    }
                })
            })
        });
    </script>
@endsection
