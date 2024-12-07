<link rel="stylesheet" href="{{ asset('css/blogadd.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main"></main>
<h1 class="header">Blog Edit</h1>
<form class="simple" method="post" action="/update" enctype="multipart/form-data">
<div class="form1">
@csrf
    <div class="input-group">
        <label>Title</label><br>
        <input type="text" id="Title" name="Title" value="{{ old('Title', $blog->Title) }}">
    </div>
    <p>@error('Title'){{$message}}@enderror</p>

    <div class="input-group">
        <label>Author_Name</label>
        <input type="text" id="Name" name="Name" value="{{ old('Name', $blog->Name) }}" onkeyup="lettersOnly(this)">
    </div>
    <p>@error('Name'){{$message}}@enderror</p>
    <div class="input-group">
        <label>Blog Category</label>
        <select id="blog_title_category" name="blog_title_category" >
            <option value="">Select blog Category</option>
            @foreach($titles as $title)
            <option value="{{ $title->seo_title }}">{{ $title->seo_title }}
            </option>
            @endforeach
        </select>
    </div>
    <p>@error('blog_title_category'){{$message}}@enderror</p>
    <div class="input-group">
        <label>Upload Image:</label><br>
    <img src="{{ asset( $blog->image) }}" alt="" height="100" width="100">
        <input type="file" name="image" id="image" />
    </div>
    <p>@error('image'){{$message}}@enderror</p>

    <div class="input-group">
        <label>Post Date</label>
        <input type="date" id="post_Date" name="post_Date" value="{{ old('post_Date', $blog->post_Date) }}">
    </div>
    <p>@error('post_Date'){{$message}}@enderror</p>

    <div class="input-group">

        <input type="hidden" id="Create_Date" name="Create_Date" value="{{ old('Create_Date', $blog->Create_Date) }}" readonly>
        <input type="hidden" id="Update_Date" name="Update_Date" readonly>
        <input type="hidden" id="id" name="id" value="{{ old('id', $blog->id) }}" readonly>

    </div>
    <div class="input-group">
    <label for="editor">Description</label>
    <textarea id="editor" name="Description">{{ old('Description', $blog->Description) }}</textarea>
</div>

    <p>@error('Description'){{$message}}@enderror</p>
    <div class="submit">
        <button type="submit" class="btn" name="update">Update Blog</button>
    </div>
</div>
</form>
<script>
function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}
</script>
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
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
</main>
@endsection