@extends('front.layout.layout')
@section('content')
    <div class="span9">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li class="active">Login</li>
        </ul>
        <h3> Login</h3>
        <div class="well">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error )
                <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
            <form class="form-horizontal" method="post" action="{{route('loginCheck')}}">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="input_email">Email <sup>*</sup></label>
                    <div class="controls">
                        <input type="text" name="email" id="input_email" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password <sup>*</sup></label>
                    <div class="controls">
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="btn btn-large btn-success" type="submit" value="Login" />
                    </div>
                </div>
            </form>
        </div>
        <h3> Registor</h3>
        <div class="well">
            <form class="form-horizontal" method="post" action="{{route('user_store')}}">
                @csrf
                <div class="control-group">
                    <label class="control-label" for="first_name">First Name <sup>*</sup></label>
                    <div class="controls">
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="last_name">Last Name <sup>*</sup></label>
                    <div class="controls">
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input_email">Email <sup>*</sup></label>
                    <div class="controls">
                        <input type="text" name="email" id="input_email" placeholder="Email" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="password">Password <sup>*</sup></label>
                    <div class="controls">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input class="btn btn-large btn-success" type="submit" value="Registor" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
