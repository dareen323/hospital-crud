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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<div class="container mt-5">
        <div class="card flex-row">
            <div class="card-header">
                <h1>Add patient info</h1>
                <?php
                if (!empty($message)) {
                    echo `<div class="alert alert-success">$message</div>`;
                }
                ?>
            </div>
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Patient Id</label>
                        <input type="number" class="form-control" name="id" required>
                    </div>
                    <div class="mb-3">  
                        <label class="form-label"> Patient NAME</label>
                        <input type="text" class="form-control" name="name" required >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Patient AGE</label>
                        <input type="number" class="form-control" name="age"required >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Patient ADDRESS</label>
                        <input type="text" class="form-control" name="address"required >
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>

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

    header("Location: index.php");
}

?>