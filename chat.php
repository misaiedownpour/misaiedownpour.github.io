<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="style/style.css">
    <title>Welcome to nginx!</title>
    <script type="text/javascript">
      function ready() {
        var block = document.getElementById("chatout");
        block.scrollTop = block.scrollHeight;
      }
      document.addEventListener("DOMContentLoaded", ready);
    </script>
  </head>
  
  <body>
    <h1>Типа чат</h1>
    <?php
		require_once 'sql_connectdata.php';
    session_start();
    if (!isset($_SESSION['name'])) {
      header('Location: chatauth?action=reset');
    } else {
      $name = htmlspecialchars($_SESSION['name'], ENT_QUOTES);
      //если пользователь отправил сообщение
      if (isset($_POST['message'])){
        //профильтровать содержимое
        $message = htmlspecialchars($_POST['message'], ENT_QUOTES);
        //записать в бд
        mysqli_query($link, "INSERT INTO chatmessages (name, mess) VALUES ('$name', '$message')")
        or die("Ошибка " . mysqli_error($link));
        //перенаправить на тот же адрес чтобы не было повторной отправки формы
        header('Location: chat');
      }
      $about = '';
      if (isset($_SESSION['about']))
        $about = htmlspecialchars($_SESSION['about'], ENT_QUOTES);
      echo '<h3>Имя: '.$name.'</h3>';
      echo '<h3>О себе: '.$about.'</h3>';
      echo '<a href="chatauth?action=reset">сбросить</a>';
      echo '
      <br><br>
      <div class="chat_main">
        <div class="chat_messages" id="chatout">
          <div style="display:block;min-height:100%;"></div>';
    	$query ='SELECT * FROM (SELECT * FROM `chatmessages` order by id desc LIMIT 15) as t order by id';
    	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    	if($result){
				while ($row = $result->fetch_assoc()) {
          echo '<div class="chat_message">';
          echo $row['name'] .': '. $row['mess'].'</div>';
				}
      }
      echo '</div>
        <div class="chat_footer">
          <form method="post" action="chat">
            <input class="chat_footer_input" type="text" name="message">
            <button class="chat_footer_button" type="submit">Send</button>
          </form>
        </div>
      </div>
      ';
    }
    ?>
    <a href="index"><span class="areg_button">Вернуться на главную</span></a>
  </body>
</html>
