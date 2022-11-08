@extends('layouts.app')

@section("page_title")
    Someone's Blog
@endsection

@section('content')
    <section class="">
        <h4 class="mb-5"><strong>Latest Blogs</strong></h4>

        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />
                        <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <button class="btn btn-primary disabled" style="font-size: 12px;">Category: {{ $blog->category->category}}</button>
                        </div>
                        <p class="card-text">
                            {{ substr(strip_tags($blog->content),0, 20) }}
                        </p>
                        <a href="{{ route('blog.single', $blog->slug )}}" class="btn btn-primary float-end" style="font-size: 12px;">Read More..</a>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection