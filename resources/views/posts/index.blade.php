@extends('layouts.app')

@section('title','Home')

@section('content')
<div class="container text-center my-4">
    <a href="{{route('posts.create')}}" class="btn btn-success btn-sm text-capitalize">create post</a>
</div>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Posted By</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user?$post->user->name:'Not Found'}}</td>
                    <td>{{$post->created_at->format('Y/m/d')}}</td>
                    <td>
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm">View</a>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST" class="d-inline" onsubmit="confirm('do you want to delete this post!!')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection