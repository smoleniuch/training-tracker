<?php

class Session
{
    public static function exists($name)
    {
        if (isset($_SESSION[$name])) {
            return true;
        }

        return false;
    }

    public static function get($name)
    {
        if (self::exists($name)) {
            return $_SESSION[$name];
        }
        return false;
    }

    public static function put($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function delete($name)
    {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    public static function flash($name, $string = "")
    {
        if (self::exists($name)) {
            $temporary = self::get($name);
            self::delete($name);

            return $temporary;
        }

        else{
          if($string){
            self::put($name,$string);
          }


        }
        return "";
    }
}
