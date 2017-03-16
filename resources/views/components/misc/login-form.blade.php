

<div id="login-form">
	<form action="" method="POST">
		<div id="login-form">

			<div class="form-group {{$errors->get('email') || $errors->get('loginStatus')?'has-error':''}}">
				<label for="inputEmail">Login:</label>
				<span class="help-block">{{$errors->first('email')}}</span>
				<input class="form-control" id="inputEmail" name="email" type="text" placeholder="email" value="{{old('email')}}"></input>
			</div>

			<div class="form-group {{$errors->has('password') || $errors->get('loginStatus')?'has-error':''}}">

				<label for="inputPassword">Password:</label>
				<span class="help-block">{{$errors->first('password')}}</span>
				<input class="form-control" id="inputPassword" name="password" type="password" placeholder="password"></input>



			</div>

			<div class="form-group has-error">

				<span class="help-block">{{$errors->first('loginStatus')}}</span>

			</div>

				<button id="login-button" type="submit" class="btn btn-default text-right"><span class="glyphicon glyphicon-log-in"></span> Log in</button>
        <a id="register-button" href="/register" class="btn btn-default text-right"><span class="glyphicon glyphicon-registration-mark"></span> Register</a>

		</div>


		{{csrf_field()}}
		
	</form>
</div>
