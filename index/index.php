<?php
  session_start();
  include "users.php"; 
  include "bbcodes.php"; 
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Мой первый простой сайт</title>
  <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
  <div id="main">
    <div id="header">
       <?php include "header.php" ?> 
    </div>
    
    <div id="content">
      <div id="left">
        <?php include "navigation.php" ?>
        <?php include "links.php" ?>
        <?php include "autorization.php" ?>
      </div>

      <div id="right">
        <?php
        $action = isset($_GET['action']) ? $_GET['action'] : "none";
        
        if($action == "exit") {
          session_unset();
          $_SESSION["autorized"] = false;
        }
        
        if(!isset($_SESSION["autorized"]) || $_SESSION["autorized"] != true) {
          if(isset($_POST['login']) && isset($_POST['pwd'])) {
            $login = $_POST['login'];
            $pwd = $_POST['pwd'];
            
            if(isset($users[$login]) && $users[$login]['pwd'] == $pwd) {
              $_SESSION["autorized"] = true;
              $_SESSION["user"] = $users[$login]['name']; 
            } else {
              $_SESSION["autorized"] = false;
            }
          }
        }
        
        if(isset($_SESSION["autorized"]) && $_SESSION["autorized"] == true) {
          $p = isset($_GET['page']) ? $_GET['page'] : 0;
          $news = isset($_GET['news']) ? $_GET['news'] : 0;
          
          if($p == 0) {
            $xml_file = "main.xml";
          } elseif($p == 1) {
            $xml_file = "news.xml";
          } elseif($p == 2) {
            $xml_file = "contacts.xml";
          } else {
            $xml_file = "main.xml";
          }
          
          if(file_exists($xml_file)) {
            $s = simplexml_load_file($xml_file);
            
            if($p == 0 || $p == 2) {
              for($i = 0; $i < (int)$s->datacount[0]; $i++) {
                echo "<h2>" . $s->data[$i]->header . "</h2>";  
                echo parse_bb_codes($s->data[$i]->text);
              }
            } else if($p == 1 && $news == 0) {
              for($i = 0; $i < (int)$s->datacount[0]; $i
