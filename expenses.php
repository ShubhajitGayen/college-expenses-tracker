<?php
ob_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <style>
/* General reset for consistency across browsers */
* {
margin: 0px;
padding: 0px;
}
html{
    background-image:url("pexels-eberhardgross-844297.jpg");
}
.back{
    position:sticky;
    top:9px;
margin:20px 0px 0px 1100px;
}

a {
background-color: #007BFF;
color: white;
border: none;
text-decoration:none;
margin:20px;
padding: 10px 20px;
cursor: pointer;
border-radius: 5px;
font-size: 16px;
}

a:hover{
background-color:rgb(24, 15, 1);
}

/* Table styling */
table {
width: 600px;
border-collapse: collapse;
margin: 10px 0px 0px 150px;
box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
background-color: #ffffff;
overflow: hidden;
}

.uppercase{
    text-transform: uppercase;  
}
/* Header cells styling */
table tr:first-child td {
background-color: #007BFF;
color: white;
font-weight: bold;
text-align: center;
padding: 15px;
border-bottom: 2px solid #007BFF;
}
/* Regular table cells */
table td {
padding: 25px;
text-align: center;
border-bottom: 1px solid #dddddd;
}

/* Alternating row colors */
table tr:nth-child(even) {
background-color: #f9f9f9;
}

/* Money cells */
table td.money {
   
color: #28a745;
font-weight: bold;
}

/* Button styling */
button {
    width:200px;
background-color: #007BFF;
color: white;
border: none;
margin-left:20px;
padding: 10px 20px;
cursor: pointer;
border-radius: 5px;
font-size: 16px;
}

button:hover {
background-color: #0056b3;
}

/* Result cell */
#result,#average {
    width:150px;
font-weight: bold;
font-size: 16px;
color:rgb(8, 14, 178);
padding: 10px;
text-align: right;
}
#average{
    text-align: center; 
}

/* Table footer styling */
table tr:last-child td {
    position: inherit;
background-color: #e9ecef;
font-weight: bold;
}

</style>
</head>
<body>
    <div class="background">
    <div class="back">
        <a href="index.html">BACK</a>
    </div>
    <table>
        <tr><td colspan="2">DATE</td><td></td><td>MONEY</td><td>EDIT</td><td>DELETE</td></tr>
    <?php
    $sql = "SELECT * FROM `expenses`";
    $qry = mysql_query($sql);  // Updated to mysqli_query
    while ($row = mysql_fetch_array($qry)) 
    {  // Updated to mysqli_fetch_array
        ?>
        <tr><td colspan="2"><?php echo $row['date'] ?></td><td class="uppercase"><?php echo $row['date_name'] ?></td><td class="money"><?php echo $row['money'] ?></td><td><a href="edit.php?date=<?php echo $row['date']; ?>">Edit</a></td><td><a onclick="deleteBtn()" id="deleteBtn" href="delete.php?ID=<?php echo $row['ID']; ?>">DELETE</a></td></tr>
    <?php
    }
    ?>
    <tr><td colspan="2" ><button onclick="calculateSumAndAverage()">Calculate Sum</button><td colspan="2" id="result"></td><td colspan="2" id="average"></td></tr>
    </table>
    </div>

    <script>
    function calculateSumAndAverage() {
        const moneyElements = document.getElementsByClassName('money');
        let sum = 0;
        let count = moneyElements.length;

        for (let i = 0; i < count; i++) {
            sum += parseFloat(moneyElements[i].textContent) || 0;
        }

        let average = count > 0 ? sum / count : 0;
        
        document.getElementById('result').innerText = `Total Cost :  ${sum}`;
        document.getElementById('average').innerText = `Average Cost :  ${average.toFixed(2)}`;
    }

    document.querySelectorAll("#deleteBtn").forEach(function(button) {
    button.addEventListener("click", function(event) {
        if (confirm("You really want to delete it?")) {
            // Here you would put the code to delete the item
        } else {
            event.preventDefault(); // Prevents the default action if user cancels
            alert("Item deletion canceled.");
        }
    });
});
</script>

</body>
</html>
