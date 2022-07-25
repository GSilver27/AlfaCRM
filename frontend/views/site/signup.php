<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */

/** @var \frontend\models\SignupForm $model */

use common\models\Token;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$token = Token::findOne(2)->token;

$js = <<< JS

  const role = document.querySelector('#signupform-is_student'),
        gender = document.querySelector('.field-signupform-gender');
  gender.setAttribute('hidden', '');
  role.addEventListener('change', function () {
    if (this.value === '1'){
      gender.removeAttribute('hidden', '');
    } else {
      gender.setAttribute('hidden', '');
    }
  });
  
JS;
$this->registerJs($js);
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup container">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>Пожалуйста заполните все поля формы для регистрации</p>

  <div class="row">
    <div class="col-lg-5">
      <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

      <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

      <?= $form->field($model, 'email') ?>

      <?= $form->field($model, 'phone') ?>

      <?= $form->field($model, 'is_student')->dropdownList([0 => 'Ученик', 1 => 'Преподаватель']) ?>

      <?= $form->field($model, 'gender')->dropdownList([0 => 'Женщина', 1 => 'Мужчина']) ?>

      <?= $form->field($model, 'password')->passwordInput() ?>


      <div style="gap: 15px; display: flex; align-items: center" class="form-group">
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        <a href="<?= Url::to(['login']) ?>">У меня уже есть аккаунт</a>
      </div>

      <?php ActiveForm::end(); ?>
    </div>
  </div>
</div>