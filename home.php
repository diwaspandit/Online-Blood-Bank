<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="home.css">
    
<!-- ################################################################# -->


  <!--  Php for connection to donar table in database -->
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

   // array of blood types to query
   $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
   
   // loop through blood types and execute query for each one
   foreach ($bloodTypes as $type) {
       $sql = "SELECT COUNT(*) AS count FROM donar WHERE blood = '$type'";
       $result = mysqli_query($connection, $sql);
       if (!$result) {
           die("Query failed: " . mysqli_error($connection));
       }
       $row = mysqli_fetch_assoc($result);
       $count = $row['count'];
      $counts[$type] = $count;
   }
    // assign the count of each blood type to a separate variable
    $countAplus = $counts['A+'];
    $countAminus = $counts['A-'];
    $countBplus = $counts['B+'];
    $countBminus = $counts['B-'];
    $countABplus = $counts['AB+'];
    $countABminus = $counts['AB-'];
    $countOplus = $counts['O+'];
    $countOminus = $counts['O-'];

   // close the database connection
   mysqli_close($connection);
?>
<!-- ################################################################## -->



  <!--  Php for connection to requestor table in database -->
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

   // array of blood types to query
   $bloodTypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
   
   // loop through blood types and execute query for each one
   foreach ($bloodTypes as $type) {
       $sql = "SELECT COUNT(*) AS count FROM requestor WHERE blood = '$type'";
       $result = mysqli_query($connection, $sql);
       if (!$result) {
           die("Query failed: " . mysqli_error($connection));
       }
       $row = mysqli_fetch_assoc($result);
       $request = $row['count'];
      $requests[$type] = $request;
   }
    // assign the count of each blood type to a separate variable
    $requestAplus = $requests['A+'];
    $requestAminus = $requests['A-'];
    $requestBplus = $requests['B+'];
    $requestBminus = $requests['B-'];
    $requestABplus = $requests['AB+'];
    $requestABminus = $requests['AB-'];
    $requestOplus = $requests['O+'];
    $requestOminus = $requests['O-'];

   // close the database connection
   mysqli_close($connection);
?>
<!-- ################################################################## -->


</head>
<body>
    <div class="row">
        <div class="column">
          <div class="card">
            <h1>A+</h1>
            <p>No. of donors:<?php echo $countAplus;?> </p>
            <p>No. of request: <?php echo $requestAplus;?></p>
          </div>
        </div>
        <div class="column">
            <div class="card">
                <h1>A-</h1>
                <p>No. of donors:<?php echo $countAminus;?> </p>
                <p>No. of request:<?php echo $requestAminus;?> </p>
              </div>
        </div>
        <div class="column">
            <div class="card">
                <h1>B+</h1>
                <p>No. of donors:<?php echo $countBplus;?> </p>
                <p>No. of request:<?php echo $requestBplus;?> </p>
              </div>
        </div>
        <div class="column">
            <div class="card">
                <h1>B-</h1>
                <p>No. of donors: <?php echo $countBminus;?></p>
                <p>No. of request:<?php echo $requestBminus;?> </p>
              </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
            <div class="card">
                <h1>AB+</h1>
                <p>No. of donors:<?php echo $countABplus;?> </p>
                <p>No. of request: <?php echo $requestABplus;?></p>
              </div>
        </div>
        <div class="column">
            <div class="card">
                <h1>AB-</h1>
                <p>No. of donors:<?php echo $countABminus;?> </p>
                <p>No. of request:<?php echo $requestABminus;?> </p>
              </div>
        </div>
        <div class="column">
            <div class="card">
                <h1>O+</h1>
                <p>No. of donors:<?php echo $countOplus;?> </p>
                <p>No. of request: <?php echo $requestOplus;?></p>
              </div>
        </div>
        <div class="column">
            <div class="card">
                <h1>O-</h1>
                <p>No. of donors:<?php echo $countOminus;?> </p>
                <p>No. of request:<?php echo $requestOminus;?> </p>
              </div>
        </div>
      </div>
    
      
</body>
</html>