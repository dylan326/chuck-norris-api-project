<?php

class CrudApiCalls {
    


public function callAPI($method, $url, $data){
  $curl = curl_init();

  switch ($method){
     case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
     case "PUT":
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data)
           curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
        break;
     default:
        if ($data)
           $url = sprintf("%s?%s", $url, http_build_query($data));
  }

  // OPTIONS:
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
     //'APIKEY: 111111111111111111111',
     "X-RapidAPI-Host: matchilling-chuck-norris-jokes-v1.p.rapidapi.com",
     "X-RapidAPI-Key: 341b5c1156msh6827bf7184ef4ddp1c8d09jsnbc52db5d01be",
     'Content-Type: application/json',
  ));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

  // EXECUTE:
  $result = curl_exec($curl);
  if(!$result){die("Connection Failure");}
  curl_close($curl);
  return $result;
}
//print_r(callApi('GET','https://matchilling-chuck-norris-jokes-v1.p.rapidapi.com/jokes/random',''));


}