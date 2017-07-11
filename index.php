<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="libs/fontawesome/font-awesome.css">
    <link rel="stylesheet" href="css.css">
    <script src="libs/bootstrap/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
   <div class="row" style="box-shadow: 21px 8px 13px #9a9a9a;">
       <div class="row header">
           <h1 class="text-right"><strong class="text-3d">Trần Cao Thanh Hiếu</strong></h1>
           <h4 class="text-right text-3d">Web Developer</h4>
       </div>
       <div class="row infomation">
<!--           --><?php //include 'theme/detail.php'?>
           <?php include 'theme/detail_tv.php'?>
<!--           --><?php //include 'theme/profile.php' ?>
           <?php include 'theme/profile_tv.php' ?>
       </div>
   </div>
</div>

</body>
<script src="libs/jquery/jquery.min.js"></script>
</html>