<?php
//connect to db 

$cnx =  mysqli_connect('localhost','root','','tacosdb');    

if(!$cnx)
{
    echo 'error connection'.mysqli_connect_error();
}
// $user='root';
// $pass='';
// try {
//     $db = new PDO ('mysql:host=localhost;dbname=tacosdb',$user,$pass );

//  }
//  catch (PDOExeption $e)
//  {
//    echo $e->getMessage();

//  }

?>
