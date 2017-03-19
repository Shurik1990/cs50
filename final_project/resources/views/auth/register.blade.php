@extends('layouts.app')

@section('content')
<form action="{{ route('register') }}" role="form" method="post">
    <fieldset>
	{{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

         <input id="name" type="text" class="form-control" name="name" placeholder="Username" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
 
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
    </div>
	<div class="form-group">
        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
    </div>
	<div class="form-group">
		<button type="submit" class="btn btn-default">
		<span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
            Register
        </button>
    </div>
    </fieldset>
</form>
<div class="register">
    or <a href="{{ route('login') }}">login</a> for an account
</div>
@endsection
