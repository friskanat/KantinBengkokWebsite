<?php
  include('dbconnect.php');
  //$ids = array();
  $pemesan = $_POST[nama];
  $lokasi = $_POST[alamat];
  $telepon = $_POST[telepon];
  $i=0;
  foreach ($_POST as $key => $value){
    if(strpos($key,"qty")!==false){
      if($value>0){
        $id=str_replace("qty","",$key);
        $ids[$id] = $_POST[$key];
        $i++;
      }
    } else {
      //do nothing
    }
  }
  $last_id=-1;
  echo "x";
  if(!$db->query("insert into pesanan(pemesan,lokasi,telepon) values('$pemesan','$lokasi','$telepon');")){
    echo $db->error;
  } else {
    $last_id=$db->insert_id;
  }

  if ($last_id>-1){
    foreach ($ids as $key => $id){
      if(!$db->query("insert into pesanansatuan(idpesanan,menu,jumlah) values($last_id,$key,$id);"))
        echo $db->error;
    }
  }
  header("Location: index.html");
 ?>
