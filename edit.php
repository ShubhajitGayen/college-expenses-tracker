<?php
ob_start();
include("connection.php");
$date=$_GET['date'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <style>
        /* Reset some default styling */
body, html {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
}
.background {
    /* Make the div take up the full viewport width and height */
    width: 100vw;      /* 100% of the viewport width */
    height: 100vh;     /* 100% of the viewport height */

    /* Set the background image */
    background-image: url("pexels-jplenio-1146706.jpg");
    
    /* Ensure the background image covers the entire div */
    background-size: cover;        /* Scales the image to cover the div */
    background-repeat: no-repeat;  /* Prevents the image from repeating */
    background-position: center;   /* Centers the image within the div */

    /* Optional: Fix the background in place during scrolling */
    position: fixed;    /* Positions the div relative to the viewport */
    top: 0;             /* Aligns the top of the div to the top of the viewport */
    left: 0;            /* Aligns the left of the div to the left of the viewport */
    z-index: -1;        /* Places the div behind other content */
}

/* Style the container for the links */
.back {
    margin:10px 0px 0px 1060px;
    position:absolute;
    background-color: transparent;
    padding: 10px;
}

/* Style the links */
.back a {
    background-color: #4CAF50;
    color: rgb(24, 15, 1);
    text-decoration: none;
    padding: 11px 20px;
    border: 5px;
    border-radius:5px;
    transition: 0.5s ease;
}

.back a:hover {
    color: rgb(226, 245, 52);
    background-color: #122f31;
}


/* Style the table */
table {
    width: 100%;
    max-width: 600px;
    margin: 100px 0px 0px 500px;
    border-collapse: collapse;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
}

/* Style the table headers */
table .h {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    text-align: left;
    transition: 0.5s ease;
}
table .h:hover{
    color: rgb(97, 52, 245);
    background-color: #ecb61f;
}
/* Style the table cells */
table td {
    padding: 10px;
    border: 1px solid #ddd;
}

/* Style the form inputs */
input[type="date"],
input[type="number"] {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f1f1f1;
}
/* Style the select dropdown */
#date_name {
  width: 160px;                 /* Set the width of the dropdown */
  padding: 10px;                /* Add some padding inside the dropdown */
  font-size: 16px;  
   text-transform: uppercase;            /* Font size for the text inside the dropdown */
  border: 2px solid #1bb307;    /* Border color and width */
  border-radius: 5px;           /* Rounded corners */
  background-color: #f8f8f8;    /* Background color */
  color: #333;                  /* Text color */
  appearance: none;             /* Remove default dropdown arrow */
}

/* Add a custom arrow */
#date_name {
  background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 5"%3E%3Cpath fill="%333" d="M0 0l5 5 5-5z"/%3E%3C/svg%3E');
  background-repeat: no-repeat;
  background-position: right 6px center;
  background-size: 10px 5px;
}

/* Style each option within the dropdown */
#date_name option {
  padding: 10px;               /* Padding inside each option */
  background-color: #ffffff;   /* Background color of the options */
  color: #333;                 /* Text color of the options */
}

/* Style the selected option */
#date_name option:checked {
    background-color: #ecb61f;  /* Background color of the selected option */
  color: white;                /* Text color of the selected option */
}

/* Optional: Hover effect on options (not always supported) */
#date_name:hover {
  border-color: #cc9900;       /* Change border color on hover */
}

/* Style the submit button */
input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #ecb61f;
}

    </style>
</head>
<body>
    <div class="background">
    <div class="back">
            <a href="expenses.php">BACK</a>
    </div>
    <form action="update.php" method="POST">
    <table>
        <?php
        $sql="select * from `expenses` where `date`='$date'";
        $qry=mysql_query($sql);
        $row=mysql_fetch_array($qry);
        ?>
        <tr>
            <td  class="h" colspan="2">DATE</td>
            <td  class="h" colspan="2">AMOUNT</td>
            
        </tr>
            <tr>
            <td><input type="date" id="date" name="date" value="<?php echo $row['date']; ?>"></td>
           <td><input type="text" id="date_name" name="date_name" value="<?php echo $row['date_name']; ?>"></td> 
            <td><input type="number" id="money" name="money"  value="<?php echo $row['money']; ?>"></td>
            <td><input type="submit" id="submit" value="update"></td>
        </tr>
    </form>
    </table>
</div>

</body>
</html>