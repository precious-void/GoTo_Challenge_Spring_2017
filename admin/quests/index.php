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
    <link rel="stylesheet" href="css.css"/>
    <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<script>
function addteam(){
  var x = document.getElementsByName('com[]').length;
  var el = document.getElementById('commandsarea');
  el.innerHTML +=' <div class="alert alert-info" role="alert" id="team'+(x)+'">'+
  '<label for="basic-url">Комманда №'+(x+1)+'<a href="javascript:deleteteam('+(x)+');" class="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a></label>'+
  '<div class="input-group">'+
    '<span class="input-group-addon" id="basic-addon3">Пароль</span><input type="text" name="com[]" class="form-control" id="basic-url" aria-describedby="basic-addon3" placeholder="Введите пароль для группы!"></div></div>';
};
function addquest(){
  var x = document.getElementsByName('question[]').length;
  var el = document.getElementById('questions');
  el.innerHTML +=
  '<div class="alert alert-info" role="alert" id="question'+x+'">'+
  '<label for="basic-url">Вопрос №'+(x+1)+'<a href="javascript:deletequestion('+(x)+');" class="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a></label>'+
  '<div class="input-group"><span class="input-group-addon" id="basic-addon3">Вопрос</span><input type="text" name="question[]" class="form-control" id="basic-url" placeholder="Введите вопрос!" aria-describedby="basic-addon3"></div><br><div class="input-group"><span class="input-group-addon" id="basic-addon3">Ответ</span><input type="text" name="answer[]" class="form-control" id="basic-url" placeholder="Введите ответ на вопрос!" aria-describedby="basic-addon3"></div> </div>'
;};

function deleteteam(x){
  console.log(x);
  var elem = document.getElementById("team"+(x));
  console.log(elem);
  elem.parentNode.removeChild(elem);
};
function deletequestion(x){
  console.log(x);
  var elem = document.getElementById("question"+(x));
  console.log(elem);
  elem.parentNode.removeChild(elem);
};
function change(){
  var x=document.getElementById('changer');
  if (x.value=='Остановить'){
    x.name='start';
    x.value='Запустить';
    x.className='save g';
  }
  else{
    x.name='stop';
    x.value='Остановить';
    x.className='save r';
  }
};
</script>
<body>
<?php
checker();
openwrap();
leftcol(2);
rightcolop();
//
?>
<iframe name="iframe1" style="display:none"></iframe>

<form method="POST" target="iframe1" id="form">
  <div class="row post">
        <h1 class="title"><img src="../img/icons/passwords.svg" class="icon">&nbsp;Создание квеста</h1>
        <div class="col-md-4">
            <div class="wrap" id="commandsarea">
            <?php
            $data=readjson('quest.json');
            echo '<h2 class="password">Комманды</h2>';
            $teams=$data->{"groups"};
            $stroke='';
            for($i=0; $i < count($teams); $i++)
            {
              $stroke.='
              <div class="alert alert-info" role="alert" id="team'.strval($teams[$i]->{'id'}).'">
              <label for="basic-url">Комманда №'.strval($teams[$i]->{'id'}).'<a href="javascript:deleteteam('.strval($teams[$i]->{'id'}).');" class="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a></label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">Пароль</span>
                <input type="text" name="com[]" class="form-control" id="basic-url" placeholder="Введите пароль для группы!" aria-describedby="basic-addon3" value="'.strval($teams[$i]->{'password'}).'">
              </div>
              </div>';
            }
            echo($stroke);
            // Вывод паролей
            ?>
          </div>
          <button type="button" class="btn btn-success plus" onclick="addteam();"><span class="glyphicon glyphicon-plus" aria-hidden="true"></button>
        </div>

        <div class="col-md-8">
        <div class="wrap" id="questions">
        <?php
        echo '<h2 class="password">Вопросы</h2>';
        $data=readjson('quest.json');
        $questions=$data->{"questions"};
        $stroke='';
        for($i=0; $i < count($questions); $i++){
          $stroke.='
          <div class="alert alert-info" role="alert" id="question'.strval($questions[$i]->{'id'}).'">
          <label for="basic-url">Вопрос №'.strval($questions[$i]->{'id'}).'<a href="javascript:deletequestion('.strval($teams[$i]->{'id'}).');" class="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></a></label>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Вопрос</span>
            <input type="text" name="question[]" class="form-control" id="basic-url" placeholder="Введите вопрос!" aria-describedby="basic-addon3" value="'.strval($questions[$i]->{'question'}).'">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">Ответ</span>
            <input type="text" name="answer[]" class="form-control" id="basic-url" placeholder="Введите ответ на вопрос!" aria-describedby="basic-addon3" value="'.strval($questions[$i]->{'answer'}).'">
          </div>
          </div>';
        }
        echo $stroke;
         ?>

         </div>
         <button type="button" class="btn btn-success plus" onclick="addquest()"><span class="glyphicon glyphicon-plus" aria-hidden="true" class="plus"></button>
      </div>

  </div>
        <div class="col-md-4 post">
      <?php
        $quest=readjson('quest.json');
        if (strval($quest->{"quest"})==strval(1)){
          echo'<input type="submit" name="stop" class="save r" value="Остановить" onclick="change();" id="changer">';
        }
        else{
          echo'<input type="submit" name="start" class="save g" value="Запустить" onclick="change();" id="changer">';
        }
       ?></div>
</form>
<?php

if (isset($_POST['stop'])){
  $quest=readjson('quest.json');
  $teams=$_POST['com'];
  $arr=array();
  for($i=1; $i < (count($teams)+1); $i++){
    if ($teams[$i-1]!=''){
      $group='';
      $group->{"id"}=$i;
      $group->{'password'}=$teams[$i-1];
      $group->{'activequetsion'}=1;
      $group->{'users'}=array();
      array_push($arr,$group);
    }
  }
  $quest->{'groups'}=$arr;
  $questions=$_POST['question'];
  $answers=$_POST['answer'];
  $array=array();
  for($i=1; $i < count($questions)+1; $i++){
    if ($questions[$i-1]!='' &&  $answers[$i-1]!=''){
      $group='';
      $group->{"id"}=$i;
      $group->{'question'}=$questions[$i-1];
      $group->{'answer'}=$answers[$i-1];
      array_push($array,$group);
    }
  }
  $quest->{'questions'}=$array;
  $quest->{'quest'}=1;
  writejson('quest.json',$quest);
  }
if (isset($_POST['start'])){
  $quest=readjson('quest.json');
  $quest->{'quest'}=0;
  writejson('quest.json',$quest);
}
    rightcolcl();
    closewrap();

?>
</body>
</html>
