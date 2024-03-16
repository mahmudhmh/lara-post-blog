@extends('layouts.app')

@section('title') Create Post @endsection

@section('content')
<form class='my-5' method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputTitle" class="form-label fs-4">Title<span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="title" placeholder="Enter Post Title.." id="exampleInputTitle"
            required>
    </div>
    @error('title')
        <div class="alert alert-danger my-1">{{ $message }}</div>
    @enderror
    <div class="form-floating mb-3">
        <p class="fs-4">Description<span class="text-danger">*</span></p>
        <textarea class="form-control" id="floatingTextarea" name="description" style="height: 120px"
            required></textarea>
    </div>
    @error('description')
        <div class="alert alert-danger my-1">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="exampleInputImage" class="form-label fs-4">Image </label><i class="text-secondary"> (Optional)</i>
        <input type="file" name="image" accept=".jpg,.png" class="form-control" id="exampleInputImage">
        @error('image')
            <div class="alert alert-danger my-1">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection
