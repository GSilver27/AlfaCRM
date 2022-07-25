<?php

namespace frontend\controllers;

use common\models\User;
use console\models\GetInfo;
use console\models\Token;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\helpers\Url;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
  /**
   * {@inheritdoc}
   */
  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout', 'signup'],
        'rules' => [
          [
            'actions' => ['signup'],
            'allow' => true,
            'roles' => ['?'],
          ],
          [
            'actions' => ['logout'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      //            'verbs' => [
      //                'class' => VerbFilter::className(),
      //                'actions' => [
      //                    'logout' => ['post'],
      //                ],
      //            ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
      'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
      ],
    ];
  }

  /**
   * Displays homepage.
   *
   * @return mixed
   */
  public function actionIndex()
  {
    return $this->redirect(Url::to(['login']));
  }


  public function actionGetToken()
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/json', 'X-APP-KEY: 471e706a808bb8efbff2f7872671fde7']);
    curl_setopt($ch, CURLOPT_URL, 'https://api.alfacrm.pro/v396/auth/login');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
      'username' => 'jtsu.c@yandex.ru',
      'password' => 'mm5fNMoQl9'
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = json_decode(curl_exec($ch), true);
    $code   = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (curl_errno($ch))
      throw new \Exception('Curl error');
    curl_close($ch);
    if ($code !== 200)
      throw new \Exception($result['name'] . ' - ' . $result['message']);

    print_r($result);
    $model = Token::findOne(1);
    if (empty($model)) {
      $model = new Token();
      $model->token = $result['token'];
      $model->save();
    } else {
      $model->token = $result['token'];
      $model->update();
    }
  }

  /**
   * Logs in a user.
   *
   * @return mixed
   */
  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->redirect(Url::to(['/student']));
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    }

    $model->password = '';

    return $this->render('login', [
      'model' => $model,
    ]);
  }

  /**
   * Logs out the current user.
   *
   * @return mixed
   */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->redirect('login');
  }

  /**
   * Signs user up.
   *
   * @return mixed
   */
  public function actionSignup()
  {
    $post = Yii::$app->request->post();
    $getInfo = new GetInfo();
    $data = [
      'name' => $post['SignupForm']['username'],
      'phone' => $post['SignupForm']['phone'],
      'email' => $post['SignupForm']['email'],
    ];
    if ($post['is_student'] == 0) {
      $data['is_study'] = 1;
      $data['legal_type'] = 1;
      $data['branch_ids'] = Token::BRANCH;
      $response = $getInfo->sendRequest(GetInfo::ENTITY_CUSTOMER, GetInfo::METHOD_CREATE, $data);
    } else {
      $data['gender'] = $post['SignupForm']['gender'];
      $response = $getInfo->sendRequest(GetInfo::ENTITY_TEACHER, GetInfo::METHOD_CREATE, $data);
    }
    if ($response) {
      $data = [
        '_csrf-frontend' => $post['_csrf-frontend'],
        'SignupForm' => [
          'username' => $post['SignupForm']['username'],
          'phone' => $post['SignupForm']['phone'],
          'gender' => $post['SignupForm']['gender'],
          'email' => $post['SignupForm']['email'],
          'is_student' => $post['SignupForm']['is_student'],
          'crm_id' => $response['model']['id'],
          'password' => $post['SignupForm']['password'],
        ]
      ];
    }
    $model = new SignupForm();
    if ($model->load($data) && $model->signup()) {
      $login = new LoginForm();
      $login->username = $model->username;
      $login->password = $model->password;
      if ($login->login()) return $this->goHome();
    }

    return $this->render('signup', [
      'model' => $model,
    ]);
  }

  /**
   * Requests password reset.
   *
   * @return mixed
   */
  public function actionRequestPasswordReset()
  {
    $model = new PasswordResetRequestForm();
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      if ($model->sendEmail()) {
        Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

        return $this->goHome();
      }

      Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
    }

    return $this->render('requestPasswordResetToken', [
      'model' => $model,
    ]);
  }

  /**
   * Resets password.
   *
   * @param string $token
   * @return mixed
   * @throws BadRequestHttpException
   */
  public function actionResetPassword($token)
  {
    try {
      $model = new ResetPasswordForm($token);
    } catch (InvalidArgumentException $e) {
      throw new BadRequestHttpException($e->getMessage());
    }

    if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
      Yii::$app->session->setFlash('success', 'New password saved.');

      return $this->goHome();
    }

    return $this->render('resetPassword', [
      'model' => $model,
    ]);
  }

  /**
   * Verify email address
   *
   * @param string $token
   * @return yii\web\Response
   * @throws BadRequestHttpException
   */
  public function actionVerifyEmail($token)
  {
    try {
      $model = new VerifyEmailForm($token);
    } catch (InvalidArgumentException $e) {
      throw new BadRequestHttpException($e->getMessage());
    }
    if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
      Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
      return $this->goHome();
    }

    Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
    return $this->goHome();
  }

  /**
   * Resend verification email
   *
   * @return mixed
   */
  public function actionResendVerificationEmail()
  {
    $model = new ResendVerificationEmailForm();
    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      if ($model->sendEmail()) {
        Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
        return $this->goHome();
      }
      Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
    }

    return $this->render('resendVerificationEmail', [
      'model' => $model
    ]);
  }

  public function actionConnect()
  {
    Yii::$app->response->format = Response::FORMAT_JSON;
    if (!empty($_POST)) {
      $post = $_POST;
    } else {
      return ['status' => false];
    }
    $info = new GetInfo();
    $response = $info->sendRequest($post['entity'], $post['method'], $post['data'], $post['get']);
    if ($response['success'] === false)
      return ['status' => false, 'message' => 'Ошибка загрузки сервера, повторите пожалуйста позже'];
    else
      return ['status' => true, 'response' => $response];
  }
}
