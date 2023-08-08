<?php
include('main.php');
include('connection.php');
session_start();
if(!isset($_SESSION['name'])){
    header('Location: http://localhost/crud/index.php');
}
?>
<?php
if($_SESSION['role'] == 0){


?>
<div class="container mt-4">
    <div class="name">
        <h4>Welcome again, <?php echo $_SESSION['name']?></h4>
    </div>
    <div class="btns text-end">
        <a href="./insert.php" class="btn btn-warning mb-5">Add User</a>
        <a href="./logout.php" class="btn btn-danger mb-5">Logout</a>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Image</th>
      <th scope="col">Add_BY</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = mysqli_query($connection,'SELECT * FROM `user`');
    if($query){
        while($row = mysqli_fetch_assoc($query)){
    ?>
    <tr>
      <th scope="row"><?php echo $row['id']?></th>
      <td><?php echo $row['Name']?></td>
      <td><?php echo $row['Email']?></td>
      <td><?php echo $row['Password']?></td>
      <td><?php $row['Role'];
      if($row['Role'] == 0){
          echo "Admin";
        }else{
        echo "User";
      }
      ?></td>
      <td><img src="<?php echo "img/".$row['img']?>" width="40" alt=""></td>
      <td><?php echo $row['add_date']?></td>
      <td><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-warning">Edit</a>
      <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
    </td>
    </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>
</div>
<?php

}else{ 
    ?>
    <div class="container mt-4">
    <div class="name">
        <h4>Welcome again, <?php echo $_SESSION['name']?></h4>
    </div>
    <div class="btns text-end">
        <a href="./logout.php" class="btn btn-danger mb-5">Logout</a>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Image</th>
      <th scope="col">Add_BY</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query = mysqli_query($connection,'SELECT * FROM `user`');
    if($query){
        while($row = mysqli_fetch_assoc($query)){
    ?>
    <tr>
      <th scope="row"><?php echo $row['id']?></th>
      <td><?php echo $row['Name']?></td>
      <td><?php echo $row['Email']?></td>
      <td><?php echo $row['Password']?></td>
      <td><?php $row['Role'];
      if($row['Role'] == 0){
          echo "Admin";
        }else{
        echo "User";
      }
      ?></td>
      <td><img src="<?php echo "img/".$row['img']?>" width="40" alt=""></td>
      <td><?php echo $row['add_date']?></td>
    </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>
</div>
<?php
}
?>

?>