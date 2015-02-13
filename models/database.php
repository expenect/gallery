<?
require_once("config.php");
class datebase{

    private static $db = null;
    private $config;
    private $mysqli;

    private function __construct(){
        $this->config = new Config();
        $this->mysqli = new mysqli($this->config->db_host, $this->config->db_user, $this->config->db_password, $this->config->db_name);
        $this->mysqli->query("SET NAMES 'utf8'");
    }

    public static function getDB(){
        if (self::$db==null)  self::$db = new datebase();
        return self::$db;
    }

    public function select($query){
        $result = $this->mysqli->query($query);
        if (!$result) return false;
        return $this->result_to_array($result);
    }

    public function result_to_array($result){
        $array = array();
        while (($row = $result->fetch_assoc()) != false) {
            $array[] = $row;
        }
        return $array;
    }

    public function __destruct() {
        if ($this->mysqli) $this->mysqli->close();
    }

}