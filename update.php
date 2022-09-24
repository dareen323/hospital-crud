<?php
require_once './connection.php';

// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT id,Name,Age,Address from patients where id=:uid";
//Prepare the query:
$query = $conn->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update INfo. </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
 
</head>
<div style="margin-left:50px;margin-top:50px;">
<form name="insertrecord" method="post" class="marg">
<div class="row m-5">
<div class="col-md-4"><b>id</b>
<input type="number" name="id" value="<?php echo htmlentities($result->id);?>" class="form-control" required>
</div>
<div class="col-md-4"><b> Name</b>
<input type="text" name="name" value="<?php echo htmlentities($result->Name);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>Age</b>
<input type="number" name="age" value="<?php echo htmlentities($result->Age);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-8"><b>Address</b>
<textarea class="form-control" name="address" required><?php echo htmlentities($result->Address);?></textarea>
</div>
</div>
<?php }} ?>
<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="update" value="Update">
</div>
</div>
</div>
</form>

<?php
require_once './connection.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values
$fname=$_POST['name'];
$lname=$_POST['age'];
$address=$_POST['address'];
// Query for Updation
$sql="update patients set Name=:fn,Age=:ln,Address=:adrss where id=:uid";
//Prepare Query for Execution
$query = $conn->prepare($sql);
// Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
$query->bindParam(':fn',$fname,PDO::PARAM_STR);
$query->bindParam(':ln',$lname,PDO::PARAM_STR);
$query->bindParam(':adrss',$address,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Code for redirection
echo "<script>window.location.href='index.php'</script>";
}
?>