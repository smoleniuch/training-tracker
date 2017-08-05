import React, {Component} from 'react';
import ReactDOM from 'react-dom';

import AjaxHandler from 'JS/support/http/ajax_handler.js';
import {User as UserAPI} from 'JS/api/user.js';
import LoginForm from 'JS/gui/login_form.jsx';
import Dashboard from 'JS/gui/dashboard.jsx';
import Header from 'JS/gui/header.jsx';

class Login extends Component {

  constructor(props){
    super(props)

  }
  render() {
    return (
      <div className="container">

        <div className='row'>

          <Header />

        </div>

        <div className="row">

          <div className="col-lg-3 col-sm-12 panel">

            <LoginForm currentUser={this.props.currentUser} />

          </div>

          <div className="content col-lg-9 col-sm-12">

            <Dashboard />

          </div>

        </div>
      </div>
    );
  }

}

export default Login;
