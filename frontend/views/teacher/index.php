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
        <div>
            <div class="teacher_info">
                <div>
                    <img class="teacher_photo" src="<?= Url::to(['img/Ellipse 5.png']) ?>" alt="Фото учителя">
                </div>
                <div class="teacher_photo-change">
                    Сменить фото
                </div>
            </div>

        </div>
        
        <div class="">

        </div>
    </div>
</main>
