<?php
 
 $curl = curl_init();
 //header("Content-Type: application/json; charset=UTF-8");
// header('Content-type: text/plain; charset=utf-8');
 //header('Content-type: text/html; charset=utf-8');
//header('content-type:text/html;charset=utf-8');

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
    

 curl_setopt_array($curl, array(
   CURLOPT_URL => "https://api.aiforthai.in.th/tlexplus?text=ข้าวและแป้งมีสารอาหารหลักคือคาร์โบไฮเดรต",
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
   $arr = json_decode($response,true);
   echo"<br>";
  // print_r("{$arr}");
   array_walk_recursive($arr,function($item,$key){
     //echo "{$key}";
      if($key != NULL){
        global $menu;
        $menu = $item;
        echo "{$key} : {$item} <br>";
      }
   });
 // echo $response;
  //http_response_code(200);
 //echo json_encode($response,JSON_UNESCAPED_UNICODE);
 //$json = json_encode($response,JSON_UNESCAPED_UNICODE);

// Decode the html entities and end up with unicode again.
 //echo $json = html_entity_decode($json,JSON_UNESCAPED_UNICODE);
   // echo json_encode($response);
 // $response = var_dump(json_decode($response,JSON_UNESCAPED_UNICODE));
 }
//  JSON_UNESCAPED_UNICODE

 ?>