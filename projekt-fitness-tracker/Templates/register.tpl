
      <form class="form-group" action="" method="post" name="registration_form">

           <label for="username">Username:</label>
           <input type='text' name='username' id='username' value="[@username]" class="form-control"/><br>
           [@username-error]
           <label for="email">Email:</label>
           <input type="text" name="email" id="email" value="[@email]" class="form-control"/><br>
           [@email-error]
           <label for="password">Password:</label>
           <input type="password" name="password" id="password" class="form-control"/><br>
           [@password-error]
           <label for="confirmpwd">Confirm password:</label>
           <input type="password" name="confirmpwd" id="confirmpwd" class="form-control" /><br>
           [@confirmpwd-error]
           <button class="btn btn-default" type="submit" onclick="form.submit()" /><span class="glyphicon glyphicon-registration-mark"></span> Register</button>
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

       <p>Return to the <a href="login.php">login page</a>.</p>
