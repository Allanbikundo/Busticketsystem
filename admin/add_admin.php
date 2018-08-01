 <!DOCTYPE html>
 <html >
 <?php
include "layout/head.php"
  ?>
 <?php
 include "layout/nav.php"
  ?>

 <!-- Content -->
 <div class="main">
   <?php
   include "../header.php";
   if(isset($_POST['reg'])){
       $fn = $_POST['fullname'];
       $em = $_POST['email'];
       $un = $_POST['username'];
       $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
       $hash = md5(rand(0,1000));
       try {
           $stmt = $dbh->prepare("INSERT INTO loginphp VALUES('',?,?,?,?,'Company Manager','1',?)");
           $stmt->bindParam(1,$fn);
           $stmt->bindParam(2,$em);
           $stmt->bindParam(3,$un);
           $stmt->bindParam(4,$pw);
           $stmt->bindParam(5,$hash);
           if($stmt->execute()){
               echo '<div class="alert alert-success" role="alert">The account has been successfully created </div>';
           } else{
               echo '<div class="alert alert-danger" role="alert">Register new user error, please try again</div>';
           }
           $row = $stmt->fetch();
           $password = $row['password'];
           $user = $row['username'];
           $full = $row['fullname'];
           $act = $row['active'];
           if (password_verify($password, $hash)) {
               if($act=='1'){
                   echo '<div class="alert alert-danger" role="alert">Password is valid!</div>';
                   session_start();
                   $_SESSION['username'] = $user;
                   $_SESSION['fullname'] = $full;
                   ?>
                   <script>location.href="admin/index.php"</script>
                   <?php
               } else{
                   echo '<div class="alert alert-warning" role="alert">Account has been created successfully</div>';
               }
           } else {

           }
       } catch (PDOException $e) {
           echo 'Error: ',  $e->getMessage(), "\n";
       }
   }
   ?>
   <div class="panel panel-default" style="margin-top:80px;">
       <div class="panel-body">
           <h3 class="text-center" style="font-weight:bolder;margin:10px 0;">Company Manager Registration</h3>
           <form method="post">
               <div class="form-group">
                   <label for="fullname">Full Name</label>
                   <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Enter full name" required/>
               </div>
               <div class="form-group">
                   <label for="email">Email</label>
                   <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required/>
               </div>
               <div class="form-group">
                   <label for="username">Username</label>
                   <input type="text" id="username" name="username" class="form-control" placeholder="Enter username" required/>
               </div>
               <div class="form-group">
                   <label for="password">Password</label>
                   <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required/>
               </div>
               <button type="submit" name="reg" class="btn btn-primary btn-block">Register</button>
           </form>
       </div>
   </div>
   <?php
   include "../footer.php";
   ?>
 </div>
 <?php
include"layout/footer.php"
  ?>
