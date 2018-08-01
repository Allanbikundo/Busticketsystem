<?php
session_start();
include "header.php";
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        $stmt = $dbh->prepare('SELECT * FROM user_login WHERE username=?');
        $stmt->bindParam(1,$username);
        $stmt->execute();
        $row = $stmt->fetch();
        $hash2 = $row['password'];
        $user = $row['username'];
        $full = $row['fullname'];
        $type = $row['type'];
        $act = $row['active'];
        $userid = $row['id'];
        $verify=password_verify($password, $hash2);
        if ($verify) {
            if($act=='1'){
                //session_start();
                $_SESSION['username'] = $user;
                $_SESSION['fullname'] = $full;
                $_SESSION['type'] = $type;
                $_SESSION['userid'] = $userid;
                ?>
                <script>location.href="redirect.php"</script>
                <?php
            } else{
                echo '<div class="alert alert-warning" role="alert">Account is not active, please open your email inbox and click link activation.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Invalid password.</div>';
        }
    } catch (PDOException $e) {
        echo 'Error: ',  $e->getMessage(), "\n";
    }
}
if(isset($_GET['email']) && !empty($_GET['email'])){
    if(isset($_GET['hash']) && !empty($_GET['hash'])){
        $email = $_GET['email'];
        $hash = $_GET['hash'];
        $act = 0;
        $act2 = 1;
        $stmt = $dbh->prepare('SELECT * FROM user_login WHERE email=? AND hash=? AND active=?');
        $stmt->bindParam(1,$email);
        $stmt->bindParam(2,$hash);
        $stmt->bindParam(3,$act);
        $stmt->execute();
        if($stmt->rowCount()){
            $stmt = $dbh->prepare('UPDATE user_login SET active=? WHERE email=? AND hash=?');
            $stmt->bindParam(1,$act2);
            $stmt->bindParam(2,$email);
            $stmt->bindParam(3,$hash);
            if($stmt->execute()){
                echo '<div class="alert alert-success" role="alert">Your account has been activated, you can now login</div>';
            } else{
                echo '<div class="alert alert-danger" role="alert">The url is either invalid or you already have activated your account</div>';
            }
        }
    }else{
        echo '<div class="alert alert-danger" role="alert">Invalid approach, please use the link that has been send to your email</div>';
    }
}
?>
<div class="panel panel-default" style="margin-top:80px;">
    <div class="panel-body">
        <h3 class="text-center" style="font-weight:bolder;margin:10px 0;">User Login</h3>
        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Jane Doe" required/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="enter the strong password you registerd with" required/>
            </div>
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            <p style="clear:both;">
                <div style="float:right;"><a href="register.php">Register New User</a></div>
            </p>
        </form>
    </div>
</div>
<?php
include "footer.php";
?>
