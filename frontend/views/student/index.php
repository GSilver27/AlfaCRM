<?php

use Codeception\Lib\Di;
use yii\helpers\Url;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */

$this->title = 'Мой кабинет';
$this->registerJsFile(Url::to('js/index.js'), ['depends' => JqueryAsset::class, 'type' => 'module']);
?>
<div class="container">
  <?php print_r($lessons) ?>
  <section class="Group_Section">
    <div>
      <div class="lessons_status-block">
        <div class="lessons_status-balls">
          <img class="lessons_status-img" src="<?= Url::to(['img/icons/star.webp']) ?>" alt="">
          <p class="lessons_status-text"><?= $user->balls ?> баллов</p>
        </div>
        <div class="lessons_position-block">
          <img class="lessons_position-img" src="<?= Url::to(['img/icons/lamp.webp']) ?>" alt="">
          <p class="lessons_position-text"><?= $user->stage_status ?></p>
        </div>
      </div>
    </div>
    <div class="group_block">
      <div class="mainInfo_block">
        <div class="mainInfo_user">
          <div class="mainInfo_user-avatar">
            <img class="mainInfo_user-avatar-img" src="<?= Url::to(['img/Ellipse 5.png']) ?>" alt="">
          </div>
          <div class="mainInfo_user-text">
            <p class="mainInfo_user-text-position">Учитель:</p>
            <p class="mainInfo_user-text-fio">Марина Любимова</p>
          </div>
        </div>
        <div class="mainInfo_lessons">
          <div class="lesson_info">
            <p class="lesson_info-title">Властелин игр и программ в Scratch</p>
            <p class="lesson_info-subtitle">Scratch — лучший способ открыть для ребенка программирование. Увлекательно, динамично, в игре!</p>
          </div>
          <div class="lesson_info-lessons">
            <p class="lesson_info-text">Войти на урок:</p>
            <div class="lesson_info-block">
              <div class="date-tab date-tab-done">07.07.2022</div>
              <div class="date-tab">10.07.2022</div>
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
        </div>
        <p class="cardCourse-title"><?= $subjects[$random[0]]['name'] ?></p>
        <div class="cadrCourse_footer">
          <p class="cadrCourse_footer-text"></p>
          <img class="cadrCourse_footer-img" src="<?= Url::to(['img/course/gamepad.webp']) ?>" alt="">
        </div>
      </div>
      <div class="moreCourse_item items_card-course blue_course">
        <div class="cardCourse_header">
          <p class="cardCourse_header-text">Курс</p>
          <!-- <div class="cardCourse_header-length">
            12 недель
          </div> -->
        </div>
        <p class="cardCourse-title"><?= $subjects[$random[1]]['name'] ?></p>
        <div class="cadrCourse_footer">
          <p class="cadrCourse_footer-text"></p>
          <img class="cadrCourse_footer-img" src="<?= Url::to(['img/course/kubik.webp']) ?>" alt="">
        </div>
      </div>
      <div class="moreCourse_item items_card-White">
        <p class="card_text">ПРИГЛАСИ ДРУГА — получи 2 бонусных недели! А друг получит 1 неделю!</p>
        <img src="<?= Url::to(['img/course/man.webp']) ?>" alt="">
      </div>
      <div class="moreCourse_item items_card-rating">
        <div class="cardRating_header">
          <img class="cardRating_header-img" src="<?= Url::to(['img/icons/cup.webp']) ?>" alt="">
          <p class="cardRating_header-text">ТОП - 20 учеников</p>
        </div>
        <div class="carfRating_list">
          <div class="carfRating_item">
            <p class="carfRating_item-text">
              <span>1.</span>
              <span>Александр Алексашка Иванов</span>
            </p>
            <p class="carfRating_item-balls">
              180 баллов
            </p>
          </div>
          <div class="carfRating_item">
            <p class="carfRating_item-text">
              <span>2.</span>
              <span>Иван Иванов</span>
            </p>
            <p class="carfRating_item-balls">
              180 баллов
            </p>
          </div>
          <div class="carfRating_item">
            <p class="carfRating_item-text">
              <span>3.</span>
              <span>Иван Иванов</span>
            </p>
            <p class="carfRating_item-balls">
              180 баллов
            </p>
          </div>
          <div class="carfRating_item">
            <p class="carfRating_item-text">
              <span>4.</span>
              <span>Иван Иванов</span>
            </p>
            <p class="carfRating_item-balls">
              180 баллов
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>