<?php


  function escape($value){

    return htmlentities($value,ENT_QUOTES,"UTF-8");

  }
  /**
   * Generate html paragraph with class "error".
   * @param  string $description error description
   * @return string              html paragraph
   */
  function generate_html_error($description){

    return "<p class='error'><strong>Error!:</strong>" . $description ."</p>";

  }

  function generate_html_success($description){

    return "<p class='success'><strong>Success!:</strong>" . $description ."</p>";

  }

/**
 * Makes string more pleasnt to eye.
 * -Frist letter in each sentence become uppercase.Rest letters are in lowercase.
 * -
 * @param  string $string text to beautify
 * @return string         beautified text
 */
  function beautifyString($string){

    $string = preg_replace();


  }
/**
 * Starts secure session
 * @return undefined [description]
 */
  function sec_session_start(){

    $session_name = "secure_session";

    session_name($session_name);

    $secure = false;
    $httponly = false;


    if(ini_set("session.use_only_cookies",1) === false){

     header("Location: ../error.php?err=Could not initiate a safe session (ini_set)" );
      exit();

    }

    $cookieParams = session_get_cookie_params();

    session_set_cookie_params(

        $cookieParams["lifetime"],
        $cookieParams["path"],
        $cookieParams["domain"],
        $secure,
        $httponly



      );

    session_start();
    session_regenerate_id(true);
  }
  /**
   * [login user.]
   * @param  string $email    [description]
   * @param  string $password [description]
   * @param  object $mysqli   [description]
   * @return [boolean]           [Return true if login was succesfull,otherwise returns string with error infomartion]
   */
  function login($email,$password,$pdo){

    if($stmt = $pdo->prepare("SELECT id,username,password

      FROM members
      WHERE email = :email
      LIMIT 1"

    )){

      $stmt->execute(['email'=>$email]);
      $db_user = $stmt->fetch();
      // var_dump($stmt);
      // die();
      if($db_user !== false){

        $user_id = $db_user['id'];
        $db_password = $db_user['password'];
        $username = $db_user['username'];

        if( brutecheck($user_id,$pdo) ){

          return "Too many login attempts";

        }
        else{




          if( password_verify($password,$db_password) ){


            $user_browser = $_SERVER["HTTP_USER_AGENT"];

            $user_id = preg_replace("/[^0-9]+/","",$user_id);
            $username = preg_replace("/[^a-zA-Z0-9\-_]/","",$username);

            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['login_string'] = hash('sha512',
                                        $db_password . $user_browser);

            return true;


          }
          else{

            $current_time = time();
            $stmt = $pdo->prepare("INSERT INTO login_attempts(user_id,time)
                           VALUES (:user_id,:current_time)");
            $stmt->execute(["user_id"=>$user_id,"current_time"=>$current_time]);

            return "Wrong username or password";

          }

        }
      }
      else{


        return "Wrong username or password";

      }


    }


  }

/**
 * [If there was more thatn 5 login attemtpts in last 2 hours,returns true,
 * false otherwise]
 * @param  [string] $user_id [description]
 * @param  [PDO::Connection] $mysqli  [description]
 * @return [boolean]          [description]
 */
  function brutecheck($user_id,$pdo){

    $current_time = time();
    $valid_attempts = $current_time - (2*60*60);
    if($stmt = $pdo->prepare("SELECT time FROM login_attempts
                                 WHERE user_id = :user_id
                                 AND time > :valid_attempts ")){

      $stmt->execute(['user_id'=>$user_id,'valid_attempts'=>$valid_attempts]);


      if($stmt->rowCount() > 50){

        return true;

      }
      else{

        return false;

      }
    }

  }
/**
 * [Checks if user is logged in.]
 * @param  [PDO::Connection] $mysqli [description]
 * @return [boolean]         [description]
 */
  function login_check($pdo){

    if( isset($_SESSION["user_id"],$_SESSION["username"],$_SESSION["login_string"]) ){

      $user_id = $_SESSION["user_id"];
      $username = $_SESSION["username"];
      $login_string = $_SESSION["login_string"];
      $user_browser = $_SERVER["HTTP_USER_AGENT"];

      if( $stmt = $pdo->prepare("SELECT password FROM members WHERE id = :id LIMIT 1") ){
          $stmt->execute(["id"=>$user_id]);

          if($stmt->rowCount() == 1){


            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $password = $result["password"];
            if( hash_equals($login_string,hash("sha512",$password . $user_browser)) ){

              return true;

            }
            else{
              return false;
            }
          }
          else{

            return false;

          }

      }
      else{
        return false;
      }

      }



    else{

      return false;

    }


  }
/**
 * [Retrun sanitized url.Protection from cross site scripting attack!WT?]
 * @param  [string] $url [description]
 * @return [string]      [description]
 */
  function esc_url($url) {

      if ('' == $url) {
          return $url;
      }

      $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

      $strip = array('%0d', '%0a', '%0D', '%0A');
      $url = (string) $url;

      $count = 1;
      while ($count) {
          $url = str_replace($strip, '', $url, $count);
      }

      $url = str_replace(';//', '://', $url);

      $url = htmlentities($url);

      $url = str_replace('&amp;', '&#038;', $url);
      $url = str_replace("'", '&#039;', $url);

      if ($url[0] !== '/') {
          // We're only interested in relative links from $_SERVER['PHP_SELF']
          return '';
      } else {
          return $url;
      }
  }

  function get_user_settings($pdo){

    if(login_check($pdo)){

      $user_id = $_SESSION["user_id"];
      $user_settings;

      if($stmt = $pdo->prepare("SELECT * FROM users_profiles WHERE user_id = :id LIMIT 1")){

        $stmt->execute(['id'=>$user_id]);
        $user_settings = $stmt->fetch(PDO::FETCH_ASSOC);


        return $user_settings;

      }
      else{

        return false;

      }


    }
    else{

      return false;

    }


  }
  function change_user_settings($setting,$value,$pdo){

    if(login_check($pdo)){
      $user_id = $_SESSION["user_id"];
      $setting = htmlspecialchars($setting);
      $value = htmlspecialchars($value);

      if($stmt = $pdo->prepare("UPDATE users_profiles SET $setting = :value WHERE users_profiles . user_id = :id ")){

        if($stmt->execute(['value'=>$value,'id'=>$user_id]) !== false){
          return "true";
        }


      }
      return "wrong stmt";
    }
    else{

      return false;

    }



  }

 ?>
