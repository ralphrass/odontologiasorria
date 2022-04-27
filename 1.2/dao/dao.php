<?php require_once("php7_mysql_shim.php");
//session_start();
//print_r($_SESSION);
class DAO
{
	var $table;
	var $statement;
	var $arr_fields;
	var $pk;
	//var $con;
	var $rs;
	var $db_con;
	
	function DAO($table, $pk)
	{
		$this->table = $table;
		$this->pk = $pk;
		$this->db_con = $_SESSION['db_con'];
		
		//$this->connect();
	}
	
	/*function connect()
	{
		$this->con = mysql_pconnect("localhost","root","") or die($msg[0]);
		mysql_select_db("odonto",$this->con) or die($msg[1]);
	}*/
	
	function inserir()
	{
		$this->statement = "INSERT INTO ".$this->table." (";
		
		$sql = $this->une_valores_insert($this->arr_fields, true);
		
		$this->statement .= $sql.") VALUES (";
		
		$sql = $this->une_valores_form($this->arr_fields, true);
		
		$this->statement .= $sql.")";
//echo $this->statement;		
		mysql_query($this->statement,$this->db_con);
		
		$_SESSION[$this->pk] = mysql_insert_id();
	}
	
	function une_valores_insert($arr_val, $test_for_insert=false)
	{
		$sql = "";
		
		foreach ($arr_val as $key => $value){
			if ($test_for_insert === true){
				if (isset($_POST[$value]) && $_POST[$value] != ""){
					$sql .= $value.", ";
				}
			} else {
				$sql .= $value.", ";
			}
		}
		
		$sql = substr($sql, 0, strlen($sql)-2);
		
		return $sql;
	}
	
	function une_valores_form($arr_val, $test_for_insert=false)
	{
		$sql = "";
		
		foreach ($arr_val as $key => $value){
			if ($test_for_insert === true){
				if ($_POST[$value]){
					$sql .= "'".$_POST[$value]."', ";
				}
			} else {
				$sql .= "'".$_POST[$value]."', ";
			}
		}
		
		$sql = substr($sql, 0, strlen($sql)-2);
		
		return $sql;
	}
	
	function alterar()
	{
		$this->statement = "UPDATE ".$this->table." SET ";
		
		$sql = $this->une_valores_update();
		
		$this->statement .= $sql." WHERE ".$this->pk." = '".$_POST[$this->pk]."' ";
	}
	
	function une_valores_update()
	{
		$sql = "";
		
		foreach ($this->arr_fields as $key => $value){
			if (isset($_POST[$value]) && $_POST[$value]){
				$sql .= $value." = '".$_POST[$value]."', ";
			}
		}
		
		$sql = substr($sql, 0, strlen($sql)-2);
		
		return $sql;
	}
	
	function deletar()
	{
		$this->statement = "DELETE FROM ".$this->table." WHERE ".$this->pk." = '".$_POST[$this->pk]."' ";
		
		mysql_query($this->statement) or die("Impossível excluir o cliente!");
	}
	
	function listar()
	{
		$this->statement = "SELECT ";	
		
		$sql = $this->une_valores_insert($this->arr_fields);
		
		$this->statement .= $sql." FROM ".$this->table;
	}
}

?>