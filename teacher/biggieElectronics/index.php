<?php
include('config/db_connect.php');
$users = '';
if(isset($_GET['fullname'])):
    //write query for users;just to get one record of user according to login executions
    $fullname = htmlspecialchars($_GET['fullname']);
    $sql = "SELECT `fullname`, `email` FROM `users` WHERE `fullname`= '$fullname'";  //$sql = 'SELECT * FROM users';for all properities
    //make query & get results
    $results = mysqli_query($conn, $sql);
    //fetch the resulting rows as an array;all of the table data rows
    $users = mysqli_fetch_assoc($results);
endif;
//print_r($users);

//devise query writting,making & fetching
$sql = 'SELECT name,brand,specifications,id FROM devises ORDER BY created_at';
$results = mysqli_query($conn,$sql);
$devises =  mysqli_fetch_all($results,MYSQLI_ASSOC);
//print_r($devises);
//GOOD PRACTISE
//free results from memory
mysqli_free_result($results);
//close connection
mysqli_close($conn);
//print_r($users);


?>
        <div>
            <div>
                <?php if(isset($users['fullname'])):// foreach($users as $user){ ?>
                    <h4>Me</h4>
                    <p><?php echo htmlspecialchars($users['fullname']); ?></p>
                    <p><?php echo htmlspecialchars($users['email']); ?></p>
                <?php endif;// } ?>
            </div>
        </div>
<?php include "templates/header.php"; ?>
<style>
    div.in{
        display:inline-block;
    }
</style>
<div>
    <div>
        <div>
              <nav class="white z-depth-0">
                <div>
                    <a href="#">Menu</a>
                    <ul id="" class="">
                        <li class=""><a href="registration.php">Sign up</a></li>
                        <li class=""><a href="login.php">Sign in</a></li>
                        <li class=""><a href="addDevise.php">Add Devise</a></li>
                </div>
            </nav>
        </div>
        
    </div>
    <div class="in" style="background-color:yellow;">
            <?php foreach($devises as $devise): ?>
                <h3><?php echo $devise['name']; ?><br></h3>
                <div><?php echo $devise['brand']; ?><br></div>
                <ul>
                    <h4>specifications</h4>
                <?php foreach(explode(',',$devise['specifications']) as $spec){ ?>
                    <li><?php echo $spec; ?></li>
                <?php } ?>
                </ul>
                <div><a href="details.php?id=<?php echo $devise['id']; ?>">details</a></div>
            <?php endforeach; ?>
    </div>
</div>
</body>
<?php include "templates/footer.html"; ?>