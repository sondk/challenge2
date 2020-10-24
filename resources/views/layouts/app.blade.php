<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>

        <!-- CSS And JavaScript -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>

    <body>
        <div class="pull-right">

            <a class="btn btn-warning" href="{{ url('logout') }}">Logout</a>

        </div>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
                <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('student') }}">CLASS ROOM</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a href="{{ url('messages') }}">Messages</a></li>
                    <li><a href="{{ route('assignments.index') }}">Assignments</a></li>
                    <li><a href="{{ route('challenges.index') }}">Challenges</a></li>
                </ul>
                </div>
            </nav>
        </div>

        @yield('content')
    </body>
</html>