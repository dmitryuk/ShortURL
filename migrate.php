<?php
namespace App;

use App\Base\App;

require "autoload.php";

App::init();
App::$mysqli->query(' 
    
CREATE TABLE `urls` (
  `id` INT(11) NOT NULL,
  `url` VARCHAR(128) NOT NULL COMMENT \'Ссылка\'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

');
App::$mysqli->query("
INSERT INTO `urls` (`id`, `url`) VALUES
(1000, 'http://localhost')");


