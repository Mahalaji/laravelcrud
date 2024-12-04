@extends('layout.app')
@section('title', 'Users List')
@section('content')
<div class="container mt-4">
    <h2>Users List</h2>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <table id="userTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>City</th>
                <th>State</th>
                <th>Phone No.</th>
                <th>Country</th>
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

        
        $('#userTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/getUsersAjax',
                type: 'POST',
            },
            pageLength: 5, 
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'gender', name: 'gender' },
                { data: 'email', name: 'email' },
                { data: 'city', name: 'city' },
                { data: 'state', name: 'state' },
                { data: 'phoneno', name: 'phoneno' },
                { data: 'country', name: 'country' },
                { data: 'edit', orderable: false, searchable: false },
                { data: 'delete', orderable: false, searchable: false },
            ],
        });
    });
</script>
@endsection
