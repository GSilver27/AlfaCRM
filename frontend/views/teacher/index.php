<?php

use Codeception\Lib\Di;
use yii\helpers\Url;
use yii\web\JqueryAsset;

/** @var yii\web\View $this */

$this->title = 'Мой кабинет';
?>

<div class="teacher-wrapper container">

<!--<aside>-->
<!--   <nav> -->
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

    <div class="popup-add-lesson__container">
        <form action="">
            <div class="popup__header">
                <span>Добавить урок</span>
                <svg class="popup_close" width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.978" fill-rule="evenodd" clip-rule="evenodd" d="M0.879883 -0.0166016C1.02376 -0.0166016 1.16764 -0.0166016 1.31152 -0.0166016C1.48911 0.0374408 1.65512 0.120449 1.80957 0.232422C4.0291 2.45748 6.25371 4.67656 8.4834 6.88965C10.7131 4.67656 12.9377 2.45748 15.1572 0.232422C15.3117 0.120449 15.4777 0.0374408 15.6553 -0.0166016C15.7991 -0.0166016 15.943 -0.0166016 16.0869 -0.0166016C16.5332 0.101308 16.832 0.378001 16.9834 0.813477C16.9834 1.00163 16.9834 1.18978 16.9834 1.37793C16.9277 1.54456 16.8447 1.6995 16.7344 1.84277C14.5153 4.06184 12.2962 6.28094 10.0771 8.5C12.3073 10.7302 14.5374 12.9603 16.7676 15.1904C16.8586 15.3281 16.9305 15.472 16.9834 15.6221C16.9834 15.8102 16.9834 15.9984 16.9834 16.1865C16.8416 16.5608 16.587 16.8264 16.2197 16.9834C15.9984 16.9834 15.777 16.9834 15.5557 16.9834C15.4041 16.9185 15.2602 16.8355 15.124 16.7344C12.9156 14.5204 10.702 12.3124 8.4834 10.1104C6.26477 12.3124 4.05125 14.5204 1.84277 16.7344C1.70658 16.8355 1.56271 16.9185 1.41113 16.9834C1.18978 16.9834 0.968426 16.9834 0.74707 16.9834C0.379777 16.8264 0.125221 16.5608 -0.0166016 16.1865C-0.0166016 15.9984 -0.0166016 15.8102 -0.0166016 15.6221C0.0363003 15.472 0.108241 15.3281 0.199219 15.1904C2.42936 12.9603 4.65949 10.7302 6.88965 8.5C4.67058 6.28094 2.4515 4.06184 0.232422 1.84277C0.122128 1.6995 0.0391206 1.54456 -0.0166016 1.37793C-0.0166016 1.18978 -0.0166016 1.00163 -0.0166016 0.813477C0.134776 0.378001 0.433603 0.101308 0.879883 -0.0166016Z" fill="#494949"/>
                </svg>
            </div>
            <div class="popup__body">
                <div class="popup__row">
                    <div class="row__subject">Дата</div>
                    <div class="row__info"><span class="font-weight-bold">01.07.2022</span></div>
                </div>
                <div class="popup__row">
                    <div class="row__subject">Время</div>
                    <div class="row__info">
                        <span class="font-weight-bold">с</span> <input class="row__info-time" name="time" type="text" value="12:00">
                        <span class="mins">мин</span> <span class="mins-num">90</span> <span class="color-main">До 13:30</span>
                    </div>
                </div>
                <div class="popup__row">
                    <div class="row__subject">Аудитория</div>
                    <div class="row__info">
                        <select class="row__info-audience" name="audience" id="">
                            <option value="none">не задана</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <div class="popup__row">
                    <div class="row__subject">Группа</div>
                    <div class="row__info">
                        <input class="row__info-group" name="group" type="text" placeholder="Добавьте одну или несколько">
                    </div>
                </div>
                <div class="popup__row">
                    <div class="row__subject">Предмет</div>
                    <div class="row__info">
                        <select class="row__info-subject" name="subject">
                            <option value="none">не задан</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <div class="popup__row">
                    <div class="row__subject">Педагог(и)</div>
                    <div class="row__info">
                        <input class="row__info-teacher" name="teacher" type="text" placeholder="Добавьте одну или несколько">
                    </div>
                </div>
                <div class="popup__row">
                    <div class="row__subject">Комментарий</div>
                    <div class="row__info">
                        <textarea class="row__info-comment" name="comment" rows="2" cols="30" placeholder="Например, задержится на несколько минут"></textarea>
                    </div>
                </div>
                <div class="popup__row">
                    <div class="row__subject">URL стрима</div>
                    <div class="row__info">
                        <input class="row__info-url" name="url" type="url" placeholder="Ссылка">
                    </div>
                </div>
                <div class="popup__row">
                    <div class="row__subject">Тип урока</div>
                    <div class="row__info">
                        <select class="row__info-type" name="type">
                            <option value="Individual">Индивидуальный</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>

                <div class="popup_btns">
                    <button class="popup-btn_save">
                        <svg width="13" height="11" viewBox="0 0 13 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.987" fill-rule="evenodd" clip-rule="evenodd" d="M11.1146 0.592756C11.345 0.585109 11.5599 0.638822 11.7592 0.753889C12.0179 0.973615 12.2572 1.21288 12.4769 1.47166C12.6402 1.79917 12.65 2.13119 12.5062 2.46776C10.0021 5.00114 7.4875 7.52554 4.96229 10.041C4.72791 10.1777 4.49354 10.1777 4.25917 10.041C2.98393 8.77555 1.71929 7.50114 0.46522 6.21776C0.32146 5.88119 0.331225 5.54917 0.494517 5.22166C0.714243 4.96288 0.953502 4.72362 1.21229 4.50389C1.58955 4.28495 1.96065 4.29471 2.32557 4.53319C3.07753 5.28515 3.82947 6.03708 4.58143 6.78905C4.60097 6.80859 4.62048 6.80859 4.64002 6.78905C6.64197 4.7871 8.64394 2.78513 10.6459 0.783185C10.7943 0.6932 10.9506 0.629722 11.1146 0.592756Z" fill="white"/>
                        </svg>
                        Сохранить
                    </button>
                    <button class="popup-btn_cancel">
                        <img src="<?= Url::to(['img/icons/cancel.webp']) ?>" alt="">
                        Отмена
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>

</div>
