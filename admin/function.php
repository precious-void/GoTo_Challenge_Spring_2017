<?php
function openwrap()
    {
    echo'<div class="containercol">';
}
function closewrap(){
    echo'</div>';
}
function leftcol($a){
    if ($a==1){echo'<div class="leftcolumn"><ul><li class="menu"><a href="../main" aria-haspopup="true" class="menu-trig activet"><div class="menu-name"><span class="glyphicon glyphicon-cog menu-symb" aria-hidden="true"><br></span><div class="hid" >Настройки</div></div></a></li><li class="menu"><a href="../quests" aria-haspopup="true" class="menu-trig"><div class="menu-name"><span class="glyphicon glyphicon-list-alt menu-symb" aria-hidden="true"><br></span><div class="hid">Квесты</div></div></a></li><li class="menu"><a href="../exit.php" aria-haspopup="true" class="menu-trig"><div class="menu-name"><span class="glyphicon glyphicon-off menu-symb" aria-hidden="true"><br></span><div class="hid">Выход</div></div></a></li></ul></div>';}
    if ($a==2){echo'<div class="leftcolumn"><ul><li class="menu"><a href="../main" aria-haspopup="true" class="menu-trig"><div class="menu-name"><span class="glyphicon glyphicon-cog menu-symb" aria-hidden="true"><br></span><div class="hid" >Настройки</div></div></a></li><li class="menu"><a href="../quests" aria-haspopup="true" class="menu-trig activet"><div class="menu-name"><span class="glyphicon glyphicon-list-alt menu-symb" aria-hidden="true"><br></span><div class="hid">Квесты</div></div></a></li><li class="menu"><a href="../exit.php" aria-haspopup="true" class="menu-trig"><div class="menu-name"><span class="glyphicon glyphicon-off menu-symb" aria-hidden="true"><br></span><div class="hid" >Выход</div></div></a></li></ul></div>';}
}
function rightcolop(){
    echo'<div class="rightcolumn"><div class="wrapper">';
}
function rightcolcl(){
    echo'</div></div>';
}
function charset(){
    date_default_timezone_set('Europe/Moscow');
    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET 'utf8'");
    mysql_set_charset("utf8");
}
function checker(){
  if (!is_file('../../bot/info.json')){
      $data='{"admincode":"","usercode":"","schedule":"","adress":"","info":"","token":""}';
      file_put_contents("../../bot/info.json",$data);
  }
  if (!is_file('../../bot/members.json')){
      $data='{"members":[]}';
      file_put_contents("../../bot/members.json",$json_text);
  }
}
function writejson($name,$object){
  $json_text = json_encode($object);
  //$json_text=str_replace('<br>', '\n',$json_text);
  file_put_contents("../../bot/".strval($name),$json_text);
}
function readjson($name){
  $json_text = file_get_contents("../../bot/".strval($name));
  //$json_text=str_replace('\n', '<br>',$json_text);
  $obj = json_decode($json_text);
  return $obj;
}

function curl($url){
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "$url");
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
  // create curl resource
   /*$ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
   curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
   $output = curl_exec($ch);
   curl_close($ch);
   return $output;
   $ch = curl_init( $url );
   curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
   curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
   curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
   $response = curl_exec( $ch );
   curl_close( $ch );
   return $response;*/
}
?>
