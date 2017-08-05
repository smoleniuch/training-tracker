import React, { Component } from 'react';
import UserAPI from 'JS/api/user.js';

class LoginForm extends Component {

  constructor(props){
    super(props)

    this.state = {

      email:'',
      password:'',

    }

    this.updateEmail = this.updateEmail.bind(this);
    this.updatePassword = this.updatePassword.bind(this);
    this.logIn = this.logIn.bind(this);
  }
  render() {
    return (
      <div id="login-form">
      	<form action="" method="POST">
      		<div id="login-form">

      			<div className="form-group">
      				<label htmlFor="inputEmail">Login:</label>
      				<span className="help-block"></span>
      				<input onChange={this.updateEmail} className="form-control" id="inputEmail" name="email" type="text" placeholder="email" value={this.state.email}></input>
      			</div>

      			<div className="form-group">

      				<label htmlFor="inputPassword">Password:</label>
      				<span className="help-block"></span>
      				<input onChange={this.updatePassword} className="form-control" id="inputPassword" name="password" type="password" placeholder="password" value={this.state.password}></input>



      			</div>

      			<div className="form-group has-error">

      				<span className="help-block"></span>

      			</div>

      				<button onClick={this.logIn} id="login-button" type="submit" className="btn btn-default text-right"><span className="glyphicon glyphicon-log-in"></span> Log in</button>
              <a id="register-button" href="/register" className="btn btn-default text-right"><span className="glyphicon glyphicon-registration-mark"></span> Register</a>

      		</div>


      	</form>
      </div>
    );
  }

  logIn(e){
    e.preventDefault();
    this.props.currentUser.logIn(this.state.email,this.state.password)

  }

  updateEmail(event){

    this.setState({

      email:event.target.value,

    })

  }

  updatePassword(event){

    this.setState({

      password:event.target.value

    })

  }

}

export default LoginForm;
