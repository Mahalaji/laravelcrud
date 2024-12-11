<link rel="stylesheet" href="{{ asset('css/blogsite/home.css') }}">
@extends('frontendlayout.app')
@section('content')
    <section id="recent-posts">
        <h2>Recent Blogs</h2>
        <div class="post-grid">
            @foreach($users->take(4) as $row)
            <article class="feature">
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
    </section>

    <section id="recent-posts">
        <h2>Recent News</h2>
        <div class="post-grid">

            @foreach($news->take(4) as $newss)
            <article class="feature">
                <div class="post-image">
                <img src="{{ asset($newss->Image) }}" class="card-img-top" >
                </div>
                <div class="post-content">
                    <a href="{{ url('/News/' . $newss->slug) }}" class="text-decoration-none text-dark">
                        <h3>{{$newss->Title}}</h3>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </section>
@endsection