<?php

//헤더 생략

/*
사실 CURL 을 통해서 S3에 직접 업로드 해보고자 하였으나, 파일을 암호화 하고 올리는 것이 잘 안돼서 포기하고
외부 서버 통해서 업로드를 한 것입니다.
*/


if($_FILES["file"] != null){
  $tmpPath = $_FILES['file']['tmp_name'];
  $filename = $_FILES['file']['name'];
  $data = array('file' =>"@$tmpPath;filename=$filename");
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,''/*EXTERNALSERVERIP*/);
  curl_setopt($ch,CURLOPT_POST,1);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  $response = curl_exec($ch);
  echo $response;
}

?>
