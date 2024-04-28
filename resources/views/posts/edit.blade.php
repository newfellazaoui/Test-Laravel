@extends('layouts.app')

@section('title','Edit Post')

@section('content')

    <div class="container my-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('posts.update',$post['id'])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title" class="form-label text-capitalize">title</label>
                <input type="text" name="title" id="title" class="form-control my-2" value="{{$post['title']}}">
            </div>
            <div class="form-group">
                <label for="desc" class="form-label text-capitalize">description</label>
                <textarea type="text" name="description" id="desc" class="form-control my-2">{{$post['description']}}</textarea>
            </div>
            <div class="form-group">
                <label for="creator" class="form-label text-capitalize">post creator</label>
                <div class="custom-control">
                    <select name="creator" id="creator" class="form-select my-2">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" @selected($post->user && $post->user->id === $user->id)>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-success my-2">
            </div>
        </form>
    </div>
    
@endsection