<?php  include 'dbconnect.php';
        //require_once __DIR__ . '/../vendor/autoload.php';
;?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Star.gr</title>
    <link rel="shortcut icon" type="image/png" href="https://scdn.star.gr/images/favicon-32x32.png">
    <link rel="stylesheet" href="styles.css">
    <style>
        .category{
            width:200px;
            margin-bottom:10px;
        }

        .cont{
            margin:15px 15px 0px 0px;
        }
        
        .main{
            display:grid;
            grid-template-columns: 1fr 1fr 1fr;
        }
        
        .clock_category{
            display:flex;
        }
        .articles-category{
            color:#A49FFD;
        }
        * {
            margin: 0;
            font-family: Fira Sans,sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #121015;
            display:flex;
            justify-content:space-between
        }

        .name_logo{
            display:flex;
            padding-left:20px;
            position:relative;
            top:5px;
        }

        .name_logo:hover{
            cursor:pointer;
        }
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 20px 16px;
            text-decoration: none;
            font-size: 17px;
        
        }
        .topnav h1{
            padding:5px 10px;
        }
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        a{
            border-right:1px solid white;
            
        }
        .name{
            color:white;
        }
        .logo{
            width:50px;
            height:50px;
            padding-top:5px
        }
        #submit-article, #submit-category {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            display:flex;
            flex-direction:column;
        }
      
        .submit{
            width:120px;
            margin-top:20px;
        }
        textarea{
            border-radius:5px;
        }
        input{
            margin-bottom:10px;
        }
        .links{
            text-decoration:none;
            color:black;
        }
        .footer{
            background-color:#121015;
        }
    </style>
</head>
<body>
<div class="topnav">
    <div class="name_logo" onclick="location.href='index.php'">
        <h1 class="name">Star.GR</h1>
        <img class="logo" src="./assets/star-logo.jpg" alt="star">
    </div>
    <div class="routes">
        <a href="index.php">Articles</a>
        <a href="create-article.php">Create an article</a>
        <a href="create-category.php">Create a category</a>
    </div>
</div>