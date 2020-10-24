<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    @if($errors->any())
                                        <h6>{{$errors->first()}}</h6>
                                    @endif
                                    <div class="card-body">  
										<form action="{{url('post-login')}}" method="POST" id="logForm">
										{{ csrf_field() }}
                                            <div class="form-group">
												<label class="small mb-1" for="inputEmailAddress">Username</label>
												<input class="form-control py-4" id="inputEmailAddress" name="username" type="text" placeholder="Enter user name" />
												@if ($errors->has('username'))
												  <span class="error">{{ $errors->first('username') }}</span>
												@endif 
											</div>
                                            <div class="form-group">
												<label class="small mb-1" for="inputPassword">Password</label>
												<input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
												@if ($errors->has('password'))
												  <span class="error">{{ $errors->first('password') }}</span>
												@endif
											</div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
												<button class="btn btn-primary" type="submit">Login</button>
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>