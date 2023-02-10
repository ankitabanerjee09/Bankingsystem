<?php
include "connection.php";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Customers</title>
        <link rel="stylesheet" href="viewcustomers.css">
        <style media="screen" type="text/css">
            
  body {
    /* background: linear-gradient(to bottom left, black, white); */ 
  background-image: url('bank.jpg');
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    margin: 0;
    background-repeat: no-repeat;
    background-size: 1800px 800px;
}

table, tbody, tr, th, td{
    background-color: rgba(0, 0, 0, 0.0) !important;
}

table {
    font-family: 'Baloo Bhai 2', cursive;
    display: table;
    margin: 0 100px;
    background-color: rgb(80, 179, 129);
    color: whitesmoke; 
    border-collapse: collapse;
    font-weight: bolder;
    position: relative;
     bottom:20px;
    /* opacity: 0.8; */
}

table th {
    background-color: black; 
    color:white;
    text-shadow: 3px 3px 3px black;
    font-weight: bolder; 
 }

tr {
    background-color: grey; 
    color: black;
     font-weight: bolder; 
     text-shadow: 3px 3px 3px white;

}

 td,
th {
    border: 1px solid black;
    text-align: left;
     font-weight: bolder; 
     padding: 8px;
     text-shadow: 3px 3px 3px white;
  
}

tr:nth-child(even) {
     background-color: whitesmoke; 
    
    font-weight: bolder; 
 } 

header {
    background-color: black;
    font-family: 'Baloo Bhai 2', cursive;
    position: relative;
    text-shadow: 4px 4px 4px green;
    bottom: 30px;
}
 #logo{
            margin: 10px 35px;
        }

   #logo img{
            height: 61px;
            margin: 3px 5px;
            border-radius: 30px;
            filter:invert(100%);
        }

nav {
    background-color: rgba(46, 43, 43, 0.979);
    display: flex;
    justify-content: space-evenly;
    font-family: 'Baloo Bhai 2', cursive;
    padding: 5px;
    border-radius: 3px;
    text-shadow: 2px 2px 2px green;
     font-weight: bold;
                
}
nav a {
                text-shadow: 2px 2px 2px green;
                font-family: 'Baloo Bhai 2', cursive;
            }
h1 {
    text-align: center;
    font-weight: lighter;
    font-size: 50px;
}

h1 img {
    height: 70px;
    width: 70px;
    position: relative;
    top: 20px;
}

a {
    text-decoration: none;
    color: azure;
    padding: 2px 6px 2px 6px;
    border-radius: 2px;
}

img {
    height: 200px;
    width: 200px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.link:hover {
    color: rgba(230, 245, 100, 0.979);
}

  
   table a button {
                border: none;
                font-weight: bold;
                border-radius: 5px;
                font-size: 15px;
                padding: 5px;
                color: black;
                background-color: green;
                transition: 0.25s;
            }
            
            table a button:hover {
                color:red;
                background-color: rgb(0, 175, 0);
                transform: translate(0, -2px);
                box-shadow: 0 1px 2px black;
            }
            .footer {
                text-align: center;
                margin-top: auto;
                background-color: black;
                color: whitesmoke;
                padding:10px;
            }
        </style>
    </head>

    <body>
        <header>
            <h1 style="color:whitesmoke;font-size: 60px">
            <div id="logo">
                <a href="index.php"><img src="bank logo.jpg">All Citizens Bank</a>
        </div>
            </h1>
            <nav style="font-family: Arial, Helvetica, sans-serif">
                <a class="link" href="index.php" target="_blank">Home</a>
                <a class="link" href="About.html" target="_blank">About</a>
                <a class="link" href="view_customers.php" target="_blank">View Customers</a>
                <a class="link" href="transaction_history.php" target="_blank">Transaction History</a>
            </nav>
        </header>
        <table class="customers">
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Current Balance</th>
                <th>&nbsp;</th>
            </tr>
            <?php
         $res=mysqli_query($conn,"SELECT * FROM customers");
         while($row=mysqli_fetch_array($res))
        {
             echo "<tr>";
             echo "<td>"; echo $row["id"]; echo "</td>";
             echo "<td>"; echo $row["Name"]; echo "</td>";
             echo "<td>"; echo $row["E-mail"]; echo "</td>";
             echo "<td>"; echo $row["Current Balance"]; echo "</td>";
             echo "<td>"; ?><a href="SelectandTransfer.php? id=<?php echo $row["id"];?>"><button>Transfer</button></a><?php echo "</td>";
             echo "</tr>";
        }
         $conn->close();
        ?>
        </table>
        <footer class="footer">
            <p style="color:white"><i>&#169; copyright 2023.</i></p>
            <p style="color:white"><i>All rights reserved. Powered by<a href="https://www.thesparksfoundationsingapore.org/">The Sparks Foundation</a></i></p>
    </footer>
</body>

    </body>

    </html>