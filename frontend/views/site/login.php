<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var \common\models\LoginForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>Для входа заполните все данные</p>

  <div class="row">
    <div class="col-lg-5">
      <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

      <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

      <?= $form->field($model, 'password')->passwordInput() ?>

      <?= $form->field($model, 'rememberMe')->checkbox() ?>

      <div style="color:#999;margin:1em 0">
        Если вы забыли пароль вы можете <?= Html::a('востановить его', ['site/request-password-reset']) ?>.
      </div>

      <div style="gap: 15px; display: flex; align-items: center" class="form-group">
        <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        <a href="<?= Url::to(['signup']) ?>">Регистрация</a>
      </div>

      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>
