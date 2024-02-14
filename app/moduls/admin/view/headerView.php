<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Genel stiller */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        /* Başlık stil */

        .header {
            background-color: #0073aa;
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Mobil için menü butonu stil */

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Kenar çubuğu stilleri */

        .sidebar {
            width: 100%;
            max-width: 250px;
            background-color: #222222;
            color: white;
            padding: 20px;
            position: fixed;
            z-index: 1;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #4CAF50;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        /* Ana içerik stilleri */

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Ekran boyutu 768 piksel veya daha düşük olduğunda stil değişiklikleri */

        @media screen and (max-width: 767px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            .main-content {
                margin-left: 0;
            }
        }

        .bi.bi-person-square path {
            fill: #fff;
            /* Beyaz renk */
        }

        .popup {
            display: none;
            /* Başlangıçta gizli */
            position: fixed;
            top: 25%;
            left: 95%;
            transform: translate(-50%, -50%);
            background-color: #f1f1f1;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 9999;
        }

        .info-box {
            width: 250px;
            height: 81px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .user-icon {
            width: 100px;
            height: 80px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .info-box-content{
            position: fixed;
            top: 17%;
            left: 21%;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Hamburger menü butonu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menü elementleri -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Media</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Comments</a>
                </li>

            </ul>
        </div>

        <div>
            <ul class="navbar-nav">
                <li class="nav-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-square" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                    </svg>
                </li>&nbsp;&nbsp;&nbsp;
            </ul>
        </div>



        <a href="#" id="popup-link">
            <p style="color:white;margin-top: 17px;">
                <?= $_SESSION['fname'] . " " . $_SESSION['lname'] ?>
            </p>
        </a>

        <!-- Pop-up kutusu -->
        <div id="popup" class="popup">
            <button id="close-popup" style="float: right;width:20px;height:20px"><svg xmlns="http://www.w3.org/2000/svg"
                    style="width:16px; height:16px;position: absolute;top: 14%;left: 79.5%;" fill="currentColor"
                    class="bi bi-x" viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                </svg></button>
            <p>
                <?= $_SESSION['email'] . " (" . $data['role_name'] . ")" ?>
            </p>
            <form action="logout" method="POST">
                <button name="logout" class="btn btn-danger btn-sm">Oturumu Kapat</button>
            </form>


        </div>

    </nav>

    <!-- Kenar çubuğu -->
    <div class="sidebar d-none d-md-block">
        <a href="dashboard" onclick="setActive(this)">Dashboard</a>
        <a href="usersetting" onclick="setActive(this)">Kullanıcı Ayarları</a>
        <a href="pages" onclick="setActive(this)">Sayfalar</a>
    </div>

    <!-- Ana içerik -->
    <div class="main-content">
        