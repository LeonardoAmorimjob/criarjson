<?php
 define('DB_NAME','bd');
 define('DB_USER', 'root');
 define('DB_PASSWORD', '');
 define('DB_HOST', 'localhost');
 function open_database() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;
    } catch(Exception $e) {
        echo $e->getMessage();
        return null;
    }
}
$conn= open_database();
header('content-type:application/json');
$table="sistema_usuarios";
$sql="SELECT * FROM ".$table;
$result=$conn->query($sql);
$usuarios=array();
if($result->num_rows>0){
    $usuarios=$result->fetch_all(MYSQLI_ASSOC);
}
//echo json_encode(array('usuarios'=>$usuarios));

$users=json_encode(array('usuarios'=>$usuarios));
$u=json_decode($users);
foreach( $u as $teste){
    echo $teste->id;
}