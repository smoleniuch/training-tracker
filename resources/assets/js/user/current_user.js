import PropTypes from 'prop-types';

class CurrentUser {

  constructor(userAPI){

    this._isLoggedIn = false;
    this.userAPI = userAPI;

  }

  /**
   * Log user into the web app
   * @param  {string} email
   * @param  {string} password
   * @param  {function} success  callback
   * @param  {function} fail     callback
   * @return {void}
   */
  logIn(email, password, success, fail){

    success = (data) => {
      this.IsLoggedIn = true;
      success(data)
    }

    this.userAPI.logIn(email, password, success, fail)

  }

  isLoggedIn(){

    return this._isLoggedIn === true

  }

}

export default CurrentUser
