<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style/style.css">
    <title>Welcome to nginx!</title>
  </head>
  <body>
    <h1>Типа чат</h1>
    <?php
    session_start();
    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'reset'){
        unset($_SESSION['name']);
				header('Location: chatauth');
      }
    }
    if (isset($_POST['name'])) {
      if ($_POST['name'] == ''){
        header('Location: chatauth?action=reset');
      }
      $_SESSION['name'] = $_POST['name'];
      if (isset($_POST['about'])) {
        $_SESSION['about'] = $_POST['about'];
      }
    }
    if (isset($_SESSION['name'])) {
      header('Location: chat');
    } else {
      echo '<h3>Авторизируйтесь</h3>
      <form method="post" enctype="multipart/form-data" action="chatauth">
        <div><label class="reg_label" for="name">Имя:</label><div>
        </div><input class="reg_input" type="text" name="name" required></div>
        <div><label class="reg_label" for="name">О себе:</label><div>
        </div><input class="reg_input" type="text" name="about"></div>
        <button class="reg_button" type="submit">Подтвердить</button>
      </from>';
    }
    ?>
    <a href="index"><span class="areg_button">Вернуться на главную</span></a>
  </body>
</html>
