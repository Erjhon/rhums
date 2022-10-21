<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>IT SourceCode</title>
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/style.css">
  </head>
  <?php require_once('../config.php');




$id=$_SESSION['id'];
$query=mysqli_query($conn,"SELECT * FROM patients")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
  <h1>User Profile</h1>
<div class="profile-input-field">
        <h3>Please Fill-out All Fields</h3>
        <form method="POST" action="#" >
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="email" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['email']; ?>" required />
          </div>
           <div class="form-group">
                         <h4 class="text-dark">Password</h4>
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Password" name ="password" type="password" required>
                      </div>
                    </div>
               

                  
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
             <a href="logout.php">Log out</a>
           </center>
          </div>
        </form>
      </div>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $email = $_POST['email'];
         $password = md5($_POST['password']);
               
         $query = "UPDATE patients SET email = '$email', password = '$password' where id ='$  id'";
   
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "profile.php";
        </script>
        <?php
             }               
?>