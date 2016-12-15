<?
class DBase {
    private $_conn;
    private static $_instance;
    private function __construct() {
        $dsn = 'mysql:localhost;dbname=phpls1016';
        $this->_conn = new PDO($dsn, 'root', '');
    }

    private function __destruct() {
        $this->_conn->free();
    }

    private function __clone() {}

    private function __wakeup() {}
    //создание единственного экземпляра
    public static function getInstance() {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function querySql ($sql) {
        $result = $this->_conn->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}