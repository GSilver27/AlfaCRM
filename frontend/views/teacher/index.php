<?php

use Codeception\Lib\Di;
use yii\helpers\Url;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */

$this->title = 'Мой кабинет';
?>

<main class="container">
    <div class="buttons">
        <div class="button-nav button-green">
            Реестр проведенных уроков
        </div>

        <div class="button-nav button-dark-blue">
            Выписка по зарплате
        </div>
    </div>

    <div class="teacher_main">
        <div class="teacher_main-info">
            <div class="teacher_photo">
                <div>
                    <img class="teacher_photo-img" src="<?= Url::to(['img/Ellipse 5.png']) ?>" alt="Фото учителя">
                </div>
                <div class="teacher_photo-change">
                    Сменить фото
                </div>
            </div>

            <div class="teacher_info">
                <div class="teacher_info-name">Марина Любимова</div>
                <div class="teacher_info-general">
                    <div class="teacher_age">17.09.1995</div>
                    <img class="gender-female" src="<?= Url::to(['img/icons/gender_female.webp']) ?>" alt="женщина">
                    <div class="teacher_gender">женщина</div>
                </div>
                <div class="teacher_info-divider"></div>
                <div class="teacher_info-email">
                    <img class="email-img" src="<?= Url::to(['img/icons/email.webp']) ?>" alt="email">
                    <a href="mailto:flexander.grid@gmail.com">flexander.grid@gmail.com</a>
                </div>
            </div>

            <div class="teacher_planning">
                <div class="teacher_planning-id">
                    ID <span>#20</span>
                </div>
                <div class="teacher_planning-lessons">
                    Уроки <span>0 штук</span>
                    <button class="teacher_planning-btn">Запланировать</button>
                </div>
            </div>
        </div>
        
        <div class="teacher_schedule">

        </div>

    </div>
</main>
