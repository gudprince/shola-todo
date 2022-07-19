<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('')}}">
   
    

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
</head>
<body>
<div class="container " style="margin-top:50px;margin-bottom:150px">
        <div class="card mx-auto"  style="max-width: 30rem;">
            <div class="card-body">
                @if(session('status'))
                   <p class="alert alert-success" > {{ session('status') }} </p>
                @endif
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                 @endforeach
                <p class="h4 mb-4 text-dark" >Login</p>
                <form class="" action="{{ route('login')}}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label>Email</label>
                        <input class="form-control form-control-lg" type="email" name="email" required autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input class="form-control form-control-lg" type="password" name="password" required autofocus>
                    </div>
                    <div class=" form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                           remember me
                        </label>
                    </div>
                    <div class="d-grid gap-2"  style="margin-top:30px">
                        <button class="btn btn-lg btn-dark" type="submit">Login</button>
                    </div>
                </form>
              
            </div>
        </div>
    </div>
</body>
</html>
