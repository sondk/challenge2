@extends('layouts.app')

@section('title')
    Users
@endsection

@section('content')
<div class="row">

<div class="col-lg-12 margin-tb">

    <div class="pull-left">

        <h2>Users</h2>

    </div>

    <div class="pull-right">

        <a class="btn btn-success" href="{{ route('users.create') }}">New</a>

    </div>

</div>

</div>



@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif



<table class="table table-bordered">

<tr>

    <th>User name</th>

    <th>Name</th>

    <th>Email</th>

    <th>Phone number</th>

    <th width="280px">#</th>

</tr>

@foreach ($users as $user)

<tr>

    <td>{{ $user->username }}</td>

    <td>{{ $user->name }}</td>

    <td>{{ $user->email }}</td>

    <td>{{ $user->phone_number }}</td>

    <td>

        <form action="{{ route('users.destroy',$user->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">detail</a>

            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">edit</a>

            @csrf

            @method('DELETE')

            <button type="submit" class="btn btn-danger">delete</button>

        </form>

    </td>

</tr>

@endforeach

</table>



{!! $users->links() !!}
@endsection