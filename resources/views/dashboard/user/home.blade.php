<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta htpp-equiv="X-UA-Compatible" content="ie=edge">
        <title>User Dashboard | Home</title>
        <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3" style="margin-top:45px">
                    <h4>User Dashboard</h4><hr>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::guard('web')->user()->name }}</td>
                                <td>{{ Auth::guard('web')->user()->email }}</td>
                                <td>
                                    <a href="{{ route('user.logout') }}" onClick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form action="{{ route('user.logout')}}" method="post" class="d-none" id="logout-form">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>