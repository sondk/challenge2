@extends('layouts.app')

@section('title')
    User detail
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>{{ $user->name }}</h2>

            </div>
            @if ($user->is_teacher == 1)
                <div class="pull-left">

                    <h6><i>Teacher</i></h6>

                </div>
            @else
                <div class="pull-left">

                    <h6><i>Student</i></h6>

                </div>
            @endif

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>User name: </strong>

                {{ $user->username }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Email:</strong>

                {{ $user->email }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Phone number:</strong>

                {{ $user->phone_number }}

            </div>

        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
        <b>Send Message</b>
        <form action="{{url('message/store')}}" method="post">
            {{ csrf_field() }}
            <div class="col-md-6">

                <input type="hidden" name="sent_to_id" class="form-control" value="{{ $user->id }}">
                <!-- Message Form Input -->
                <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea name="message" class="form-control"></textarea>
                </div>
                <!-- Submit Form Input -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control">Send</button>
                </div>
            </div>
        </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <b>Message sent to {{ $user->name }}</b>
                <table class="table table-bordered">

                <tr>

                    <th>Time</th>

                    <th>Content</th>

                    <th width="280px">#</th>
                </tr>

                @foreach ($messages as $message)

                <tr>

                    <td>{{ $message->created_at }}</td>

                    <td>{{ $message->body }}</td>


                    <td>

                        <form action="{{ url('message/'.$message->id) }}" method="POST">

                            <!-- <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">edit</a> -->

                            @csrf

                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">delete</button>

                        </form>

                    </td>

                </tr>

                @endforeach

                </table>
        </div>
    </div>

@endsection