<link rel="stylesheet" href="{{ asset('css/blogadd.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main"></main>
<h1 class="header">Blog Add</h1>
<form class="simple" method="post" action="/addblog" enctype="multipart/form-data">
    <div class="form1">

        @csrf
        <div class="input-group">
            <label>Title</label><br>
            <input type="text" id="Title" name="Title">
        </div>
        <p>@error('Title'){{$message}}@enderror</p>

        <div class="input-group">
            <label>Author_Name</label>
            <input type="text" id="Name" name="Name" onkeyup="lettersOnly(this)">
        </div>
        <p>@error('Name'){{$message}}@enderror</p>

        <div class="input-group">
            <label>Blog Category</label>
            <select id="blog_title_category" name="blog_title_category">
                <option value="">Select blog Category</option>
                @foreach($titles as $title)
                <option value="{{ $title->id }}">{{ $title->seo_title }}
                </option>
                @endforeach
            </select>
        </div>
        <p>@error('blog_title_category'){{$message}}@enderror</p>
        <div class="input-group">
            <label>Upload Image:</label><br>
            <input type="file" name="image" id="image" />
        </div>
        <p>@error('image'){{$message}}@enderror</p>

        <div class="input-group">
            <label>Post Date</label>
            <input type="date" id="post_Date" name="post_Date">
        </div>
        <p>@error('post_Date'){{$message}}@enderror</p>

        <div class="input-group">

            <input type="hidden" id="Create_Date" name="Create_Date" readonly>
            <input type="hidden" id="Update_Date" name="Update_Date" readonly>

        </div>
        <div class="input-group">
            <label>Description</label>
            <textarea id="editor" name="Description">
         </textarea>
        </div>
        <p>@error('Description'){{$message}}@enderror</p>
        <div class="submit">
            <button type="submit" class="btn" name="update">Add Blog</button>
        </div>
    </div>
</form>
</main>
@endsection
@section('scripts')
<script>
function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}
</script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
editor.resize(300, 500);
</script>
<script>
CKEDITOR.replace('editor')
</script>
@endsection