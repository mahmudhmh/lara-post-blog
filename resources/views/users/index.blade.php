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
            <div class="row col-12 text-center d-flex flex-row justify-content-center my-4">
                <div class="row w-auto">
                    {{ $users->Links('pagination::bootstrap-4')}}</div>
            </div>
    </div>
@endsection
<script src=" https://code.jquery.com/jquery-3.6.0.min.js">
</script>
