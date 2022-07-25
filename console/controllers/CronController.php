<?php

namespace console\controllers;

use console\models\Errors;
use console\models\GetInfo;
use console\models\Group;
use console\models\GroupMembers;
use console\models\Lessons;
use console\models\Students;
use console\models\Subjects;
use console\models\Teachers;
use common\models\Token;
use Yii;
use yii\console\Controller;

class CronController extends Controller
{
  public function actionGetOldToken()
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_URL, Token::HOST_OLD . '/v2api/auth/login');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(Token::DATA_OLD));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_decode(curl_exec($ch), true);
    $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (curl_errno($ch))
      throw new \Exception('Curl error');
    curl_close($ch);
    if ($code !== 200)
      throw new \Exception($result['name'] . ' - ' . $result['message']);

    $model = Token::findOne(1);
    if (empty($model)) {
      $model = new Token();
      $model->token_old = $result['token'];
      $model->save();
    } else {
      $model->token_old = $result['token'];
      $model->update();
    }
  }
  // public function actionGetNewToken()
  // {
  //   $ch = curl_init();
  //   curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/json']);
  //   curl_setopt($ch, CURLOPT_URL, Token::HOST_NEW . '/v2api/auth/login');
  //   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  //   curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(Token::DATA_NEW));
  //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //   $result = json_decode(curl_exec($ch), true);
  //   $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  //   if (curl_errno($ch))
  //     throw new \Exception('Curl error');
  //   curl_close($ch);
  //   if ($code !== 200)
  //     throw new \Exception($result['name'] . ' - ' . $result['message']);

  //   $model = Token::findOne(1);
  //   if (empty($model)) {
  //     $model = new Token();
  //     $model->token = $result['token'];
  //     $model->save();
  //   } else {
  //     $model->token = $result['token'];
  //     $model->update();
  //   }
  // }
  // public function actionGetLessons()
  // {
  //   Yii::$app->db->createCommand()->truncateTable('lessons')->execute();
  //   $getter = new GetInfo();
  //   $page = 0;
  //   $status = 1; // 1 - запланированный, 2 - отмененный, 3 - проведенный;
  //   do {
  //     $data = [
  //       'pageSize' => 1000,
  //       'page' => $page,
  //       'status' => 1,
  //     ];
  //     $rsp = $getter->sendRequest(GetInfo::ENTITY_LESSON, GetInfo::METHOD_INDEX, $data);
  //     foreach ($rsp['items'] as $i) {
  //       for ($t = 0; $t <= 5; $t++) {
  //         $model = new Lessons();
  //         if ($model->load($i, '')) {
  //           $model->customer_ids = $i['customer_ids'] ? json_encode($i['customer_ids'], JSON_UNESCAPED_UNICODE) : null;
  //           $model->date = $i['date'] ? date('Y-m-d', strtotime($i['date'])) : null;
  //           $model->details = $i['details'] ? json_encode($i['details'], JSON_UNESCAPED_UNICODE) : null;
  //           $model->group_ids = $i['group_ids'] ? json_encode($i['group_ids'], JSON_UNESCAPED_UNICODE) : null;
  //           $model->streaming = $i['streaming'] ? json_encode($i['streaming'], JSON_UNESCAPED_UNICODE) : null;
  //           $model->teacher_ids = $i['teacher_ids'] ? json_encode($i['teacher_ids'], JSON_UNESCAPED_UNICODE) : null;
  //           $model->time_from = $i['time_from'] ? date('Y-m-d', strtotime($i['time_from'])) : null;
  //           $model->time_to = $i['time_to'] ? date('Y-m-d', strtotime($i['time_to'])) : null;
  //           $model->crm_id = $i['id'];
  //           $error = $model->validate();
  //           if ($error) {
  //             $model->save();
  //           } else {
  //             $errorText = $model->errors;
  //           }
  //         }
  //         if ($error) {
  //           break;
  //         } elseif (!$error) {
  //           $errors = new Errors();
  //           $errors->table = 'lessons';
  //           $errors->error = json_encode($errorText, JSON_UNESCAPED_UNICODE);
  //           $errors->error_id = $model->crm_id;
  //           $errors->save();
  //         }
  //       }
  //     }
  //     $page = $page + 1;
  //     if ($rsp['total'] == $rsp['count']) {
  //       break;
  //     }
  //   } while (!empty($rsp['items']));
  // }
  // public function actionGetSubject()
  // {
  //   $getter = new GetInfo();
  //   $page = 0;
  //   $arr = [];
  //   do {
  //     $data = [
  //       'pageSize' => 1000,
  //       'page' => $page,
  //     ];
  //     $rsp = $getter->sendRequest(GetInfo::ENTITY_SUBJECT, GetInfo::METHOD_INDEX, $data);
  //     foreach ($rsp['items'] as $i) {
  //       $arr[] = $i;
  //     }
  //     $page = $page + 1;
  //     if ($rsp['total'] == $rsp['count']) {
  //       break;
  //     }
  //   } while (!empty($rsp['items']));
  //   Yii::$app->db->createCommand()->truncateTable('subjects')->execute();
  //   foreach ($arr as $i) {
  //     for ($t = 0; $t <= 5; $t++) {
  //       $model = new Subjects();
  //       if ($model->load($i, '')) {
  //         $model->crm_id = $i['id'];
  //         $error = $model->validate();
  //         if ($error) {
  //           $model->save();
  //         } else {
  //           $errorText = $model->errors;
  //         }
  //       }
  //       if ($error) {
  //         break;
  //       } elseif (!$error) {
  //         $errors = new Errors();
  //         $errors->table = 'subjects';
  //         $errors->error = json_encode($errorText, JSON_UNESCAPED_UNICODE);
  //         $errors->error_id = $model->crm_id;
  //         $errors->save();
  //       }
  //     }
  //   }
  // }
  // public function actionGetTeachers()
  // {
  //   $getter = new GetInfo();
  //   $page = 0;
  //   $arr = [];
  //   do {
  //     $data = [
  //       'pageSize' => 1000,
  //       'page' => $page,
  //     ];
  //     $rsp = $getter->sendRequest(GetInfo::ENTITY_TEACHER, GetInfo::METHOD_INDEX, $data);
  //     foreach ($rsp['items'] as $i) {
  //       $arr[] = $i;
  //     }
  //     $page = $page + 1;
  //     if ($rsp['total'] == $rsp['count']) {
  //       break;
  //     }
  //   } while (!empty($rsp['items']));
  //   Yii::$app->db->createCommand()->truncateTable('teachers')->execute();
  //   foreach ($arr as $i) {
  //     for ($t = 0; $t <= 5; $t++) {
  //       $model = new Teachers();
  //       if ($model->load($i, '')) {
  //         $model->addr = json_encode($i['addr'], JSON_UNESCAPED_UNICODE);
  //         $model->branch_ids = json_encode($i['branch_ids'], JSON_UNESCAPED_UNICODE);
  //         $model->dob = $i['dob'] ? date('Y-m-d', strtotime($i['dob'])) : null;
  //         $model->email = json_encode($i['email'], JSON_UNESCAPED_UNICODE);
  //         $model->crm_id = $i['id'];
  //         $model->phone = json_encode($i['phone'], JSON_UNESCAPED_UNICODE);
  //         $model->streaming_id = $i['streaming_id'];
  //         $model->web = json_encode($i['web'], JSON_UNESCAPED_UNICODE);
  //         $error = $model->validate();
  //         if ($error) {
  //           $model->save();
  //         } else {
  //           $errorText = $model->errors;
  //         }
  //       }
  //       if ($error) {
  //         break;
  //       } elseif (!$error) {
  //         $errors = new Errors();
  //         $errors->table = 'teachers';
  //         $errors->error = json_encode($errorText, JSON_UNESCAPED_UNICODE);
  //         $errors->error_id = $model->crm_id;
  //         $errors->save();
  //       }
  //     }
  //   }
  // }
  // public function actionGetStudents()
  // {
  //   $getter = new GetInfo();
  //   $allStudents = [];
  //   $page = 0;
  //   do {
  //     $data = [
  //       'is_study' => 1,
  //       'pageSize' => 1000,
  //       'page' => $page,
  //     ];
  //     $rsp = $getter->sendRequest(GetInfo::ENTITY_CUSTOMER, GetInfo::METHOD_INDEX, $data);
  //     foreach ($rsp['items'] as $i) {
  //       $allStudents[] = $i;
  //     }
  //     $page = $page + 1;
  //     if ($rsp['total'] == $rsp['count']) {
  //       break;
  //     }
  //   } while (!empty($rsp['items']));
  //   Yii::$app->db->createCommand()->truncateTable('students')->execute();
  //   foreach ($allStudents as $i) {
  //     for ($t = 0; $t <= 5; $t++) {
  //       $model = new Students();
  //       if ($model->load($i, '')) {
  //         $model->addr = $i['addr'] ? json_encode($i['addr'], JSON_UNESCAPED_UNICODE) : null;
  //         $model->balance = (int)$i['balance'];
  //         $model->balance_base = (int)$i['balance_base'];
  //         $model->branch_ids = $i['branch_ids'] ? json_encode($i['branch_ids'], JSON_UNESCAPED_UNICODE) : null;
  //         $model->dob = $i['dob'] ? date('Y-m-d', strtotime($i['dob'])) : null;
  //         $model->email = $i['email'] ? json_encode($i['email'], JSON_UNESCAPED_UNICODE) : null;
  //         $model->crm_id = $i['id'];
  //         $model->phone = $i['phone'] ? json_encode($i['phone'], JSON_UNESCAPED_UNICODE) : null;
  //         $model->teacher_ids = $i['teacher_ids'] ? json_encode($i['teacher_ids'], JSON_UNESCAPED_UNICODE) : null;
  //         $model->web = $i['web'] ? json_encode($i['web'], JSON_UNESCAPED_UNICODE) : null;
  //         $error = $model->validate();
  //         if ($error) {
  //           $model->save();
  //         } else {
  //           $errorText = $model->errors;
  //         }
  //       }
  //       if ($error) {
  //         break;
  //       } elseif (!$error) {
  //         $errors = new Errors();
  //         $errors->table = 'students';
  //         $errors->error = json_encode($errorText, JSON_UNESCAPED_UNICODE);
  //         $errors->error_id = $model->crm_id;
  //         $errors->save();
  //       }
  //     }
  //   }
  // }
  // public function actionGetGroup()
  // {
  //   $getter = new GetInfo();
  //   $arr = [];
  //   $page = 0;
  //   do {
  //     $data = [
  //       'pageSize' => 1000,
  //       'page' => $page,
  //     ];
  //     $rsp = $getter->sendRequest(GetInfo::ENTITY_GROUP, GetInfo::METHOD_INDEX, $data);
  //     foreach ($rsp['items'] as $i) {
  //       $arr[] = $i;
  //     }
  //     $page = $page + 1;
  //     if ($rsp['total'] == $rsp['count']) {
  //       break;
  //     }
  //   } while (!empty($rsp['items']));
  //   Yii::$app->db->createCommand()->truncateTable('group')->execute();
  //   foreach ($arr as $i) {
  //     for ($t = 0; $t <= 5; $t++) {
  //       $model = new Group();
  //       if ($model->load($i, '')) {
  //         $model->crm_id = $i['id'];
  //         $model->b_date = $i['b_date'] ? date('Y-m-d', strtotime($i['b_date'])) : null;
  //         $model->branch_ids = $i['branch_ids'] ? json_encode($i['branch_ids'], JSON_UNESCAPED_UNICODE) : null;
  //         $model->e_date = $i['e_date'] ? date('Y-m-d', strtotime($i['e_date'])) : null;
  //         $model->teacher_ids = $i['teacher_ids'] ? json_encode($i['teacher_ids'], JSON_UNESCAPED_UNICODE) : null;
  //         $model->teachers = $i['teachers'] ? json_encode($i['teachers'], JSON_UNESCAPED_UNICODE) : null;
  //         $error = $model->validate();
  //         if ($error) {
  //           $model->save();
  //         } else {
  //           $errorText = $model->errors;
  //         }
  //       }
  //       if ($error) {
  //         break;
  //       } elseif (!$error) {
  //         $errors = new Errors();
  //         $errors->table = 'group';
  //         $errors->error = json_encode($errorText, JSON_UNESCAPED_UNICODE);
  //         $errors->error_id = $model->crm_id;
  //         $errors->save();
  //       }
  //     }
  //   }
  // }
  // public function actionGetMembers()
  // {
  //   $group = Group::find()->asArray()->select('crm_id')->all();
  //   $getter = new GetInfo();
  //   $globalArr = [];
  //   if (!empty($group)) {
  //     foreach ($group as $i) {
  //       $arr = [];
  //       $page = 0;
  //       do {
  //         $rsp = $getter->sendRequest(GetInfo::ENTITY_CGI, GetInfo::METHOD_INDEX, null, ['group_id' => $i['crm_id']]);
  //         foreach ($rsp['items'] as $i) {
  //           $arr[] = $i;
  //         }
  //         $page = $page + 1;
  //         if ($rsp['total'] == $rsp['count']) {
  //           break;
  //         }
  //       } while (!empty($rsp['items']));
  //       foreach ($arr as $i) {
  //         $globalArr[] = $i;
  //       }
  //     }
  //   }
  //   Yii::$app->db->createCommand()->truncateTable('group_members')->execute();
  //   foreach ($globalArr as $i) {
  //     for ($t = 0; $t <= 5; $t++) {
  //       $model = new GroupMembers();
  //       if ($model->load($i, '')) {
  //         $model->b_date = $i['b_date'] ? date('Y-m-d', strtotime($i['b_date'])) : null;
  //         $model->e_date = $i['e_date'] ? date('Y-m-d', strtotime($i['e_date'])) : null;
  //         $model->crm_id = $i['id'];
  //         $error = $model->validate();
  //         if ($error) {
  //           $model->save();
  //         } else {
  //           $errorText = $model->errors;
  //         }
  //       }
  //       if ($error) {
  //         break;
  //       } elseif (!$error) {
  //         $errors = new Errors();
  //         $errors->table = 'group_members';
  //         $errors->error = json_encode($errorText, JSON_UNESCAPED_UNICODE);
  //         $errors->error_id = $model->crm_id;
  //         $errors->save();
  //       }
  //     }
  //   }
  // }
}
