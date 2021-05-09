<?php
session_start(); 
require_once 'config.php';
$update=false;
$name='';
$location='';
$id=0;

//Adding data to database
if(isset($_POST['save'])){
    $name=     $_POST['name'];
    $location= $_POST['location'];
    $update=false;

    $mysqli->query("INSERT INTO data (name,location) VALUES ('$name','$location')")or die($mysqli->error);

    $_SESSION['message']="Data has been saved successfully!!";
    $_SESSION['msg_type']="success";

    header("location:index.php");
}

//deleting data from database

if(isset($_GET['delete'])){
$id= $_GET['delete'];

  

$mysqli->query("DELETE FROM data WHERE id=$id")or die ($mysqli->error());

    $_SESSION['message']="Data has been deleted!!";
    $_SESSION['msg_type']="danger";

     header("location:index.php");

}//editing data from database
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $result=$mysqli->query("SELECT * FROM data WHERE id=$id") or die ($mysqli->error());

      
        $row=$result->fetch_array();
        $name=$row['name'];
        $location=$row['location'];
    

}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $location=$_POST['location'];

    $mysqli->query("UPDATE data SET name='$name',location='$location' WHERE id=$id") or die ($mysqli->error());

    $_SESSION['message']="successfully updated!";
    $_SESSION['msg_type']="warning";

    header("location:index.php");
}
?>


