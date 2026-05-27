<?php
  // Начинаем работу с сессиями 
  session_start();
  include "users.php"; // Подключаем массив пользователей
  include "bbcodes.php"; // Подключаем обработку BB-кодов
?>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1251">
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
        // ИСПРАВЛЕНИЕ: Проверяем, передан ли action, чтобы не было Warning
        $action = isset($_GET['action']) ? $_GET['action'] : "none";
        
        // Обработка выхода с сайта
        if($action == "exit") {
          session_unset();
          $_SESSION["autorized"] = false;
        }
        
        // Авторизация
        if(!isset($_SESSION["autorized"]) || $_SESSION["autorized"] != true) {
          if(isset($_POST['login']) && isset($_POST['pwd'])) {
            $login = $_POST['login'];
            $pwd = $_POST['pwd'];
            
            // Проверяем пользователя
            if(isset($users[$login]) && $users[$login]['pwd'] == $pwd) {
              $_SESSION["autorized"] = true;
              $_SESSION["user"] = $users[$login]['name']; 
            } else {
              $_SESSION["autorized"] = false;
            }
          }
        }
        
        // Логика отображения страниц
        if(isset($_SESSION["autorized"]) && $_SESSION["autorized"] == true) {
          // ИСПРАВЛЕНИЕ: Безопасно принимаем page и news
          $p = isset($_GET['page']) ? $_GET['page'] : 0;
          $news = isset($_GET['news']) ? $_GET['news'] : 0;
          
          // Выбираем какой XML файл открыть
          if($p == 0) {
            $xml_file = "main.xml";
          } elseif($p == 1) {
            $xml_file = "news.xml";
          } elseif($p == 2) {
            $xml_file = "contacts.xml";
          } else {
            $xml_file = "main.xml";
          }
          
          // Загружаем XML
          if(file_exists($xml_file)) {
            $s = simplexml_load_file($xml_file);
            
            if($p == 0 || $p == 2) {
              // Вывод Главной или Контактов
              for($i = 0; $i < (int)$s->datacount[0]; $i++) {
                echo "<h2>" . $s->data[$i]->header . "</h2>";  
                echo parse_bb_codes($s->data[$i]->text);
              }
            } else if($p == 1 && $news == 0) {
              // Вывод списка новостей
              for($i = 0; $i < (int)$s->datacount[0]; $i++) {
                $news_id = $i + 1;
                echo "<h2><a href='index.php?page=1&news=" . $news_id . "'>" . $s->data[$i]->header . "</a></h2>";  
                echo "<h4>" . $s->data[$i]->date . "</h4>";
                echo parse_bb_codes($s->data[$i]->shorttext);
                echo "<hr>";
              }
            } else if($p == 1 && $news != 0) {
              // Вывод конкретной новости целиком
              $idx = $news - 1;
              if(isset($s->data[$idx])) {
                echo "<h2>" . $s->data[$idx]->header . "</h2>";  
                echo "<h4>" . $s->data[$idx]->date . "</h4>";
                echo parse_bb_codes($s->data[$idx]->text);
                echo "<p><br><a href='index.php?page=1'>&larr; Назад к списку новостей</a></p>";
              }
            }
          } else {
            echo "<p>Файл данных не найден.</p>";
          }
        } else {
          // Если не авторизован — выводим ошибку доступа
          include "error.php";
        }
        ?>
      </div>
    </div>
    
    <div id="footer">
       <?php include "footer.php" ?>
    </div>
  </div>
</body>
</html>
