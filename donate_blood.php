<?php

$host="localhost";
$dname="blood_bank";
$pass="";
$username="root";

// create connection to mysql

$connection=mysqli_connect($host,$username,$pass,$dname);

//check whether connection is established or not

if(!$connection){
    echo "connection failed".mysqli_error();
}
else{

    //=================  accepting data once the user click the submit button=======================




    if(isset($_POST["submit"])){
        $fullname=$_POST['fullname'];
        $mobileno=$_POST['mobileno'];
        $emailid=$_POST['emailid'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $blood_group=$_POST['blood_group'];
        $address=$_POST['address'];
        

        // create a variable to store the data collected from to be sent to database
        $sql = "INSERT INTO donar (fullname,mobileno,emailid,age,gender,blood,address)
        VALUES ('$fullname', '$mobileno', '$emailid', '$age', '$gender', '$blood_group', '$address')";

        // sending to database 
        if (mysqli_query($connection, $sql)){
            echo "Thank you for registering as a donar";
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }

    mysqli_close($connection);
}





?>