@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Users</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Posts Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->posts->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
