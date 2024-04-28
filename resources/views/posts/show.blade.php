@extends('layouts.app')

@section('title')
    Show post
@endsection

@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header">
                <h5 class="card-title">Post Info</h5>
            </div>
            <div class="card-body">
                <h4 class="card-title">Title: {{$post->title}}</h4>
                <p class="card-text">Description: {{$post->description}}</p>
            </div>
        </div>
        <div class="card my-4">
            <div class="card-header">
                <h4 class="card-title">Post Creator Info</h4>
            </div>
            @if ($post->user)
                <div class="card-body">
                    <h4 class="card-title">Name: {{$post->user->name}}</h4>
                    <h6 class="card-text">Email: {{$post->user->email}}</h6>
                    <p class="card-title">Created At: {{$post->created_at}}</p>
                </div>
            @else
                Not Found
            @endif
        </div>
    </div>
@endsection

