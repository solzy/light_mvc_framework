<?php

class DataAccess{
	
	protected $hostname;
	protected $username;
	protected $password;
	protected $dbname;
	protected $db;
	protected $sql;
	protected $result;
	protected $result_array=array();

	/**
	 * @param $hostname : localhost
	 * @param $username : 数据库用户名
	 * @param $password : 数据库密码
	 * @param $db : 链接数据库返回的对象
	 * @param $database : 数据库名称
	 * @param $sql : sql语句
	 * @param $result : 查询数据库后返回的对象
	 */


	function __construct( $hostname , $username , $password , $dbname){
		$this->hostname = $hostname;
		$this->username = $username;
		$this->password = $password;
		$this->dbname = $dbname;
		@$this->db = new mysqli($this->hostname ,$this->username , $this->password ,$this->dbname);
		if( !$this->db ){
			throw new Exception("不能链接到数据库！\n");
		}
		$this->db->query("set names 'utf8'");

	}


	function __destruct( ){
		
		$this->db->close();
	}


	/**
	 * function select() 对数库进行select查询
	 * @param $slectcontent 要查询的内容
	 * @param $condition 要查询的条件(包括表名)
	 */

	public function select( $slectcontent ,  $condition ){
	
		$this->sql = "select $slectcontent from $condition";
		$this->result = $this->db->query( $this->sql );
	//	echo  '$this->sql='.$this->sql.'<br>';
		if( !$this->result ){
			throw new Exception("select fail!\n");
		}
		return $this->result;
	}


	/**
	 * function insert( ) 对数库进行插入操作
	 * @param $tablename 表名
	 * @param $inserts  数组类型的变量 代表所要插入的字段名称和字段值
	 * eg: $insert = array( 'first' => '1',
	 *						'second' => '2',
	 *						'third' => '3'
	 *					);
	 */

	public function insert( $tablename , $inserts ){
		//$values = array_map('mysql_real_escape_string', array_values($inserts));
		$keys = array_keys($inserts);		        
		$this->sql = "insert into $tablename ( ".implode(',' , $keys) .") values ('". implode( '\',\'' , $inserts) . "')";
		$this->result = $this->db->query( $this->sql );
	//	print $this->sql."\n";
		if( !$this->result ){
			throw new Exception("insert fail!\n");
		}

	}


	/**
	 * function delete() 对数库进行删除操作
	 * @param $tablename 表名
	 * @param $where 要查询的条件
	 */

	public function delete( $tablename , $where ){
	
		$this->sql = "delete from $tablename where $where";
		print $this->sql;
		$this->result = $this->db->query( $this->sql );
		if( !$this->result ){
			throw new Exception("delete fail\n");
		}
		
	}


	/**
	 * function update() 对数库进行数据修改操作
	 * @param $tablename 表名
	 * @param $set	设置修改字段和修改值
	 * @param $where 设置修改条件
	 */

	public function update( $tablename , $set , $where ){
	
		$this->sql = "update $tablename set $set where $where";
		//print  $this->sql;
		$this->result = $this->db->query( $this->sql );
		if( !$this->result ){
			throw new Exception("update fail!\n");
		}

	}

	/**
	 * function num_rows() 
	 */
	
	public function num_rows( ){
			
		if($this->result == NULL){
			throw new Exception("资源为空！");		
		}
		else{
			return $this->result->num_rows;			
		}							
	}
	
	
	/**
	 * function affected_rows( )
	 */
	
	public function affected_row( ){
		
		if($this->result == NULL){
			throw new Exception("资源为空！");
		}
		else{
			//mysql_affectd_rows()
			return $this->db->affectd_rows;
		}
	} 
	
    /**
	 * function get_result( )
	 */
	
	public function get_result( ){
			return $this->result->fetch_assoc();
	} 
    /**
	 * function get_result_array( )
	 */
	
	public function get_result_array( ){
	    while($arrary = $this->result->fetch_assoc()){
            $this->result_array[]=$arrary;
        } 
		return $this->result_array;
	} 
    
	//数据库备份
	function dbBackup( ){

		//get all of the tables
		$tables = array();
		$this->result = $this->db->query("show tables");
		if($this->result == NULL){
			throw new Exception("资源为空！");
		}
		for($i = 0 ; $i < $this->result->num_rows ;$i++){
			$row =$this->result->fetch_array();
			$tables[] = $row[0];
		}
		$return.="\n--Database backup\n--Count ".count($tables)." tables\n--Date:".date("Y-m-d").time()."\n--From:大连工业大学网络期刊\n\n";
		foreach($tables as $table){
			$return.= 'DROP TABLE '.$table.';';
			$this->result = $this->db->query('SHOW CREATE TABLE '.$table);
			if($this->result == NULL){
				throw new Exception("资源为空！");
			}
			for($i = 0 ; $i < $this->result->num_rows ;$i++){
				$row =$this->result->fetch_array();
				$return.= "\n\n".$row[1].";\n\n";
			}
			$this->result = $this->db->query('SELECT * FROM '.$table);
			if($this->result == NULL){
				throw new Exception("资源为空！");
			}
			for($k = 0 ; $k < $this->result->num_rows ;$k++){
				$return.= "INSERT INTO `$table` VALUES(";
				$rows =$this->result->fetch_array();
				$count =  count($rows)/2;
				for($j = 0 ; $j < $count; $j++){
					$rows[$j] = addslashes($rows[$j]);
					$rows[$j] = ereg_replace("\n","\\n",$rows[$j]);
					if (isset($rows[$j])) {
						$return.= '"'.$rows[$j].'"' ;
					} else { 
						$return.= '""';
					}
					if ($j< $count-1 ) {
						$return.= ",";
						unset($rows[$j]);
					}
					
				}
				$return.= ");\n";
			}
		
			$return.="\n\n\n";
		}
		//save file
		$filemaniplate = new FileManipulate(BACKUP.'/db-backup-'.date('YmdHis').'-'.$this->dbname.'.sql' );
		$filemaniplate->createFile();
		$filemaniplate->writerFile($return);
	}
}
/*
	//应用
	try{
		$test = new DataAcess('localhost', 'root', 'zhangyun', 'test');
		$test->delete( "test" , "id = 8");
		$test->update( "test" , "name = 'modify5'" , "id = 5");
		$test->insert( "test" , array( 
					'id' => 0,
					'name' => 'test0',
					));
		$select = $test->select( '*' , "test");
	}catch( Exception $e ){
		print $e->getMessage();
	}
*/
?>