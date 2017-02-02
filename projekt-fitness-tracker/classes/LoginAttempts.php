<?php

  class LoginAttempts
  {
      private $db;

      public function __construct($db)
      {
          $this->db = $db;
      }

      public function add($id)
      {
          $currentTime = time();

          $this->db->query("INSERT INTO `login_attempts` (`attempt`, `user_id`, `time`) VALUES (NULL, :user_id, :time);",
                                                                      array(":user_id" => $id,":time" => $currentTime));
      }

      public function getAmount($id, $secondsAgo)
      {
          if ($id) {
              $timeAgo = time() - $secondsAgo;

              $this->db->query("SELECT * FROM `login_attempts` WHERE `user_id` = :id AND `time` > :timeAgo ",
                                                                array(":id" => $id,":timeAgo" => $timeAgo));
              return $this->db->count();
          }
          return 0;
      }
  }
