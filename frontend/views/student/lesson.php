<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Страница урока';
$this->registerCssFile(Url::to(['css/student/lesson.css']), ['depends' => ['frontend\assets\AppAsset']]);
?>
<div class="container">
  <section class="lessonInfo">
    <div class="lessonBlock">
      <a class="quizBody-back" href="<?= Url::to(['index']) ?>">
        <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.971" fill-rule="evenodd" clip-rule="evenodd" d="M7.37162 0.0140805C8.10905 -0.0726677 8.52601 0.241417 8.62256 0.956329C8.62497 1.15376 8.57284 1.33638 8.46619 1.50415C6.76103 3.17684 5.0559 4.84948 3.35074 6.52217C8.96509 6.53676 14.5794 6.5514 20.1938 6.56599C20.9332 6.79691 21.164 7.27167 20.8863 7.99032C20.7287 8.24679 20.4979 8.40018 20.1938 8.45049C14.5794 8.46508 8.96509 8.47972 3.35074 8.49432C5.04098 10.1524 6.73127 11.8105 8.42152 13.4685C8.71964 13.9931 8.63775 14.4532 8.1758 14.849C7.78014 15.064 7.39297 15.0494 7.01421 14.8052C4.74317 12.5774 2.4721 10.3496 0.201044 8.1218C-0.0670147 7.71278 -0.0670147 7.30371 0.201044 6.89468C2.4721 4.6669 4.74317 2.43908 7.01421 0.211295C7.13032 0.132629 7.24947 0.0668903 7.37162 0.0140805Z" fill="#5B5B5B" />
        </svg>
        Назад
      </a>
      <div>
        <div class="lessonCard">
          <div class="mainInfo_user">
            <div class="mainInfo_user-avatar">
              <img class="mainInfo_user-avatar-img" src="<?= Url::to(['img/Ellipse 5.png']) ?>" alt="">
            </div>
            <div class="mainInfo_user-text">
              <p class="mainInfo_user-text-position">Учитель:</p>
              <p class="mainInfo_user-text-fio">Марина Любимова</p>
            </div>
          </div>
          <div>
            <div class="lessons_status-block">
              <div class="lessons_status-balls">
                <img class="lessons_status-img" src="<?= Url::to(['img/icons/star.webp']) ?>" alt="">
                <p class="lessons_status-text">45 баллов</p>
              </div>
            </div>
            <div class="lesson_info">
              <p class="lesson_info-title">Властелин игр и программ в Scratch</p>
            </div>
            <div class="lesson_info-lessons">
              <div class="date-tab date-tab-done">07.07.2022</div>
            </div>
            <div class="btnGroup">
              <button class="btn-big btn-green">
                <img src="<?= Url::to(['img/icons/book.webp']) ?>" alt="">
                <p>Войти на урок</p>
              </button>
              <button class="btn-big btn-white">
                <img src="<?= Url::to(['img/icons/video.webp']) ?>" alt="">
                <p>Запись урока</p>
              </button>
              <button class="btn-big btn-orange">
                <img src="<?= Url::to(['img/icons/test.webp']) ?>" alt="">
                <p>Тест</p>
              </button>
            </div>
          </div>
        </div>
        <div class="homeWork">
          <p class="homeWork_title">Домашнее задание:</p>
          <div class="homeWork_block">
            <div class="homeWork_list">
              <div class="homeWork_item">
                <p class="homeWork_item-title">1.Запрограммировать котика</p>
                <p class="homeWork_item-description">Запрограммируйте котика за 5 шагов. Для этого Вам понадобиться....</p>
              </div>
              <div class="homeWork_item">
                <p class="homeWork_item-title">1.Запрограммировать котика</p>
                <p class="homeWork_item-description">Запрограммируйте котика за 5 шагов. Для этого Вам понадобиться....</p>
              </div>
            </div>
            <div>
              <?= Html::beginForm('', 'post', ['class' => 'sendLink']) ?>
              <input require placeholder="Введите ссылку" type="url">
              <button class="btn-small btn-green">Отправить ссылку на проект</button>
              <?= Html::endForm(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="moreCourse">
      <div class="moreCourse_item items_card-White">
        <p class="card_text">Посмотри, что создали другие ребята! Ты тоже так сможешь и даже лучше!</p>
        <img src="<?= Url::to(['img/course/girl.webp']) ?>" alt="">
      </div>
      <div class="moreCourse_item items_card-course">
        <div class="cardCourse_header">
          <p class="cardCourse_header-text">Курс</p>
          <div class="cardCourse_header-length">
            12 недель
          </div>
        </div>
        <p class="cardCourse-title">Мастер программирования Minecraft</p>
        <div class="cadrCourse_footer">
          <p class="cadrCourse_footer-text">8 - 12 лет</p>
          <img class="cadrCourse_footer-img" src="<?= Url::to(['img/course/gamepad.webp']) ?>" alt="">
        </div>
      </div>
      <div class="moreCourse_item items_card-White">
        <p class="card_text">Посмотри, что создали другие ребята! Ты тоже так сможешь и даже лучше!</p>
        <img src="<?= Url::to(['img/course/ufo.webp']) ?>" alt="">
      </div>
      <div class="moreCourse_item items_card-course blue_course">
        <div class="cardCourse_header">
          <p class="cardCourse_header-text">Курс</p>
          <div class="cardCourse_header-length">
            12 недель
          </div>
        </div>
        <p class="cardCourse-title">3D моделирование в Tinkercad</p>
        <div class="cadrCourse_footer">
          <p class="cadrCourse_footer-text">9 - 14 лет</p>
          <img class="cadrCourse_footer-img" src="<?= Url::to(['img/course/kubik.webp']) ?>" alt="">
        </div>
      </div>
      <div class="moreCourse_item items_card-White">
        <p class="card_text">ПРИГЛАСИ ДРУГА — получи 2 бонусных недели! А друг получит 1 неделю!</p>
        <img src="<?= Url::to(['img/course/man.webp']) ?>" alt="">
      </div>
      <div class="moreCourse_item items_card-course red_course">
        <div class="cardCourse_header">
          <p class="cardCourse_header-text">Курс</p>
          <div class="cardCourse_header-length">
            12 недель
          </div>
        </div>
        <p class="cardCourse-title">Создание игр в Roblox Studio</p>
        <div class="cadrCourse_footer">
          <p class="cadrCourse_footer-text">9 - 14 лет</p>
          <img class="cadrCourse_footer-img" src="<?= Url::to(['img/course/pazle.webp']) ?>" alt="">
        </div>
      </div>
    </div>
  </section>
</div>