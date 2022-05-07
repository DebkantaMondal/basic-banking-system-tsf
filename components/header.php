<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/styles.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/jquery-ui.css" />

    <!-- ===== BOX ICONS ===== -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <title>Demo Basic Banking System - TSF Task</title>
    <style>

        /*nav {
            z-index: 50;
        }

        .nav-active {
            font-weight: bold;
        }

        .mid-container {
            width: 100%;
            height: 86vh;
            background-image: url("https://images.unsplash.com/photo-1616803140344-6682afb13cda?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80");
            background-position: center center;
            background-repeat: no-repeat;
            background-size: 100% 781px;
            opacity: 0.9;
            
        }

        .abs-content {
            display: flex;
            width: 100%;
            height: 86vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: absolute;
            z-index: 30;
            top: 58px;
            left: 0px;
        }

        .welcome {
            font-size: 3.5rem;
            font-weight: bold;
            z-index: 30;
            color: #fff;
        }

        .view-customer {
            color: white;
            font-weight: bold;
            font-size: 20px;
            background-color: orangered;
            border: none;
            border-radius: 8px;
            text-decoration: none;
        }

        .view-customer:hover {
            background-color: rgb(206, 55, 1);
            color: whitesmoke;
        }*/

        footer {
            width: 100%;
            height: 5vh;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        footer p {
            margin-top: 1%;
        }


    </style>
</head>

<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 58px;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary mx-4" href="#">Demo Basic Banking System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 bg-light">
                    <li class="nav-item mx-2">
                        <a class="nav-link text-dark nav-active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-dark" href="all_consumers.php">All Consumers</a>
                    </li>
                    
                    <li class="nav-item mx-2">
                        <a class="nav-link text-dark" href="all_transactions.php" tabindex="-1" aria-disabled="true">Transaction History</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>