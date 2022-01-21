<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta htpp-equiv="X-UA-Compatible" content="ie=edge">
        <title>Doctor Login</title>
        <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    </head>

    <body class="bg-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4" style="margin-top">
                    <h4>Doctor Login</h4><hr>
                    <form action="{{ route('doctor.check') }}" method="post" id="logout-form">
                        @if (Session::get('fail'))
                            <div class="text-danger">
                                {{Session::get('fail')}}
                            </div>
                        @endif
                        @csrf 
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter adress email" value="{{ old('email') }}">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn_primary" >Login</button>
                        </div><br>
                        <a href="{{ route('doctor.register') }}">Create new account</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>