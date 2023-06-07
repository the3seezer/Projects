<?php 
include('config/db_connect.php');

if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql = "DELETE FROM devises WHERE id = $id_to_delete";//whatch the double quotes when selecting a single record/row!!*
    if(mysqli_query($conn,$sql)){
        header('Location: index.php');
    }
    else{
        echo 'query error ' . mysqli_error($conn);
    }
}
//echo $_GET['id'];
if(isset($_GET['id'])){
    // check get and request id parameter
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    //make sql
    $sql = "SELECT * FROM devises WHERE id = $id";//whatch the double quotes because we inserted a variable
    //make query
    $results = mysqli_query($conn,$sql);
    //for fetching a single row
    $devise = mysqli_fetch_assoc($results);
    //close
    mysqli_free_result($results);
    mysqli_close($conn);
    //print_r($devise);
}
?>
<?php include "templates/header.php"; ?>
<div>
    <?php if($devise): ?>
        <h4>Devise Name</h4>
        <p><?php echo htmlspecialchars($devise['name']); ?></p>
        <p><?php echo htmlspecialchars($devise['brand']); ?></p>
        <h5>DETAILS</h5>
        <p><?php echo htmlspecialchars($devise['specifications']); ?></p>
        <!-- DELETE FORM  -->
        <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" value="<?php echo $devise['id']; ?>" >
            <input type="submit" value="DELETE" name="delete">
        </form>
    <?php else: ?>
        <H1>NO SUCH DEVISE EXIST</H1>
    <?php endif; ?>
</div>



<?php include "templates/footer.html"; ?>