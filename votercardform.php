<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `tbl_users` WHERE CONCAT(`username`, `email`, `password`, `aadharno`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `tbl_users`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "testapp");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 0px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="select.php" method="post">
           
            
          
      
      <!-- populate table from mysql database -->
 <?php while($row = mysqli_fetch_array($search_result)):?>

 <h1><center>FORM FOR VOTER CARD</center></h1>
 <br />
 <br />
 <hr>
                
 Username:   <input type="text" name="username" value="<?php echo $row['username'];?>"  <br /><br /><br />
    Email:   <input type="text" name="username" value="<?php echo $row['email'];?> "      <br /><br /><br />
   AadharNo: <input type="text" name="username" value="<?php echo $row['aadharno'];?>"      <br /><br /><br />
    FirstName: <input type="text" name="username" value="<?php echo $row['firstname'];?>"      <br /><br /><br />
     LastName: <input type="text" name="username" value="<?php echo $row['lastname'];?>"      <br /><br /><br />
      MobileNo: <input type="text" name="username" value="<?php echo $row['mobileno'];?>"      <br /><br /><br />
       Address: <input type="text" name="username" value="<?php echo $row['address'];?>"      <br /><br /><br />
         State: <input type="text" name="username" value="<?php echo $row['state'];?>"      <br /><br /><br />
         City: <input type="text" name="username" value="<?php echo $row['city'];?>"      <br /><br /><br />
          Pincode: <input type="text" name="username" value="<?php echo $row['pincode'];?>"      <br /><br /><br />
                
                <?php endwhile;?>

            
                
            
        </form>
        
    </body>
</html>