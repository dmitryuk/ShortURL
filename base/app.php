<?php

namespace App\Base;

/**
 * Class App Основной класс программы, одиночка
 * @package app
 */
final class App
{
    private $_config;
    private static $_instance;
    public static $mysqli;
    private $action;

    //перекрываем методы
    private function __construct()
    {
        //загружаем настройки
        $this->_config = require __DIR__ . "/config.php";
        //отдельный класс mysql не создавал потому что мало запросов
        self::$mysqli = mysqli_connect(
            $this->_config['dbhost'], $this->_config['dbuser'], $this->_config['dbpassword'], $this->_config['db']
        );
        if (!self::$mysqli) throw new \Exception("Ошибка подключения к базе");
    }


    public static function init()
    {
        return (isset(self::$_instance) ? self::$_instance : new self());
    }

    public function start()
    {
        $this->action = isset($_GET['r']) ? $_GET['r'] : '';

        //получаем Ajax запрос
        if ($this->action == 'ajaxAddUrl') {
            $url = (isset($_POST['url'])) ? $_POST['url'] : '';
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                header("HTTP/1.0 404 Not Found");
                return;
            }
            $shortURL = UrlClass::generate($url);
            if ($shortURL === false) {
                header("HTTP/1.0 404 Not Found");
                return;
            }

            echo $shortURL;
        } elseif ($this->action) {
            //пробуем найти URL

            $url = UrlClass::getUrlByShortURL($this->action);
            if ($url)
                header('Location: ' . $url);
            else
                header("HTTP/1.0 404 Not Found");
        } else
            require_once "templates/index.php";
    }

    private function __clone()
    {
    }


}