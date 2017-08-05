class User {

  constructor(ajaxHandler){

    this.ajaxHandler = ajaxHandler;

  }

  logIn(username, password, success, fail = () => {}){

    var data = {

      username:username,
      password:password,

    }
    this.ajaxHandler.post('/login', data, success, fail)

  }

}

export default User;
