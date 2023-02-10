<?php
include 'connection.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }


  
    
    else if($amount > $sql1['Current Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Ohh! Insufficient Balance")'; 
        echo '</script>';
    }
    


   
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                
                $newbalance = $sql1['Current Balance'] - $amount;
                $sql = "UPDATE `customers` SET `Current Balance`=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                
                $newbalance = $sql2['Current Balance'] + $amount;
                $sql = "UPDATE `customers` SET `Current Balance`=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['Name'];
                $receiver = $sql2['Name'];
                $sql = "INSERT INTO `transactions` (`Sender`, `Receiver`, `Amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='view_customers.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tranfer</title>
    <link rel="stylesheet" href="select_transfer.css">
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

header {
    background-color: black;
    position: relative;
    bottom: 30px;
    font-family: 'Baloo Bhai 2', cursive;
     text-shadow: 4px 4px 4px red;
}

nav {
    background-color: rgba(46, 43, 43, 0.979);
    display: flex;
    justify-content: space-evenly;
    padding: 5px;
    font-weight: bold;
    border-radius: 3px;
    font-weight: bold;
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

.link:hover {
    color: rgba(230, 245, 100, 0.979);
}

footer {
    text-align: center;
    margin-top: auto;
    background-color: black;
    color: whitesmoke;
    padding: 15px;
    padding:10px;
}
      
div.transfer{
            margin:auto;
            position:relative;
            bottom: 30px;
            background-color: smokewhite;
            padding:20px;
            font-family: 'Baloo Bhai 2', cursive;
            border-radius:10px;
            box-shadow:0 2px 8px black;
        }
div table {
            font-family: 'Baloo Bhai 2', cursive;
            display: table;
            margin: auto;
            background-color: rgb(250, 252, 251);
            color: whitesmoke;
            box-shadow: 0 2px 10px black;
            border-collapse: collapse;
        }
 h2{
            font-size:30px;
        }

 table th {
            background-color: black;
            color: whitesmoke;
            text-shadow: 3px 3px 3px black;
}
      

 tr {
            color: black;
            font-weight: bold;
            text-shadow: 3px 3px 3px white;
}
        
 td,
 th {
            border: 1px solid #b8a6a6;
            text-align: left;
            padding: 8px;
        }
 #receiver{
            height:22px;
            padding:1px 2px;
            border:2px;
        }
 #amount{
            border:2px;
        }
  button{
            position:relative;
            left:200px;
            bottom:10px;
            border:none;
            padding:10px;
            color:black;
            font-weight: bold;
            border-radius:5px;
            background-color:lightgreen;
            font-family: 'Baloo Bhai 2', cursive;
            transition: 0.25s;
        }
 button:hover{
            color:whitesmoke;
            background-color: blue;
            transform: translate(0, -3px);
            box-shadow: 0 2px 6px black;
        }

        nav a {
                text-shadow: 2px 2px 2px red;
                font-family: 'Baloo Bhai 2', cursive;
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
        

    </style>
</head>

<body>
    <header>
        <h1 style="color:whitesmoke;font-size: 60px">
        <div id="logo">
            <a href="index.php"><img src="bank logo.jpg">All Citizens Bank</a>
            </div>
        </h1>
        <nav style="font-family: Lucida Console, Courier, monospace;">
            <a class="link" href="index.php" target="_blank">Home</a>
            <a class="link" href="About.html" target="_blank">About</a>
            <a class="link" href="view_customers.php" target="_blank">View Customers</a>
            <a class="link" href="transaction_history.php" target="_blank">Transaction History</a>
        </nav>
    </header>
	<div class="transfer">
        <h2 style="text-align:center">Transfer Money</h2>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM  customers where id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit"><br>
        <div>
            <table>
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Current Balance</th>
                </tr>
                <tr>
                    <td><?php echo $rows['id'] ?></td>
                    <td><?php echo $rows['Name'] ?></td>
                    <td><?php echo $rows['E-mail'] ?></td>
                    <td><?php echo $rows['Current Balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label for="receiver" style="font-weight:bold">Transfer To:</label>
        <select id="receiver" name="to" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connection.php';
                $sid=$_GET['id'];
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Current Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
        </select>
        <br>
        <br>
            <label style="font-weight:bold" for="amount">Amount in &#x20B9;
            :</label>
            <input id="amount" type="number" name="amount" required>   
            <br><br><br>
            <div>
                <button name="submit" type="submit">Transfer</button>
            </div>
        </form>
    </div>
    <footer class="footer">
            <p style="color:white"><i>&#169; copyright 2023.</i></p>
            <p style="color:white"><i>All rights reserved. Powered by<a href="https://www.thesparksfoundationsingapore.org/">The Sparks Foundation</a></i></p>
    </footer>
</body>