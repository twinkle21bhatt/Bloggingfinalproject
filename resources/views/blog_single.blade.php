@extends('layouts.app')

@section('page_title')
    {{$blog->title}}
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/single_blog.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        <div class="scroll-indicator"></div>
        <div class="content-wrapper">
            <div class="content mt-5">
                <div class="poster">
                    <div class="poster-title">
                        <h1> {{ $blog->title }} </h1>
                        <div class="line"></div>
                        <p style="font-size:15px;"> By: {{ $blog->user->first_name }} {{ $blog->user->last_name }}</p>
                        <button class="btn btn-primary disabled" style="font-size:12px;">Category: {{ $blog->category->category }}</button>
                    </div>
                    <div class="poster-buttons">
                        <div>
                            <a href="{{ route('like', $blog->id) }}" class="btn mb-4">
                                <span>
                                    <svg viewBox="0 0 24 24" width="24" height="24" 
                                    
                                    @if ($blog->userLikes()->where('user_id', Auth::user()->id)->exists())
                                        stroke="red" fill="red"
                                    @else
                                        stroke="#fff" fill="none"
                                    @endif
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                </span>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="info">
                    <div class="block published">
                        <div class="mini-title">Published</div>
                        {{ $blog->created_at->toDateString() }}
                    </div>
                    <div class="block published">
                        <div class="mini-title">Likes</div>
                        {{ $blog->like }}
                    </div>
                    <div class="block published">
                        <div class="mini-title">Reading</div>
                        5 min
                    </div>
                </div>
                <div class="words">
                    <p>
                        {!! $blog->content !!}
                    </p>
                    <div class="buttons">
                        <div>
                            <a href="{{ route('like', $blog->id) }}" class="btn mb-4">
                                <span>
                                    <svg viewBox="0 0 24 24" width="24" height="24" 
                                    
                                    @if ($blog->userLikes()->where('user_id', Auth::user()->id)->exists())
                                        stroke="red" fill="red"
                                    @else
                                        stroke="#000" fill="none"
                                    @endif
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line" style="background-color:#000!important;width: 100%;height: 1px;"></div>
            <div class="comment-section mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                            <div class="card-body p-4">
                                <h3> Comments </h3>
                                <div class="form-outline mb-4">
                                    <form action="{{ route('comment.create', $blog->id)}}" method="post" >
                                        @csrf
                                        <input type="text" name="comment" class="form-control" placeholder="Type comment..." />
                                        <input type="hidden" name="blog_id" value="{{$blog->id}}" />
                                        <button class="btn btn-success float-end mt-3" type="submit">Comment</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                                
                                @foreach($comments as $comment)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <p>{{ $comment->comment }}</p>
                                        
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex flex-row align-items-center">
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" width="25"
                                                    height="25" />
                                                    <p class="small mb-0 ms-2">{{ $comment->user->first_name }} {{ $comment->user->last_name }} : {{ $comment->created_at }}
                                                </div>
                                                <div class="d-flex flex-row align-items-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection