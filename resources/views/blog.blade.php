<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@extends('layout.app')
@section('title', 'Blog List')
@section('content')
<div class="container mt-4">
    <h2>Blogs List</h2>
    <form class="left" method="post">
    <a href=""><i class='fas fa-eye'style='font-size:18px;color:black'></i></a>
 
    <form class="left"  method="post">
    <a href="{{ asset('/blogadd') }}" style="padding: 10px; background: azure; text-decoration: none; color: black; border-radius: 5px; font-size: 14px; border: 1px solid black;">Add-Blog</a>
    </form>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="BlogsTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Title</th>
                <th>Blog Title Category</th>
                <th>Description</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th>Post Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        
        $('#BlogsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/getBlogsAjax',
                type: 'POST',
            },
            pageLength: 5, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'Name', name: 'Name' },
                { data: 'Title', name: 'Title' },
                { data: 'blog_title_category', name: 'blog_title_category' },
                { data: 'Description', name: 'Description' },
                { data: 'Create_Date', name: 'Create_Date' },
                { data: 'Update_Date', name: 'Update_Date' },
                { data: 'post_Date', name: 'post_Date' },
                { data: 'edit', orderable: false, searchable: false },
                { data: 'delete', orderable: false, searchable: false },
            ],
        });
    });
</script>
@endsection
