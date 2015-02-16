<?php
require_once ("config.php");
require_once ("models/database.php");

class Model {
    
    private $table_name;
    private $db;
    
    public function __construct($table_name){
        $this->db = datebase::getDB();
        $this->table_name=$table_name;
    }

    public function getAll($order = false, $up = true){
		$ol = $this->getOL($order, $up);
		$query = "SELECT * FROM `" . $this->table_name . "` $ol";
		return $this->db->select($query);
	}


	protected function getOL($order, $up) {
		if ($order) {
			$order = "ORDER BY `$order`";
			if (!$up) $order .= " DESC";
		}
		return "$order";
	}

	public function getID($id){
		if (!is_numeric($id)) return false;
		$query = "SELECT * FROM `".$this->table_name."` Where `id`=".$id;
		return $this->db->select($query,true);
	}

   	public function getTableName() {
	   return $this->table_name;
    }
}

?>