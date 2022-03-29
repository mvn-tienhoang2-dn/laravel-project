@extends('client.master')
@section('title')
    Search Page
@endsection
@section('content')
    <div class="col-md-5 mt-5">
        <div class="input-group rounded  text-center ">
            <input type="search" id="search-bar" class="form-control rounded" placeholder="Input" aria-label="Search"
                aria-describedby="search-addon" />
            <select name="type" id="type-search" class="form-control">
                <option selected disabled>Search Option</option>
                <option value="0">Name</option>
                <option value="1">Number of Posts</option>
                <option value="2">Number of Comments</option>
            </select>
            <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>
    <div class="col-md-12 mt-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Status</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Comments</th>
                </tr>
            </thead>
            <tbody id="load-data">

            </tbody>
        </table>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function(e) {
            function loadDataTable() {
                $.ajax({
                    url: '/search/data-table-search',
                    type: "GET",
                    success: function(res) {
                        var html = '';
                        var data = res.data;
                        $.each(data, function(k, v) {
                            html += '<tr>';
                            html += '<td>' + (k + 1) + '</td>';
                            html += '<td>' + v.name + '</td>';
                            html += '<td>' + v.email + '</td>';
                            html += '<td>' + v.created_at + '</td>';
                            html += ' <td>' + v.status + '</td>';
                            html += ' <td>' + v.posts.length + '</td>';
                            html += ' <td>' + v.comments.length + '</td>';
                            html += '</tr>';
                        });
                        $('#load-data').html(html);
                    }
                });
            }
            loadDataTable();

            function searchName() {
                $("#search-bar").keyup(function(e) {
                    var name = $("#search-bar").val();
                    console.log(name);
                    if (name.length == 0) {
                        loadDataTable();
                    } else {
                        var payload = {
                            'name': name,
                        }
                        $.ajax({
                            url: "/search/name",
                            type: "POST",
                            data: payload,
                            success: function(res) {
                                var html = '';
                                var data = res.data;
                                $.each(data, function(k, v) {
                                    html += '<tr>';
                                    html += '<td>' + (k + 1) + '</td>';
                                    html += '<td>' + v.name + '</td>';
                                    html += '<td>' + v.email + '</td>';
                                    html += '<td>' + v.created_at + '</td>';
                                    html += ' <td>' + v.status + '</td>';
                                    html += ' <td>' + v.posts.length + '</td>';
                                    html += ' <td>' + v.comments.length + '</td>';
                                    html += '</tr>';
                                });
                                $('#load-data').html(html);
                            }
                        });
                    }
                });
            }

            function searchPostTotal() {
                $("#search-bar").keyup(function(e) {
                    var content = $("#search-bar").val();
                    if (content.length == 0) {
                        loadDataTable();
                    } else {
                        var payload = {
                            'count': content,
                        }
                        $.ajax({
                            url: "/search/post-total",
                            type: "post",
                            data: payload,
                            success: function(res) {
                                var html = '';
                                var data = res.data;
                                var count = 1;
                                $.each(data, function(k, v) {
                                    html += '<tr>';
                                    html += '<td>' + count + '</td>';
                                    html += '<td>' + v.name + '</td>';
                                    html += '<td>' + v.email + '</td>';
                                    html += '<td>' + v.created_at + '</td>';
                                    html += ' <td>' + v.status + '</td>';
                                    html += ' <td>' + v.posts.length + '</td>';
                                    html += ' <td>' + v.comments.length + '</td>';
                                    html += '</tr>';
                                    count++;
                                });
                                $('#load-data').html(html);
                            }
                        });
                    }
                });
            }

            function searchCommentTotal() {
                $("#search-bar").keyup(function(e) {
                    var content = $("#search-bar").val();
                    if (content.length == 0) {
                        loadDataTable();
                    } else {
                        var payload = {
                            'count': content,
                        }
                        $.ajax({
                            url: "/search/comment-total",
                            type: "post",
                            data: payload,
                            success: function(res) {
                                var html = '';
                                var data = res.data;
                                var count = 21;
                                $.each(data, function(k, v) {
                                    html += '<tr>';
                                    html += '<td>' + count + '</td>';
                                    html += '<td>' + v.name + '</td>';
                                    html += '<td>' + v.email + '</td>';
                                    html += '<td>' + v.created_at + '</td>';
                                    html += ' <td>' + v.status + '</td>';
                                    html += ' <td>' + v.posts.length + '</td>';
                                    html += ' <td>' + v.comments.length + '</td>';
                                    html += '</tr>';
                                    count++;
                                });
                                $('#load-data').html(html);
                            }
                        });
                    }
                });
            }

            $('#type-search').change(function() {
                type = $(this).val();
                console.log(type);
                if (type == 0) {
                    searchName();
                } else if (type == 1) {
                    searchPostTotal();
                } else {
                    searchCommentTotal();
                }
            });
        });
    </script>
@endsection
