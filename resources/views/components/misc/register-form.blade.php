
      <form class="form-group" action="" method="post" name="registration_form">

        <div class="form-group {{$errors->has('username')?'has-error':''}}">

           <label for="username">Username:</label>
           <span class="help-block">{{$errors->first('username')}}</span>
           <input type='text' name='username' id='username' value='{{old('username')}}' class="form-control"/>

        </div>

        <div class="form-group {{$errors->has('email')?'has-error':''}}">

          <label for="email">Email:</label>
          <span class="help-block">{{$errors->first('email')}}</span>
          <input type="text" name="email" id="email" value='{{old('email')}}' class="form-control"/>


        </div>

        <div class="form-group {{$errors->has('password')?'has-error':''}}">

          <label for="password">Password:</label>
          <span class="help-block">{{$errors->first('password')}}</span>
          <input type="password" name="password" id="password" class="form-control"/>


        </div>

        <div class="form-group {{$errors->has('confirm_password')?'has-error':''}}">

          <label for="confirmpwd">Confirm password:</label>
          <span class="help-block">{{$errors->first('confirm_password')}}</span>
          <input type="password" name="confirm_password" id="confirmpwd" class="form-control" /><br>

        </div>


{{-- {{dd(Input::all())}} --}}

           <button class="btn btn-default" type="submit" onclick="form.submit()" /><span class="glyphicon glyphicon-registration-mark"></span> Register</button>
           {{csrf_field()}}



       </form>
       <ul>

            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>

       <p>Return to the <a href="login">login page</a>.</p>
