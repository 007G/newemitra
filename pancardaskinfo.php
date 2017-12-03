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
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="pancardform.php" method="post">
         
        <form action="votercard.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Enter aadhar no"><br><br>
            <input type="submit" name="search" value="Search Details"><br><br>
            
            
      
      <!-- populate table from mysql database -->
                
           
        </form>
        
    </body>
</html>