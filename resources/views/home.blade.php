@extends('layouts.app')

@section('content')

<div class="d-flex flex-column justify-content-center align-items-center gap-2" style="height:90vh;">
    <div class="card col-7 bg-light d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex justify-content-center align-items-center">
            <img class="col-md-10 row"
                src="
                https://media1.giphy.com/media/4N3Mqhl8JRyYLapZgt/source.gif  ">
        </div>
        <div class=" d-flex justify-content-center align-items-center">
            @if (session('status'))
            <div class=" alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class=" alert alert-success" role="alert">{{ __('You are logged in Successfully!') }}</div>
        </div>
    </div>
</div>
@endsection
