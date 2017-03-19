<?php
setlocale (LC_ALL, "ru_RU.UTF-8");
header('Content-type: text/html; charset=UTF-8');
    include('../checker.php');
    include('../function.php');
?>
<html>
<head>
<title>Веб-сервис</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no,width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../fonts/ubuntu.css"/>
    <link rel="stylesheet" href="../css/admin.css"/>
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<?php
checker();
openwrap();
leftcol(1);
rightcolop();
?>
<iframe name="iframe1" style="display:none"></iframe>

<form method="POST" target="iframe1" id="form">
        <div class="row post">

        <div class="col-md-3 green">
            <div class="wrap">
            <h1 class="title"><img src="../img/icons/passwords.svg" class="icon">&nbsp;Конфигурация</h1>
            <?php
            $data=readjson('info.json');
            echo '<h2 class="password">Токен бота</h2>';
            echo '<input class="passwrds" type="text" name="token" value="'.$data->{"token"}.'" placeholder="Введите токен бота!">';
            echo '<h2 class="password">Админ</h2>';
            echo '<input class="passwrds" type="text" name="admin" value="'.$data->{"admincode"}.'" placeholder="Введите пароль!">';
            echo '<h2 class="password">Пользователь</h2>';
            echo '<input class="passwrds" type="text" name="user" value="'.$data->{"usercode"}.'" placeholder="Введите пароль!">';
            // Вывод паролей
            ?>
            <br>
            <input type="submit" name="password" class="save" value="Сохранить">
          </div>
        </div>


        <div class="col-md-3 orange">
            <div class="wrap">
            <h1 class="title"><img src="../img/icons/phones.svg" class="icon">&nbsp;Контакты</h1>
            <?php
            $info=readjson('info.json')->{"info"};
            echo ('<textarea name="tinfo" class="textarea" placeholder="Введите контакты!">'.$info.'</textarea>');
            // Вывод расписания
            ?>
            <input type="submit" name="info" class="save" value="Сохранить">
          </div>
        </div>

        <div class="col-md-3 green">
          <div class="wrap">
          <h1 class="title"><img src="../img/icons/adress.svg" class="icon">&nbsp;Проживание</h1>
            <?php
              $adress=readjson('info.json')->{"adress"};
              echo ('<textarea name="tadress" class="textarea" placeholder="Введите информацию о проживании!">'.$adress.'</textarea>');
              // Вывод расписания
              ?>

              <input type="submit" name="adress" class="save" value="Сохранить">
          </div>
        </div>

        <div class="col-md-3 orange">
            <div class="wrap">
            <h1 class="title"><img src="../img/icons/schedule.svg" class="icon">&nbsp;Расписание</h1>
            <?php
            $schedule=readjson('info.json')->{"schedule"};
            echo ('<textarea name="tschedule" class="textarea" placeholder="Введите расписание!">'.$schedule.'</textarea>');
            ?>
            <input type="submit" name="schedule" class="save" value="Сохранить">
            </div>

        </div>

        <div class="col-md-3 violet">
            <div class="wrap">
            <h1 class="title mes" ><img src="../img/icons/message.svg" class="icon">&nbsp;Срочное сообщение</h1>
            <textarea name="tmessage" class="textarea tmessagear" id="message" placeholder="Введите срочное сообщение!"></textarea>
            <input type="submit" name="message" class="save" value="Отправить" onclick="setTimeout(function(){document.getElementById('message').value='';},1000);">
            </div>
        </div>
        </div>
</form>
<?php
if (isset($_POST['schedule'])){
    $data=readjson('info.json');
    $data->{"schedule"}=$_POST['tschedule'];
    writejson('info.json',$data);
    $message=$_POST['tschedule'];
    $token=$_POST['token'];
    $members=readjson('members.json')->{"members"};
    $message=explode("\r\n",$message);
    $str='';
    for($i=0; $i < count($message); $i++)
    {
      $str.='<b>'.substr($message[$i],0,5).'</b>'.substr($message[$i],5)."%0A";
    }
//%0A"
    for($i=0; $i < count($members); $i++)
    {
      $id=$members[$i]->{'id'};
      $stroke='https://api.telegram.org/bot'.$token.'/sendmessage?chat_id='.$id.'&parse_mode=HTML&text=<b>Новое расписание!</b>%0A%0A'.$str;
      $messagesend=file_get_contents("$stroke");
    }

}
if (isset($_POST['info'])){
    $data=readjson('info.json');
    $data->{"info"}=$_POST['tinfo'];
    writejson('info.json',$data);
}
if (isset($_POST['adress'])){
    $data=readjson('info.json');
    $data->{"adress"}=$_POST['tadress'];
    writejson('info.json',$data);
}
if (isset($_POST['password'])){
  $data=readjson('info.json');
  $data->{"admincode"}=$_POST['admin'];
  $data->{"usercode"}=$_POST['user'];
  $data->{"token"}=$_POST['token'];
  writejson('info.json',$data);
}
if (isset($_POST['message'])){
  $message=$_POST["tmessage"];
  $token=$_POST['token'];
  $members=readjson('members.json')->{"members"};
  $message=str_replace("\r\n",'%0A',$message);
  for($i=0; $i < count($members); $i++)
  {
    $id=$members[$i]->{'id'};
    $stroke="https://api.telegram.org/bot".$token."/sendmessage?chat_id=".$id."&parse_mode=HTML&text=<b>Срочное сообщение!</b>%0A%0A".$message;
    $messagesend=file_get_contents($stroke);
  }
}
    rightcolcl();
    closewrap();
?>
</body>
</html>
