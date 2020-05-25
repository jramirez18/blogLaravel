@extends('layouts.app')
@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
        <a href="{{route('post.show',['post'=>$post])}}" class="btn btn-primary">Read more</a>
        
        </div>
    </div>
    @endforeach
    {{$posts->links()}}
</div>
@endsection



