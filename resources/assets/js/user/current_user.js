import PropTypes from 'prop-types';

class CurrentUser {

  constructor(userAPI,onChange){

    this._isLoggedIn = false;
    this.userAPI = userAPI;
    this.onChange = onChange
  }

  /**
   * Log user into the web app
   * @param  {string} email
   * @param  {string} password
   * @param  {function} success  callback
   * @param  {function} fail     callback
   * @return {void}
   */
  logIn(email, password, onSuccess, fail = ()=>{}){

   var  success = (data) => {
      this.setProperty('_isLoggedIn',true)
      onSuccess(data)
    }

    this.userAPI.logIn(email, password, success, fail)

  }

  isLoggedIn(){

    return this._isLoggedIn === true

  }

  setProperty(propertyName,value){

    this[propertyName] = value
    this.onChange(this)
  }

}

export default CurrentUser
