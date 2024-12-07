<link rel="stylesheet" href="{{ asset('css/blogadd.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main"></main>
<h1 class="header">News Add</h1>
<form class="simple" method="post" action="/createnews" enctype="multipart/form-data">
<div class="form1">
@csrf
    <div class="input-group">
        <label>Title</label><br>
        <input type="text" id="Title" name="Title">
    </div>
    <p>@error('Title'){{$message}}@enderror</p>

    <div class="input-group">
        <label>Author_Name</label>
        <input type="text" id="Author_Name" name="Author_Name" onkeyup="lettersOnly(this)">
    </div>
    <p>@error('Author_Name'){{$message}}@enderror</p>

    <div class="input-group">
        <label>News Category</label>
        <select id="news_title_category" name="news_title_category" >
            <option value="">Select News Category</option>
            @foreach($titles as $title)
            <option value="{{ $title->seo_title }}">{{ $title->seo_title }}
            </option>
            @endforeach
        </select>
    </div>
    <p>@error('news_title_category'){{$message}}@enderror</p>
    <div class="input-group">
        <label>Email</label>
        <input type="text" id="Email" name="Email" >
    </div>
    <p>@error('Email'){{$message}}@enderror</p>
    <div class="input-group">
        <label>Mobile Number</label>
        <input type="text" id="Number" name="Number" >
    </div>
    <p>@error('Number'){{$message}}@enderror</p>
    <div class="input-group">
        <label>Upload Image:</label><br>
        <input type="file" name="Image" id="Image" />
    </div>
    <p>@error('Image'){{$message}}@enderror</p>

    <div class="input-group">
        <label>Date</label>
        <input type="date" id="Date" name="Date" >
    </div>
    <p>@error('Date'){{$message}}@enderror</p>

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
        <button type="submit" class="btn" name="update">Add News</button>
    </div>
</div>
</form>
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
</main>
@endsection
