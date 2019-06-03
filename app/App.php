<?php


use App\Database\MysqlDatabase;
use core\Autoloader;
use Core\Config;

class App
{
    public $title = "Les terre d'Aris";
    private $db_instance;
    private static $_instance;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new \App();
        }
        return self::$_instance;
    }

    public static function load()
    {
        session_start();
        require ROOT . '/App/Autoloader.php';
        App\Autoloader::register();
        require '../core/autoloader.php';
        Core\Autoloader::register();
    }

    public function getModel($name)
    {
        $class_name = '\\App\\Model\\' . ucfirst($name) . 'Model';
        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        $config = Config::getInstance(ROOT . '/App/Database/MysqlDatabase.php');
        if (is_null($this->db_instance)) {
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }
}