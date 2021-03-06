@extends('auth.app')

@section('content')

<form id="sign_in" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="msg">Logeaza-te</div>
    <div class="input-group">
        <span class="input-group-addon">
        <i class="material-icons">person</i>
        </span>
        <div class="form-line {{ $errors->has('email') ? ' error' : '' }}">
            <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required autofocus>
        </div>
        @if ($errors->has('email'))
        <label id="name-error" class="error" for="email">{{ $errors->first('email') }}</label>
        @endif
    </div>
    <div class="input-group">
        <span class="input-group-addon">
        <i class="material-icons">lock</i>
        </span>
        <div class="form-line {{ $errors->has('password') ? ' error' : '' }}">
            <input type="password" class="form-control" name="password" placeholder="Parola" required>
        </div>
        @if ($errors->has('password'))
        <label id="name-error" class="error" for="name">{{ $errors->first('password') }}</label>
        @endif
    </div>
    <div class="row">
        <div class="col-xs-8 p-t-5">
             <a href="{{ route('password.request') }}">Ai uitat parola?</a>
            <!-- <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="filled-in chk-col-pink">
            <label for="rememberme">Remember Me</label> -->
        </div>
        <div class="col-xs-4">
            <button class="btn btn-block bg-pink waves-effect" type="submit">Intra</button>
        </div>
    </div>
<!--     <div class="row m-t-15 m-b--20">
        <div class="col-xs-6">
            <a href="{{route('register')}}">Register Now!</a>
        </div>
        <div class="col-xs-6 align-right">
           
        </div>
    </div> -->
</form>
@endsection
