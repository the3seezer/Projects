<?php 
    include('config/db_connect.php');

    $fullname = $email = $gender = $password = '';
    $errors = array('fullname'=>'','email'=>'','password'=>'','exists'=>'');

    if(isset($_POST['submit'])){
        //echo htmlspecialchars($_POST['fullname']);//To prevent XSS/javascript sql injection
        //fullname
        if(empty($_POST['fullname'])){
            $errors['fullname'] = 'your name is required <br />';
        } // end if
        else{
            //echo htmlspecialchars($_POST['fullname']);
            $fullname = htmlspecialchars($_POST['fullname']);
            if(!preg_match('/^[a-zA-Z\s]+$/',$fullname)){
                $errors['fullname'] = 'Fullname must be letters and spaces only<br/>';
            } // end if
        } // end else
        //email
        if(empty($_POST['email'])){
            $errors['email'] = 'your email is required <br />';
        } // end if
        else{
            $email = htmlspecialchars($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'email must be a validy email <br/>';
            } // end if
        } // end else

        //gender
        $gender = htmlspecialchars($_POST['gender']);

        //password
        if(empty($_POST['password'])){
            $errors['password'] = 'your password is required <br />';
        } // end if
        else{
            $password = htmlspecialchars($_POST['password']);
        } // end else

        $sql ="SELECT `fullname`, `email`, `password`FROM `users` WHERE `email`='$email'";
        $results = mysqli_query($conn,$sql);
        $user = mysqli_fetch_assoc($results);
           
        if($fullname == $user['fullname'] && $email == $user['email']){
           $errors['exists'] = 'username and email already exists';
        } // end if

        //if valid/no errors then redirect to the other page
        if(array_filter($errors)){ // if 'form isn't valid';
            echo 'errors in the form';
        } // end if
        else{
            // echo
            $fullname = mysqli_real_escape_string($conn,$fullname);
            $email = mysqli_real_escape_string($conn,$email);
            $gender = mysqli_real_escape_string($conn,$gender);
            $password = mysqli_real_escape_string($conn,$password);
            $sql = "INSERT INTO users(fullname,email,gender,password) VALUE ('$fullname','$email','$gender','$password')";
            if(mysqli_query($conn,$sql)){
                $sql = "SELECT * FROM `users` WHERE `fullname` = '$fullname'";
                $result = mysqli_query($conn,$sql);
                $users = mysqli_fetch_assoc($result);
                //good practise
                mysqli_free_result($result);
                mysqli_close($conn);
               // print_r($users);
                header("Location:login.php");
            } // end if
            else{
                echo 'query error ' . mysqli_error($conn);
            } // end else
            
        } // end else
    } // end if
?>

<!DOCTYPE html>
<html lang="en">
<?php include "templates/header.php"; ?>
<div>
    <form action="registration.php" method="post">
        <div style = "color:red;"><?php echo $errors['exists']; ?></div><br>

        <label for="fullname">fullname</label><br>
        <input type="text" name="fullname" style="background-color: blue; color: white;" value = "<?php echo htmlspecialchars($fullname); ?>"><br>
        <div style = "color:red;"><?php echo $errors['fullname']; ?></div><br>

        <label for="email">email</label><br>
        <input type="text" name="email" value = "<?php echo htmlspecialchars($email); ?>" class="color"><br>
        <div style = "color:red;"><?php echo $errors['email']; ?></div><br>

        <label for="gender">gender</label><br>
        <select name="gender" id="gender" value = "<?php echo htmlspecialchars($gender); ?>">
            <option value="male">male</option>
            <option value="female">female</option>
        </select><br><br>

        <label for="password">password</label><br>
        <input type="password" name="password" value = "<?php echo htmlspecialchars($password); ?>" class="color"><br><br>
        <input name="submit" type="submit" value="Register">
        <div style = "color:red;"><?php echo $errors['password']; ?></div><br>
    </form>
</div>

</body>
<?php include "templates/footer.html"; ?>