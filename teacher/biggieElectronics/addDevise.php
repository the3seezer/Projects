<?php
include('config/db_connect.php');

$errors = array('devise'=>'','version'=>'','specifications'=>'');
$devise = $version = $specifications = ' ';
if(isset($_POST['submit'])){
    if(empty($_POST['devise'])){
        $errors['devise'] = "devise name is required";
    }
    else{
        //protecting data going into the browser
        $devise = htmlspecialchars($_POST['devise']);
    }

    if(empty($_POST['version'])){
        $errors['version'] = "the model/version/brand is required";
    }
    else{
        $version = htmlspecialchars($_POST['version']);
    }

    if(empty($_POST['specifications'])){
        $errors['specifications'] = "Specifications are required";
    }
    else{
        $specifications = htmlspecialchars($_POST['specifications']);
      // /* if(!preg_match('/^([a-zA-Z\s]+),\s*([a-zA-Z]*)*$/',$specifications)){
       //     $errors['specifications'] = "specifications must be comma separated";
      //  } */
    }
    if(array_filter($errors)){
        echo 'errors in the form';
    }
    else{
        //adding data into the database
        //protecting data going into the datdbase
        $devise = mysqli_real_escape_string($conn,$_POST['devise']);//you can overwrite the devise variable if u want
        $version = mysqli_real_escape_string($conn,$_POST['version']);
        $specifications = mysqli_real_escape_string($conn,$_POST['specifications']);
        //write query/set sql
        $sql = "INSERT INTO devises(name,brand,specifications) VALUES('$devise','$version','$specifications')";

        //make and check query
        if(mysqli_query($conn,$sql)){
           header('Location:index.php');
        }
        else{
            echo 'query error ' . mysqli_error($conn);
        }
        //header('Location:index.php');
    }
}
?>
<?php include "templates/header.php"; ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="name">Devise Name</label><br>
    <input type="text" name="devise" value="<?php echo htmlspecialchars($devise); ?>"><br>
    <div><?php echo $errors['devise']; ?></div><br>

    <label for="version">Version/Brand/Model</label><br>
    <input type="text" name="version" value="<?php echo htmlspecialchars($version); ?>"><br>
    <div><?php echo $errors['version']; ?></div><br>
    
    <label for="specifications">specifications</label><br>
    <input type="text" name="specifications" value="<?php echo htmlspecialchars($specifications); ?>"><br>
    <div><?php echo $errors['specifications']; ?></div><br>

    <input type="submit" name="submit" value="ADD">
    
</form>
<div><a href="index.php">go to MENU</a></div>
</body>
<?php include "templates/footer.html"; ?>