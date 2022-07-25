<?php

namespace frontend\controllers;

use common\models\User;
use console\models\GetInfo;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use console\models\Lessons;
use console\models\Students;
use console\models\Subjects;

/**
 * Site controller
 */
class StudentController extends Controller
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
    return $this->render('index');
  }

  public function actionQuiz()
  {
    return $this->render('quiz');
  }

  public function actionLesson()
  {
    return $this->render('lesson');
  }
}
