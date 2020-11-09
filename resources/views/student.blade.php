@extends('layouts.app')

@section('title')
    Student
@endsection

@section('content')
@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif
<h2>Update profile</h2>
@if ($errors->any())

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form action="{{ url('post-update') }}" method="POST">

@csrf
@method('PUT')

 <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Password:</strong>

            <input type="text" name="password" value="" class="form-control" placeholder="Password">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Email:</strong>

            <input type="text" name="email" value="" class="form-control" placeholder="Email">

        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Phone number:</strong>

            <input type="text" name="phone_number" value="" class="form-control" placeholder="Phone number">

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

      <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>
</form>
@endsection