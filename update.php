<?php
include("main.php");
include("connection.php")
?>

<?php
$u_id = $_GET['id'];
$query = mysqli_query($connection,"Select * from user WHERE id = '$u_id'");
if ($query){
    while($row = mysqli_fetch_assoc($query)){
?>
    <div class="container mt-4">
        <div class="form-boot" style="border: 3px solid gray;padding: 40px;">
        <form class="row g-3" action="#" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $row['Name']?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $row['Email']?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="text" name="pass" class="form-control" value="<?php echo $row['Password']?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Confirm Password</label>
    <input type="text" name="cpass" class="form-control" value="<?php echo $row['CPass']?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select" name="role" required>
        <?php
        if($row['Role'] == 0){
            echo '<option selected value="0">admin</option>';
            echo '<option value="1">user</option>';
        }else{
            echo '<option value="1" selected>user</option>';
            echo '<option value="0">admin</option>';
        }
        ?>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputZip" class="form-label">Image</label>
    <input type="file" class="form-control" name="img" accept="image/png, image/gif, image/jpeg" value="<?php echo $row['img']?>" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="btn">Update User</button>
    <a href="show.php" class="btn btn-danger">Show User</a>
  </div>
</form>
        </div>
    </div>
    <?php
       }
    }?>
    <?php
        if(isset($_POST['btn'])){
            $password = $_POST['pass'];
            $Cpassword = $_POST['cpass'];
            if($password == $Cpassword){
            include('connection.php');
         $name = $_POST['name'];
         $email = $_POST['email'];
         $pass = $_POST['pass'];
         $cpass = $_POST['cpass'];
         $role = $_POST['role'];
         $file = $_FILES['img'];
         $imgname = $file['name'];
         $imgpath = $file['tmp_name'];
         $location = 'img/'.$imgname;
         move_uploaded_file($imgpath,$location);
         $query = "UPDATE `user` SET `Name`='$name',`Email`='$email',`Password`='$pass',`CPass`='$cpass',`Role`='$role',`add_date`=current_timestamp(),`img`='$imgname' WHERE id = '$u_id'";
         $sql = mysqli_query($connection,$query);
         if($sql == 1){
            echo '<script>alert("Data Updated");window.location.href="http://localhost/crud/show.php"</script>';
        }
        else{
            echo '<script>alert("Failed to Update");window.location.href="http://localhost/crud/insert.php"</script>';
         }
         }
         else{
            echo '<script>alert("Password And Confirm Password Dont Match");window.location.href="http://localhost/crud/insert.php"</script>';
        }
    }
    

    ?>