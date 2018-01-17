<?php
// 상단 헤더 생략

if($_FILES['file'] != null){
  try {
    $result = $s3Client->putObject([
        'Bucket' => '***********',
        'Key'    => $_FILES["file"]['name'],
        'Body'   => fopen($_FILES["file"]["tmp_name"],'r'),
        'ACL'    => 'public-read',
      ]);
    echo $result
  } catch (Aws\S3\Exception\S3Exception $e) {
    echo "aws 에러남 ㅋㅋ";
  }

}

?>
