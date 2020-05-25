@extends('layouts.app')

@section('content')
@if (Session::has('message'))
<div class="container alert alert-warning">
    {{Session::get('message')}}
</div> 
@endif
<div class="container">
    @foreach($posts as $post)
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
        <a href="{{route('post.show',['post'=>$post])}}" class="btn btn-primary">Read more</a>
        <a href="{{route('post.edit',['post'=>$post])}}" class="btn btn-primary">Edit</a>
        <form action="{{route('post.destroy', ['post'=>$post])}}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Delete</button>
        </form>
        </div>
    </div>
    @endforeach
</div>
    
@endsection