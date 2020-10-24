@extends('layouts.app')
@section('title')
    Messages
@endsection
@section('content')
    <table class="table table-bordered">

    <tr>

        <th>Time</th>

        <th>Content</th>

        <th>From</th>


    </tr>

    @foreach ($messages as $message)

    <tr>

        <td>{{ $message->created_at }}</td>

        <td>{{ $message->body }}</td>

        <td>{{ $message->name }}</td>

    </tr>

    @endforeach

    </table>
@endsection