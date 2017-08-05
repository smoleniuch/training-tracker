import React, {Component} from 'react';
import ReactDOM from 'react-dom';

import AjaxHandler from 'JS/support/http/ajax_handler.js';
import {User as UserAPI} from 'JS/api/user.js';
import LoginForm from 'JS/gui/login_form.jsx';
require('CSS/pages/login_page.scss')

class Login extends Component {

  constructor(props){
    super(props)

  }
  render() {
    return (
      <div className="container-fluid  login-page">

        <div className="row login-form">

          <div className="col col-sm-12 ">

            <LoginForm {...this.props} />

          </div>

        </div>
      </div>
    );
  }

}

export default Login;
