<?php
namespace Epayindo;

class Api {
  public static function post($end_point, $data){
      $host = "https://epayindo.lalasung.com/sci";
      $ch = curl_init();
      $base_url = $host.$end_point;
      curl_setopt($ch, CURLOPT_URL, $base_url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $server_output = curl_exec ($ch);
      curl_close ($ch);
      $response = json_decode($server_output);
      return $response;
  }
}
