<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>โปรแกรมแยกคำออกจากชื่อ</h2>
  <form action="#" method="post">
    <div class="mb-3 mt-3">
      <label for="text">Word:</label>
      <input type="text" class="form-control" id="text" placeholder="enter word" name="text">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <br>
  <h1>คำค้น</h1>
<?php

// Check if image file is a actual image or fake image
if (!empty($_POST["text"])) {
  $input = $_POST["text"];    



  $curl = curl_init();
  
 curl_setopt_array($curl, array(
   CURLOPT_URL => "https://api.aiforthai.in.th/tlexplus?text=" . "$input",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array(
     "Apikey: TTH6paIqrwJrmArUNLgz1Gzd4h9bk9NK"
   )
 ));
  
 $response = curl_exec($curl);
 $err = curl_error($curl);


  
 curl_close($curl);



 if ($err) {
   echo "cURL Error #:" . $err;
 } else {
//    echo $response ;
    $arr = json_decode($response,true);
    
    array_walk_recursive($arr, function($item, $key) {
    if($key == "input"){
      echo "คำค้น : {$item}<br>";
      echo "<h1>ผลลัพธ์</h1>";
    }else{
    echo "คำที่ {$key} {$item} <br>";
    }
   });
   curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.aiforthai.in.th/soundex?word=" . $input . "&model=personname",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Apikey: TTH6paIqrwJrmArUNLgz1Gzd4h9bk9NK"
    )
  ));
   
  $response = curl_exec($curl);
  $err = curl_error($curl);
 
 
   
  curl_close($curl);
  echo "<br><h2>ชื่อที่ใกล้เคียง</h2>";
  $arr = json_decode($response,true);
    array_walk_recursive($arr, function($item, $key) {
    if($key == "word"){
      echo "- {$item} <br>";
    }
    
   });
 

 }
} else {  
  echo "ยังไม่มีข้อมูลเพื่อประมวลผล";
}




?>

</div>
<div>
  
</div>

</body>
</html>
