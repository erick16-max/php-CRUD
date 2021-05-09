<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require_once 'process.php' ?>
<?php require 'config.php';?>

<?php 
//sending alert messaging
if(isset($_SESSION['message'])): ?>
<div class="alert alert-<?=$_SESSION['msg_type'] ?>">
<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
<?php endif ?>

<?php
//dispaying data to user
$result=$mysqli->query("SELECT * FROM data") or die (mysqli_error($mysqli));
?>


<div class="container">
<div class="row justify-content-center"></div>
<table class="table">
<thead>
<tr>
  <th >Name</th>
  <th >Location</th>
  <th colspan="2">Action</th>
</tr>
</thead>
<?php
while ($row=$result->fetch_assoc()):

?>
<tr>
    <td><?php echo $row['name']; ?></td>
     <td><?php echo $row['location']; ?></td>
     <td>
     <a href="index.php?edit=<?php echo $row['id']?>"class="btn btn-info" >
      <i class="fas fa-fw fa-edit"></i>Edit</a>
      <a href="process.php?delete=<?php echo $row['id'];?>"class="btn btn-danger" >
      <i class="fas fa-fw fa-trash"></i>Delete</a>

    
     </td>
</tr>
<?php endwhile;?>
</table>
</div>


 
 <div class="row justify-content-center">
    <form action="process.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" value="<?php echo $name;?>" name="name"  placeholder="Enter your name">
    </div>

    <div class="form-group">
    <label for="">Location</label>
    <input type="text"  class="form-control" value="<?php echo $location;?>" name="location"  placeholder="City/town">
    </div>
     <div class="form-group">
     <?php
     if($update==true):
     ?>
      <button type="submit" class="btn btn-info" name="update">Update</button>
  <?php
  else:
  ?>
    <button type="submit" class="btn btn-primary" name="save">save</button>
  <?php endif;?>
     </div> 

    </form>
    </div>
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>