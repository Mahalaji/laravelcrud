<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@extends('layout.app')
@section('title', 'Blog List')
@section('content')
<div class="info" style="background: white;">
    <div class="container mt-4">
        <h2>Blogs List</h2>
        <form class="left" method="post">
            <a href="/home"><i class='fas fa-eye' style='font-size:18px;color:black'></i></a>

            <form class="left" method="post">
                <a href="{{ asset('/blogadd') }}"
                    style="padding: 10px; background: azure; text-decoration: none; color: black; border-radius: 5px; font-size: 14px; border: 1px solid black;">Add-Blog</a>
            </form>

            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="mb-3">
            <input
                type="text"
                id="searchBar"
                class="form-control"
                placeholder="Search..."
                onkeyup="filterBlogs()"
            />
        </div>
            <table id="BlogsTable" class="table table-bordered table-striped" style="width: 1180px;">
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
                <tbody>
                    @foreach ($Blogs as $Blog)
                    <tr>
                        <td>{{$Blog->id}}</td>
                        <td>{{$Blog->Name}}</td>
                        <td>{{$Blog->Title}}</td>
                        <td>{{$Blog->categories['seo_title']}}</td>
                        <td>{{$Blog->Description}}</td>
                        <td>{{ time_ago($Blog['Create_Date']) }}</td>
                        <td>{{ time_ago($Blog['Update_Date']) }}</td>
                        <td>{{ time_ago($Blog['post_Date']) }}</td>
                        <td><a href="{{ url('/edit/' . $Blog->id) }}" class="btn btn-sm btn-primary" style="color:black"><i
                                    class="fas fa-edit"></i></a></td>
                        <td>
                            <form action="{{ url('/destory/' . $Blog->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" style="border: none; outline: none;"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>

<script>
    function filterBlogs() {
        const searchInput = document.getElementById('searchBar').value.toLowerCase();
        
        const tableRows = document.querySelectorAll('#BlogsTable tbody tr');
        
        tableRows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            
            if (name.includes(searchInput)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
@endsection
