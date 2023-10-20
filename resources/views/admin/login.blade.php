<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootshop Login</title>
    <!-- Bootstrap -->
    <link href="{{ asset('admin_theme/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin_theme/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin_theme/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('admin_theme/vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('admin_theme/build/css/custom.min.css') }}" rel="stylesheet">
        <!-- fav and touch icons -->
        <link rel="shortcut icon" href="{{ asset('themes/images/ico/favicon.ico') }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144"
            href="{{ asset('themes/images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114"
            href="{{ asset('themes/images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72"
            href="{{ asset('themes/images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed"
            href="{{ asset('themes/images/ico/apple-touch-icon-57-precomposed.png') }}">
        <style type="text/css" id="enject"></style>
    
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error )
                            <li>{{$error}}</li>
                                
                            @endforeach
                        </div>
                    @endif

                    <form action="{{route('admin.makeLogin')}}" method="post">
                        @csrf
                        <h1>Login Form</h1>

                        <div>
                            <input type="text" name="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            {{-- <input type="submit" value="Submit" class > --}}
                            <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>
