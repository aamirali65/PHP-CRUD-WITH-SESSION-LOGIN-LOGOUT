<?php
include("main.php")
?>
    <div class="container mt-4">
        <div class="form-boot" style="border: 3px solid gray;padding: 40px;">
        <form class="row g-3" action="#" method="post" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" name="pass" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Confirm Password</label>
    <input type="password" name="cpass" class="form-control" id="inputPassword4" required>
  </div>
  <div class="col-md-6">
    <label for="inputState" class="form-label">Role</label>
    <select id="inputState" class="form-select" name="role" required>
      <option selected value="0">admin</option>
      <option value="1">user</option>
    </select>
  </div>
  <div class="col-md-6">
    <label for="inputZip" class="form-label">Image</label>
    <input type="file" class="form-control" name="img" accept="image/png, image/gif, image/jpeg" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="btn">Add User</button>
    <a href="show.php" class="btn btn-danger" name="btn">Show User</a>
  </div>
</form>
        </div>
    </div>
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
         $sql = mysqli_query($connection,"INSERT INTO `user`(`id`, `Name`, `Email`, `Password`, `CPass`, `Role`, `add_date`, `img`) VALUES 
         ('','$name','$email','$pass','$cpass','$role',current_timestamp(),'$imgname')");
         if($sql == 1){
            echo '<script>alert("Your Data inserted Successfully");window.location.href="http://localhost/crud/show.php"</script>';
        }
        else{
            echo '<script>alert("Failed to insert data");window.location.href="http://localhost/crud/insert.php"</script>';
         }
         }
         else{
            echo '<script>alert("Password And Confirm Password Dont Match");window.location.href="http://localhost/crud/insert.php"</script>';
        }
    }
    

    ?>