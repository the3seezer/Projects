<?php 
$conn = mysqli_connect('localhost','bachu','chamani1992','biggieelectronics');//connect to database
//check connection
if(!$conn){
    echo 'connection error:' . mysqli_connect_error($conn);
}
?>