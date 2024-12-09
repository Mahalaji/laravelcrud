<link rel="stylesheet" href="{{ asset('css/blogadd.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main"></main>
<h1 class="header">Page Edit</h1>
<form class="simple" method="post" action="/updatepages" enctype="multipart/form-data">
<div class="form1">
@csrf
    <div class="input-group">
        <label>Title</label><br>
        <input type="text" id="title" name="title" value="{{ old('title', $pages->title) }}">
    </div>
    <p>@error('title'){{$message}}@enderror</p>

    <div class="input-group">
        <label>Author_Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $pages->name) }}" onkeyup="lettersOnly(this)">
    </div>
    <p>@error('name'){{$message}}@enderror</p>

    <div class="input-group">
        <label>Date</label>
        <input type="date" id="Date" name="Date" value="{{ old('Date', $pages->Date) }}">
    </div>
    <p>@error('Date'){{$message}}@enderror</p>

    <div class="input-group">

        <input type="hidden" id="created_at" name="created_at" value="{{ old('created_at', $pages->created_at) }}" readonly>
        <input type="hidden" id="updated_at" name="updated_at" readonly>
        <input type="hidden" id="id" name="id" value="{{ old('id', $pages->id) }}" readonly>

    </div>
    <div class="input-group">
    <label for="editor">Description</label>
    <textarea id="editor" name="Description">{{ old('Description', $pages->Description) }}</textarea>
</div>

    <p>@error('Description'){{$message}}@enderror</p>
    <div class="submit">
        <button type="submit" class="btn" name="update">Update Page</button>
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