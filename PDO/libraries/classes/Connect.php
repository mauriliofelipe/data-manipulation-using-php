<?php

abstract class Connect
{
      private $hostname = ini_get("mysqli.default_host");
      private $username = ini_get("mysqli.default_user");
      private $password = ini_get("mysqli.default_pw");
      private $database = "";

      protected function getConnection()
      {
            try {
                  $conn = new PDO("mysql:host={$this->hostname};dbname={$this->database}", $this->username, $this->password);
                  return $conn;
            } catch (PDOException $e) {
                  return $e->getMessage();
            }
      }

}
