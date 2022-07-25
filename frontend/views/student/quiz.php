<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Страница теста';
$js = <<< JS
$('.startTest').on('click', function () {
  $('.step0').fadeOut(300, function(){
    $('.quizForm').fadeIn(300)
  });
});
$('.next').on('click', function () {
  /**
   * Сделать функцию смены шагов и завершения теста
   */
})

JS;
$this->registerJs($js);
$this->registerCssFile(Url::to(['css/student/quiz.css']))
?>
<div class="container">
  <section class="quizSection">
    <div class="quizBody">
      <a class="quizBody-back" href="<?= Url::to(['index']) ?>">
        <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.971" fill-rule="evenodd" clip-rule="evenodd" d="M7.37162 0.0140805C8.10905 -0.0726677 8.52601 0.241417 8.62256 0.956329C8.62497 1.15376 8.57284 1.33638 8.46619 1.50415C6.76103 3.17684 5.0559 4.84948 3.35074 6.52217C8.96509 6.53676 14.5794 6.5514 20.1938 6.56599C20.9332 6.79691 21.164 7.27167 20.8863 7.99032C20.7287 8.24679 20.4979 8.40018 20.1938 8.45049C14.5794 8.46508 8.96509 8.47972 3.35074 8.49432C5.04098 10.1524 6.73127 11.8105 8.42152 13.4685C8.71964 13.9931 8.63775 14.4532 8.1758 14.849C7.78014 15.064 7.39297 15.0494 7.01421 14.8052C4.74317 12.5774 2.4721 10.3496 0.201044 8.1218C-0.0670147 7.71278 -0.0670147 7.30371 0.201044 6.89468C2.4721 4.6669 4.74317 2.43908 7.01421 0.211295C7.13032 0.132629 7.24947 0.0668903 7.37162 0.0140805Z" fill="#5B5B5B" />
        </svg>
        Назад
      </a>
      <div class="step step0">
        <p class="step0_title">Самое время пройти тест</p>
        <ul class="step0_list">
          <li class="step0_item">4 вопроса</li>
          <li class="step0_item">Время не фиксируется</li>
        </ul>
        <button type="button" class="btn-big btn-green startTest">
          <img src="<?= Url::to(['img/icons/test.webp']) ?>" alt="">
          Пройти тест
        </button>
      </div>
      <?= Html::beginForm('', 'post', ['class' => 'quizForm']) ?>
      <div class="step step1">
        <p class="quizQues">Что такое Scratch?</p>
        <div class="quizAnswer_block">
          <label class="quizAnswer_label">
            <input data-step='1' name="radio" value="qwe" class="quizAnswer_input" type="radio">
            <div class="quizAnswer_marker"></div>
            <p class="quizAnswer_text">Среда программирования</p>
          </label>
          <label class="quizAnswer_label">
            <input data-step='1' name="radio" value="qwe1" class="quizAnswer_input" type="radio">
            <div class="quizAnswer_marker"></div>
            <p class="quizAnswer_text">Среда программирования</p>
          </label>
          <label class="quizAnswer_label">
            <input data-step='1' name="checkbox" value="qwe1" class="quizAnswer_input" type="checkbox">
            <div class="quizAnswer_marker-ch"></div>
            <p class="quizAnswer_text">Среда программирования</p>
          </label>
        </div>
      </div>
      <div class="progressBar">
        <div class="countSteps">
          <span>1</span>
          <span>/</span>
          <span>4</span>
        </div>
        <div class="lineProgress">
          <div style="width: 20%;" class="realProgress"></div>
        </div>
        <button class="btn-big btn-blue next">Далее</button>
      </div>

      <?= Html::endForm(); ?>
    </div>
  </section>
</div>