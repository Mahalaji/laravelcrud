
<link rel="stylesheet" href="{{ asset('css/blogadd.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main">
<h1 class="header">Add Category</h1>
<form class="simple" method="post" action="/createnewscategory" >
<div class="form1">
@csrf
    <div class="input-group">
        <label>Seo Title</label><br>
        <input type="text" id="seo_title" name="seo_title">
    </div>
    <p>@error('seo_title'){{$message}}@enderror</p>
    <div class="input-group">
        <label>Meta Keyword</label><br>
        <input type="text" id="meta_keyword" name="meta_keyword">
    </div>
    <p>@error('meta_keyword'){{$message}}@enderror</p>
    <div class="input-group">
        <label>Seo Robat</label><br>
        <input type="text" id="seo_robat" name="seo_robat">
    </div>
    <p>@error('seo_robat'){{$message}}@enderror</p>
    <div class="input-group">
        <label>Meta Description</label>
        <textarea id="editor" name="meta_description">
         </textarea>
    </div>
    <p>@error('Description'){{$message}}@enderror</p>
    <div class="submit">
        <button type="submit" class="btn" name="update">Add Category</button>
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
