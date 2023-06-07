<?php
 $errors = array('fullname' => '','email' => '','password' => '');
$fullname = $email = $password = "";
$conn = mysqli_connect('localhost','bachu','chamani1992','biggieelectronics');
if(!$conn){
    echo 'error in connection :' . mysqli_connect_error($conn);
}

if(isset($_POST['submit'])){
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);


    //$sql = "SELECT fullname,email,password FROM users WHERE fullname = $fullname";
    $sql = "SELECT `id`, `fullname`, `email`, `gender`, `password`, `created_at` FROM `users` WHERE `fullname`='$fullname'";
    $results = mysqli_query($conn, $sql);
    $users = mysqli_fetch_assoc($results);
   // print_r($users);
   // echo $users['fullname']; didn't output
  //  echo $users['email'];
   // echo $users['password'];
    //good practise
    mysqli_free_result($results);
    mysqli_close($conn);
    
    //from values
    
    if(empty($fullname)){
        $errors['fullname'] = 'your name is required';
    }
    else{
        if($fullname != $users['fullname']){
            $errors['fullname'] = 'Wrong username!';
        }
    }

    if(empty($email)){
        $errors['email'] = 'your email is required';
    }
    else{
        if($email != $users['email']){
            $errors['email'] = 'Wrong email!';
        }
    }

    if(empty($password)){
        $errors['password'] = 'password is required';
    }
    else{
        if($password != $users['password']){
            $errors['password'] = 'Wrong password!';
        }
    }
    
    if(array_filter($errors)){
        echo 'errors in the form';
    }
    else{
        header("Location:index.php?fullname=$fullname");
    }
}

?>
<?php include "templates/header.php"; ?>
<form action="login.php" method="post">
    <label for="fullname">write your name</label><br>
    <input type="text" name="fullname" value="<?php echo $fullname; ?>"><br>
    <div style = "color:red"><?php echo $errors['fullname']; ?></div>

    <label for="email">write your email</label><br>
    <input type="email" name="email" value="<?php echo $email; ?>"><br>
    <div style = "color:red"><?php echo $errors['email']; ?></div>

    <label for="password">write your password</label><br>
    <input type="password" name="password" value="<?php echo $password; ?>"><br>
    <div style = "color:red"><?php echo $errors['password']; ?></div>
    <input type="submit" name="submit" value="login in">
</form>
<!-- <div><a href="index.php">go to MENU</a></div> -->
</body>
<?php include "templates/footer.html"; ?>