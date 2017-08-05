import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router,
         Route,
         Link,
         Redirect,
         withRouter,
         } from 'react-router-dom'

// export class PrivateRoute extends Component {
//
//
//
// }

 const PrivateRoute = ({ component: Component, ...rest }) => {

   return(
  <Route {...rest} render={props => {
    console.log(rest.isAuthenticated)
    
    return(
    rest.isAuthenticated ? (
      <Component {...props}/>
    ) : (
      <Redirect to={{
        pathname: '/login',
        state: { from: props.location }
      }}/>
    )
  )}}/>
  )
}

export default PrivateRoute
