<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@extends('layout.app')
@section('title', 'Blog Category List')
@section('content')
<div class="container mt-4">
    <h2>Blogs List</h2>
    <form class="left"  method="post">
    <a href="{{ asset('/blogcategoryadd') }}" style="padding: 10px; background: azure; text-decoration: none; color: black; border-radius: 5px; font-size: 14px; border: 1px solid black;">Add-Category</a>
    </form>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="BlogsCategoryTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>seo title</th>
                <th>meta keyword</th>
                <th>seo robat</th>
                <th>meta description</th>
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

        
        $('#BlogsCategoryTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/getBlogsCategoryAjax',
                type: 'POST',
            },
            pageLength: 5, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'seo_title', name: 'seo_title' },
                { data: 'meta_keyword', name: 'meta_keyword' },
                { data: 'seo_robat', name: 'seo_robat' },
                { data: 'meta_description', name: 'meta_description' },
                { data: 'edit', orderable: false, searchable: false },
                { data: 'delete', orderable: false, searchable: false },
            ],
        });
    });
</script>
@endsection
