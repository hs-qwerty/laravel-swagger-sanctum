<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Register Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>

<body class="text-center">





<form action="{{ route('save') }}" method="post" class="form-signin">
    @csrf

    @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif


    @if(Session::get('fails'))
        <div class="alert alert-danger">
            {{ Session::get('fails') }}
        </div>
    @endif

    <h1 class="h3 mb-3 font-weight-normal">Please register</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <input type="password" name="repassword" id="inputPassword" class="form-control" placeholder="Password repeat" required>

    <div class="form-group">
        <select name="type" style="height: 50px;" class="form-control" id="exampleFormControlSelect1">
            <option value="1">Customer</option>
            <option value="2">Farmer</option>
        </select>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <p class="mt-5 mb-3 text-muted">Laravel To-do | hs-qwerty</p>
    <a href="{{ route('login') }}"><p class="mt-5 mb-3 text-muted">Login </p></a>
</form>


</body>
</html>
