<?php

use Codeception\Lib\Di;
use yii\helpers\Url;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */

$this->title = 'Мой кабинет';
?>

<div class="teacher-wrapper container">

<!--<aside>-->
<!--   <nav>
<!--        <div class="nav-btn nav-btn_active"><a href="#">Мой профиль</a></div>-->
<!--        <div class="nav-btn"><a href="#">Уроки</a></div>-->
<!--        <div class="nav-btn"><a href="#">Задачи</a></div>-->
<!--        <div class="nav-btn"><a href="#">Клиенты</a></div>-->
<!--        <div class="nav-btn"><a href="#">Группы</a></div>-->
<!--        <div class="nav-btn"><a href="#">Информер</a></div>-->
<!--        <div class="nav-btn"><a href="#">Чат</a></div>-->
<!--    </nav>-->
<!--    <img src="--><?//= Url::to(['img/aside-bar.png']) ?><!--" alt="">-->
<!--</aside>-->

<main class="container">
    <div class="buttons">
        <button class="teacher-btn button-green">
            Реестр проведенных уроков
        </button>

        <button class="teacher-btn button-dark-blue">
            Выписка по зарплате
        </button>
    </div>

    <div class="teacher__main">
        <div class="teacher_main-info">
            <div class="teacher__photo">
                <div>
                    <img class="teacher__photo-img" src="<?= Url::to(['img/Ellipse 5.png']) ?>" alt="Фото учителя">
                </div>
                <div class="teacher__photo-change">
                    Сменить фото
                </div>
            </div>

            <div class="teacher__info">
                <div class="teacher__info-name">Марина Любимова</div>
                <div class="teacher__info-general">
                    <div class="teacher__age">17.09.1995</div>
                    <img class="gender-female" src="<?= Url::to(['img/icons/gender_female.webp']) ?>" alt="женщина">
                    <div class="teacher__gender">женщина</div>
                </div>
                <div class="teacher__info-divider"></div>
                <div class="teacher__info-email">
                    <img class="email-img" src="<?= Url::to(['img/icons/email.webp']) ?>" alt="email">
                    <a href="mailto:flexander.grid@gmail.com">flexander.grid@gmail.com</a>
                </div>
            </div>

            <div class="teacher__planning">
                <div class="teacher__planning-id">
                    ID <span>#20</span>
                </div>
                <div class="teacher__planning-lessons">
                    <div>Уроки <span>0 штук</span></div>
                    <button class="teacher__planning-btn">Запланировать</button>
                </div>
            </div>
        </div>
        
        <div class="teacher__schedule">
            <div class="teacher__schedule-text">Расписание на ближайшие 7 дней</div>
            <div class="schedule">
                <div class="schedule-row">
                    <div class="schedule-row-inner">
                        <div class="schedule-row__date">
                            <div class="schedule-row__date-day">Понедельник</div>
                            <div>18.07.2022</div>
                        </div>
                        <div class="schedule-row__time">
                            11:00 — 12:30
                        </div>
                        <div class="schedule-row__name">
                            Тест группа №2 (2/2)
                        </div>
                        <div class="schedule-row__duration">
                            90 минут
                        </div>
                        <div class="schedule-row__type">
                            <img src="<?= Url::to(['img/icons/pin.webp']) ?>" alt="">
                            постоянный
                        </div>
                    </div>
                </div>

                <div class="schedule-row">
                    <div class="schedule-row-inner">
                        <div class="schedule-row__date">
                            <div class="schedule-row__date-day">Среда</div>
                            <div>20.07.2022</div>
                        </div>
                        <div class="schedule-row__time">
                            17:00 — 18:30
                        </div>
                        <div class="schedule-row__name">
                            Тест лид_имя ребенка, тест Иван
                        </div>
                        <div class="schedule-row__duration">
                            90 минут
                        </div>
                        <div class="schedule-row__type">
                            <img src="<?= Url::to(['img/icons/one-time.webp']) ?>" alt="">
                            разовый
                        </div>
                    </div>
                </div>

                <div class="schedule-row">
                    <div class="schedule-row-inner">
                        <div class="schedule-row__date">
                            <div class="schedule-row__date-day">Четверг</div>
                            <div>21.07.2022</div>
                        </div>
                        <div class="schedule-row__time">
                            16:00 — 17:30
                        </div>
                        <div class="schedule-row__name">
                            Тест группа №2 (2/2)
                        </div>
                        <div class="schedule-row__duration">
                            90 минут
                        </div>
                        <div class="schedule-row__type">
                            <img src="<?= Url::to(['img/icons/pin.webp']) ?>" alt="">
                            постоянный
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

</div>
