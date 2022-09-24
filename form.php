<?php
require_once './connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient page</title>
<Style>
    .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Registration form </h3>
                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label class="form-label">Patient Id</label>
                        <input type="number" class="form-control" name="id" required>
                        </div>
                        <div class="form-group">
                        <label class="form-label"> Patient NAME</label>
                        <input type="text" class="form-control" name="name" required >
                        </div>
                        <div class="form-group">
                        <label class="form-label"> Patient Age</label>
                        <input type="number" class="form-control" name="age" required >
                        </div>
                        <div class="form-group">
                        <label class="form-label"> Patient Address</label>
                        <input type="address" class="form-control" name="address" required >
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="submit"/>
                        </div>
                       
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Login Form </h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
</body>
<?php
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $address = $_POST["address"];

    $sql = "insert into patients (id,Name,Age,Address) values (:id,:n,:a,:ad)";

    $query = $conn->prepare($sql);

    // Bind the parameters
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':n', $name, PDO::PARAM_STR);
    $query->bindParam(':a', $age, PDO::PARAM_STR);
    $query->bindParam(':ad', $address, PDO::PARAM_STR);
   

    $result = $query->execute();

    header("Location:index.php");
}

?>