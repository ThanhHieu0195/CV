<?php
include './includes/helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Curriculum Vitae</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/print.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
</head>
<body>
<?php 
require('data.php');
?>

<div class="container">
   <div class="row" style="box-shadow: 21px 8px 13px #9a9a9a;">
       <div class="row header">
           <h1 class="text-right"><strong class="text-3d"><?= $data['basic_info']['fullname'] ?></strong></h1>
           <h4 class="text-right text-3d"><?= $data['basic_info']['position'] ?></h4>
       </div>
       <div class="row infomation">
           <?php get_component('detail'); ?>
           <?php get_component('profile') ?>
       </div>
   </div>
</div>

</body>
<script src="Assets/jquery/jquery.min.js"></script>
<script src="Assets/bootstrap/bootstrap.min.js"></script>
</html>