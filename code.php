<?php 
$servername="localhost";
$username="root";
$password="";
$database="application";
$id=0;
$test=false;
$firstname="";
$lastname="";
$email="";
$msg="";
//créer la connexion
$conn= mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("coonction failed". mysqli_connect_error());
}
else{
    echo "connected";
}



if (isset($_POST['submit'])){
    //get data
    $firstname=$_POST['firstname'];
    
    $lastname=$_POST['lastname'];
    
    $email=$_POST['email'];
    
    $msg=$_POST['msg'];
    
    $sql="INSERT INTO contact (firstname,lastname,email,msg) VALUES ('$firstname','$lastname','$email','$msg')";

    if (mysqli_query($conn,$sql)){
        echo "ligne mrigla";
    }
    else {
        echo "fama prob fil conn".mysqli_error($conn);
    }
}
/////delete
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM contact WHERE id = $id";
    if(mysqli_query($conn,$sql)){
        echo "la ligne est supprimée ! ";
    }
    else{
        echo "probléme delete !".mysqli_error($conn);
    }

}

///affichage edit
if(isset($_GET['edit'])){
    $test=true;
    $id=$_GET['edit'];
    $sql="SELECT * from contact where id = $id";
    if($result=mysqli_query($conn,$sql)){
        $row=mysqli_fetch_assoc($result);
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $email=$row['email'];
        $msg=$row['msg'];

    }
}
////Edit
if(isset($_POST['edit'])){ 
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $msg=$_POST['msg'];
    $sql="UPDATE contact set firstname='$firstname' , lastname='$lastname' , email='$email' , msg='$msg' where id=$id ";
    if(mysqli_query($conn,$sql)){
        echo "la ligne est modifiée ! ";
    }
    else{
        echo "probléme edit !".mysqli_error($conn);
    }
    header("location: index.php");
}

?>