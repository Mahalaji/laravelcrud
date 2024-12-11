<link rel="stylesheet" href="{{ asset('css/blogsite/blogs.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@extends('frontendlayout.app')
@section('content')
<div class="row">
    <section id="recent-posts" class="col-md-9">
        <h2>Recent Blogs</h2>
        <div class="post-grid">
            @foreach($Blogs as $row)

            <article class="featured">

                <div class="post-image">
                <img src="{{ asset($row->image) }}" class="card-img-top" >
                </div>
                <div class="post-content">
                <a href="{{ url('/Blogs/' . $row->slug) }}" class="text-decoration-none text-dark">
                        <h3>{{$row->Title}}</h3>
                    </a>
                </div>
            </article>
            @endforeach

        </div>
        <a href="#" id="loadMore">Load More</a>
    </section>
    <div class="col-md-3" style=" margin-top: 40px;">
        <h5><strong>Blog Categories:-</strong></h5>
        <h5 class="form-like">
            <ul class="list">
                @foreach ($categories as $row)
                <a href="{{ url('/Blogtitle/' . $row->seo_title) }}" class="text-decoration-none text-dark">
                    <h5 class="card-title">{{$row->seo_title}}</h5>
                </a>
                </li>
                @endforeach
            </ul>
        </h5>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $(".featured").slice(0, 2).show();
        $("#loadMore").on("click", function(e) {
            e.preventDefault();
            $(".featured:hidden").slice(0, 2).slideDown();
            if ($(".featured:hidden").length == 0) {
                $("#loadMore").hide();
            }
        });

    })
    </script>
@endsection