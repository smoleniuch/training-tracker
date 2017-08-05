import React, {Component} from 'react';
import ReactDOM from 'react-dom';


import AjaxHandler from 'JS/support/http/ajax_handler.js'

import { BrowserRouter as Router,
         Route,
         Link,
         Redirect,
         withRouter,
         } from 'react-router-dom'

import PrivateRoute from 'JS/support/react_router/private_route.jsx'

import UserAPI from 'JS/api/user.js'
import CurrentUser from 'JS/user/current_user.js'

import Login from 'JS/gui/pages/login.jsx';
import Home from 'JS/gui/pages/home.jsx';




class App extends Component {

  constructor(props){
    super(props);

    this.ajaxHandler = new AjaxHandler();
    this.userAPI = new UserAPI(this.ajaxHandler)

    this.state = {

      currentUser:new CurrentUser(this.userAPI)
      
    }


  }

  render() {


    return (
    <Router>
      <div>

      <PrivateRoute exact path="/" isAuthenticated={this.state.currentUser.isLoggedIn()} component={Home}/>

        <Route exact path="/login"  render={(props)=><Login currentUser={this.state.currentUser} {...props}/>}/>

      </div>
    </Router>
    );


  }



}


ReactDOM.render(<App />,document.getElementById('App'))
