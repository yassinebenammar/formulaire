<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
        background:whitesmoke;
    
    }
    h1{
        text-align:center;}
        </style>

</head>
<body>
<?php
include_once 'code.php';
?>

<h1>My Dashboard</h1>
<div class="d-flex justify-content-center">
    <form action="code.php" method="POST">
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <label for="">firstname</label>
        <input type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="enter your firstname ..."class="form-control">
        <label for="">lastname</label>
        <input type="text" name="lastname" value="<?php echo $lastname ; ?>" placeholder="enter your lastname ..." class="form-control">
        <label for="">email</label>
        <input type="text" name="email" value="<?php echo $email ; ?>" placeholder="enter your email ..." class="form-control">
        <label for="">message</label>
        <input type="text" name="msg" value="<?php echo $msg ;?>" placeholder="enter your message ..." class="form-control">
        <br>
        <?php if($test==true): ?>
            <input type="submit" name="edit"  value="edit" class="btn btn-primary">
        <?php else: ?>
        <input type="submit" name="submit" value="add" class="btn btn-primary">
        <?php endif; ?>
    </form>
</div>

<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="application";
    //créer la connexion
    $conn= mysqli_connect($servername,$username,$password,$database);
    $sql="SELECT * from contact";
    $result= mysqli_query($conn,$sql); 
?>

<div class="container">
<table class="table">
    <tr>
        <td>id</td>
        <td>firstname</td>
        <td>lastname</td>
        <td>email</td>
        <td>msg</td>
        <td>opérations</td>
    </tr>
    <?php while($row= mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['msg']; ?></td>
        <br>
        <td>
            <a href="" class="btn btn-primary">add</a>
            <a href="index.php?id=<?php echo $row['id']; ?>"  name="delete" class="btn btn-danger">delete</a>
            <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">edit</a>
        </td>
    </tr>
    <?php } ; ?>
</table>
</div>

</body>
</html>