<?php
if (isset($_GET['method']) && isset($_GET['count'])) {
  $method = htmlspecialchars($_GET['method']);
  $count = htmlspecialchars($_GET['count']);
  $query ='';
  if ($method == 'last')
    $query ='SELECT * FROM (SELECT * FROM `chatmessages` order by id desc LIMIT '.$count.') as t order by id';
  if ($query != ''){
    require_once 'sql_connectdata.php';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    if($result){
      while ($row = $result->fetch_assoc()) {
        echo $row['name'] .':'. $row['mess'].';';
      }
    }
  } else echo 0;
} else echo 0;
?>
