<?php


namespace console\models;

use common\models\Token;
use phpDocumentor\Reflection\Types\Object_;

class GetInfo
{

  const ENTITY_LOCATION      = 'location', // сущность локации
    ENTITY_CUSTOMER          = 'customer', // центральная сущность CRM
    ENTITY_SUBJECT           = 'subject', // предметы обучения
    ENTITY_STUDY_STATUS      = 'study-status', // статусы обучения
    ENTITY_LEAD_STATUS       = 'lead-status', // этапы воронки продаж
    ENTITY_LEAD_SOURCE       = 'lead-source', // этапы воронки продаж
    ENTITY_PAY               = 'pay', // API платежей
    ENTITY_LESSON_TYPE       = 'lesson-type', // получить список «типы уроков» для дальнейшей работы с уроками и расписанием
    ENTITY_REGULAR_LESSON    = 'regular-lesson', // Получить список регулярного расписания
    ENTITY_LESSON            = 'lesson', // список уроков
    ENTITY_GROUP             = 'group', //  API для работы с группами
    ENTITY_CGI               = 'cgi', //  API для работы участниками группы
    ENTITY_TEACHER           = 'teacher', //  API для работы с учителями
    ENTITY_TASK              = 'task', //  Методы работы с задачами:
    ENTITY_CALENDAR          = 'calendar', //  получить список занятий клиента с ID
    ENTITY_CUSTOMER_TARIFF   = 'customer-tariff', //  список абонементов клиента
    ENTITY_COMMUNICATION     = 'communication', //   Работа с текстовыми коммуникациями по клиентам
    METHOD_INDEX             = 'index', //   Работа с текстовыми коммуникациями по клиентам
    METHOD_UPDATE            = 'update', //   Работа с текстовыми коммуникациями по клиентам
    METHOD_CREATE            = 'create', //   Работа с текстовыми коммуникациями по клиентам
    METHOD_CUSTOMER          = 'customer'; //   Работа с текстовыми коммуникациями по клиентам


  private $token;

  public function __construct()
  {
    $this->token = Token::findOne(1)->token_old;
  }

  public function sendRequest($entity, $method, $data = [], $get = null)
  {
    if (!empty($get)) {
      $query = '?' . http_build_query($get);
    }
    $data = json_encode($data, JSON_UNESCAPED_UNICODE);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["X-ALFACRM-TOKEN: {$this->token}", 'Accept: application/json', 'Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_URL, Token::HOST_OLD . '/v2api/' . Token::BRANCH . "/{$entity}/{$method}{$query}");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
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
