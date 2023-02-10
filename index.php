<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Citizens Bank</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <style media="screen" type="text/css">
       
        *{
            margin: 0;
            padding: 0;
        }

        html{
            scroll-behavior: smooth;
        }

        :root{
            --navbar-height: 59px;
        }

        #navbar{
            display: flex;
            align-items: center;
            position: relative;
            justify-content: center;
        }

        #navbar::before{
            content: "";
            background-color: black;
            position: absolute;
            height: 100%;
            width: 100%;
            z-index: -1;
            opacity: .7;
        }

        #logo{
            margin: 10px 35px;
        }

        #logo img{
            height: 59px;
            margin: 3px 5px;
            border-radius: 30px;
            /* filter:invert(100%); */
        }

        #navbar ul{
            display: flex;
            /* font-family: 'Baloo Bhai 2', cursive; */
            font-family: 'Baloo Bhai 2', cursive;
            text-shadow: 2px 2px 2px blue,
        }

        #navbar ul li{
            list-style: none;
            font-size: 1.3rem;
        }

        #navbar ul li a{
            color: white;
            display: block;
            padding: 3px 22px;
            border-radius: 20px;
            text-decoration: none;
            text-shadow: 2px 2px 2px purple;
        }

        #navbar ul li a:hover{
            color: black;
            background-color: white;
        }

        #home{
            display: flex;
            flex-direction: column;
            padding: 3px 20px;
            height: 550px;
            align-items: center;
        }

        /* #home::before{
            content: "";
            background: url("bg1.jpg") no-repeat center center/cover;
            position: absolute;
            top: 0px;
            left: 0px;
            height: 85%;
            width: 100%;
            z-index: -2;
            opacity: .75;
        } */
        footer {
            text-align: center;
            margin-top: auto;
             background-color: black; 
            color: whitesmoke;
            padding: 10px;
        }
        
        footer p {
            margin: 15px;
        }
        #home h1{
            color: black;
            margin: 20px 0px;
            text-align: center;
            color: whitesmoke;
            text-shadow: 2px 2px 2px purple, 0 0 25px black, 0 0 5px blue;
            font-family: 'Baloo Bhai 2', cursive;
            font-size: 50px;
        }
        body {
  background-image: url('bank.jpg');
  background-repeat: no-repeat;
  background-size:1560px 600px;
}
        #home p{
            color: white;
            text-shadow: 3px 3px 5px #340c5a;
            text-align: center;
            font-size: 2.0rem;
            font-family: 'Baloo Bhai 2', cursive;
        }

    </style>
    
</head>

<body>
    <!-- <div class="navbar">
        <h1 style="color:whitesmoke">
            <a href="index.php"><img src="banklogo.jpg">Sparks Foundation Bank</a>
        </h1>
        <nav>
            <a class="link" href="index.php">Home</a>
            <a class="link" href="About.html">About</a>
            <a class="link" href="view_customers.php">View Customers</a>
            <a class="link" href="transaction_history.php">Transaction History</a>
        </nav>
    </div> -->
    <nav id="navbar">
        <div id="logo">
            <img src="bank logo.jpg" alt="All Citizens Bank">
        </div>

        <ul>
            <li class="item"><a href="index.php" target="_blank">Home</a></li>
            <li class="item"><a href="About.html" target="_blank">About</a></li>
            <li class="item"><a href="view_customers.php" target="_blank">View Customers</a></li>
            <li class="item"><a href="transaction_history.php" target="_blank">Transaction History</a></li>
        </ul>
    </nav>

    <!-- <div class="service">
        <div class="view">
            <a href="view_customers.php"><img src="viewlogo.jpg" alt="customers"></a>
            <p><a href="view_customers.php">View Customers</a></p>
        </div>
        <div class="view">
            <a href="transaction_history.php">
                <img src="transactionhistorylogo.jpg" alt="Transaction History">
            </a>
            <p><a href="transaction_history.php">Transactions History</a></p>
        </div>
    </div> -->
    <section id="home">
            <h1 class="h-primary">Welcome to All Citizens Bank</h1>
            <p>$ Trust your money with us $</p>
    </section>

    <footer>
        <p style="color:white"><i>&#169; copyright 2023.</i></p>
        <p style="color:white"><i>All rights reserved. Powered by <a style="color:white" href="https://www.thesparksfoundationsingapore.org/">The Sparks Foundation</a></i></p>
    </footer>

</body>

</html>