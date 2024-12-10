<link rel="stylesheet" href="{{ asset('css/blogadd.css') }}">
@extends('layout.app')
@section('content')
<main id="main" class="main">
<h1 class="header">News Edit</h1>
<div class="form1">
    <form class="simple" method="post" action="/updatenews" enctype="multipart/form-data">
        @csrf
        <div class="input-group">
            <label>Title</label><br>
            <input type="text" id="Title" name="Title" value="{{ old('Title', $news->Title) }}">
        </div>
        <p>@error('Title'){{$message}}@enderror</p>

        <div class="input-group">
            <label>Author_Name</label>
            <input type="text" id="Author_Name" name="Author_Name" value="{{ old('Author_Name', $news->Author_Name) }}"
                onkeyup="lettersOnly(this)">
        </div>
        <p>@error('Author_Name'){{$message}}@enderror</p>

        <div class="input-group">
            <label>News Category</label>
            <select id="news_title_category" name="news_title_category"
                value="{{ old('news_title_category', $news->news_title_category) }}">
                <option value="">Select News Category</option>
                @foreach($titles as $title)
                <option value="{{ $title->id }}">{{ $title->seo_title }}
                </option>
                @endforeach
            </select>
        </div>
        <p>@error('news_title_category'){{$message}}@enderror</p>
        <div class="input-group">
            <label>Email</label>
            <input type="text" id="Email" name="Email" value="{{ old('Email', $news->Email) }}">
        </div>
        <p>@error('Email'){{$message}}@enderror</p>
        <div class="input-group">
            <label>Mobile Number</label>
            <input type="text" id="Number" name="Number" value="{{ old('Number', $news->Number) }}">
        </div>
        <p>@error('Number'){{$message}}@enderror</p>
        <div class="input-group">
            <label>Upload Image:</label><br>
            <img src="{{ asset( $news->Image) }}" alt="" height="100" width="100">
            <input type="file" name="Image" id="Image" value="{{ old('Image', $news->Image) }}" />
        </div>
        <p>@error('Image'){{$message}}@enderror</p>

        <div class="input-group">
            <label>Date</label>
            <input type="date" id="Date" name="Date" value="{{ old('Date', $news->Date) }}">
        </div>
        <p>@error('Date'){{$message}}@enderror</p>

        <div class="input-group">

            <input type="hidden" id="Create_Date" name="Create_Date"
                value="{{ old('Create_Date', $news->Create_Date) }}" readonly>
            <input type="hidden" id="Update_Date" name="Update_Date"
                value="{{ old('Update_Date', $news->Update_Date) }}" readonly>
            <input type="hidden" id="id" name="id" value="{{ old('id', $news->id) }}" readonly>

        </div>
        <div class="input-group">
            <label>Description</label>
            <textarea id="editor" name="Description">{{ old('Description', $news->Description) }}
         </textarea>
        </div>
        <p>@error('Description'){{$message}}@enderror</p>
        <div class="submit">
            <button type="submit" class="btn" name="update">Update News</button>
        </div>
    </form>
</div>
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