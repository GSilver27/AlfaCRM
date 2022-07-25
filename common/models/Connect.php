<?php

namespace common\models;

use common\models\Token;

class Connect
{
  const POST_METHOD = 'POST',
    PUT_METHOD = 'PUT',
    GET_METHOD = 'GET',
    PATCH_METHOD = 'PATCH';

  private $token;
  public function __construct()
  {
    $this->token = Token::findOne(1)->token;
  }

  public function sendRequest($method, $get, $data)
  {
    $data = json_encode($data, JSON_UNESCAPED_UNICODE);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, [Token::KEY, "Authorization: Bearer {$this->token}", 'Accept: application/json', 'Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_URL, Token::HOST . $get);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = json_decode(curl_exec($ch), true);
    $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (curl_errno($ch))
      throw new \Exception('Curl error');
    curl_close($ch);
    if ($code !== 200)
      throw new \Exception($result['name'] . '-' . $result['message']);
    return $result;
  }
}
