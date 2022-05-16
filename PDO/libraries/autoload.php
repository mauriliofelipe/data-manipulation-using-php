<?php

spl_autoload_register(function ($class) {
      if (file_exists("libraries/classes/{$class}.php")) {
            require_once "libraries/classes/{$class}.php";
      }
});
