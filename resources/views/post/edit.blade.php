@extends('layouts.app')

@section('title') Edit Post @endsection

@section('content')
<form class='my-5' action="{{route('posts.update',['post' => $post['id']])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $post['id'] }}" class=" form-control">
    <div class="mb-3">
        <label for="exampleInputTitle" class=" form-label fs-4">Title<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="title" value="{{ $post['title'] }}"
            placeholder="Enter Post Title.." id=" exampleInputTitle" required>
    </div>

    @error('title')
    <div class="alert alert-danger my-1">{{$message}}</div>
    @enderror
    <div class="form-floating mb-3">
        <p class="fs-4">Description<span class="text-danger">*</span></p>
        <textarea class="form-control" id="floatingTextarea" style="height: 120px" name="description"
            required>{{ $post['description'] }}</textarea>
    </div>
    @error('description')
    <div class="alert alert-danger my-1">{{$message}}</div>
    @enderror
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Image</label>
        <input type="file" name="image" accept=".jpg,.png" class="form-control">
        @error('image')
            <div class="alert alert-danger my-1">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
