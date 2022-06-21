<?php
 include 'admin.php';
 include '../../config/connection.php';
 $connect=new connect();
 $conn=$connect->getConn();
 
	if (isset($_GET["action"])){
    
    $action=$_GET["action"];
    
	}
	else{
    $action="";
	}

	switch ($action){
	case "delete_from_table":
        $table_name=$_POST["table_name"];
        $id=$_POST["del_id"];
        $name_id=$_POST["name_id"];
        $connect=new connect();
		$conn=$connect->getConn();
        $add_new_query = "DELETE FROM `$table_name` WHERE $name_id=$id";
        $result = $conn->query($add_new_query);
		//echo $add_new_query;
        break;
		
	}
    