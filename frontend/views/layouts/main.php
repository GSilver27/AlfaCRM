<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\helpers\Url;

$user = \common\models\User::findOne(Yii::$app->getUser()->getId());
$js = <<< JS
localStorage.setItem('user_id', $user->crm_id);
localStorage.setItem('username', '$user->username');
localStorage.setItem('is_student', $user->is_student);
$('.support_show').on('click', function(){
  $('.supportChat').fadeIn(300);
});
$('.supportHeader_close').on('click', function(){
  $('.supportChat').fadeOut(300);
});
JS;
$this->registerJs($js);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body>
  <?php $this->beginBody() ?>
  <div class="wrapper">
    <?php if (
      Yii::$app->controller->action->id !== 'login'
      && Yii::$app->controller->action->id !== 'signup'
    ) : ?>
      <header class='header'>
        <div class="container">
          <div class="header_body">
            <a class="header_logo" href="<?= Url::to(['/']) ?>">
              <img src="<?= Url::to(['img/logo.svg']) ?>" alt="Логотип">
            </a>
            <div class="header_nav-block nav_block">
              <div class="nav_block-body">
                <a href="<?= Url::to(['site/logout']) ?>" class="nav_lesson-last">2 урока</a>
                <img class="connect" src="<?= Url::to(['img/partmane.svg']) ?>" alt="Кошелек">
              </div>
              <div class="header_name connect" data-entity='customer' data-type='index' data-data[id]='<?= $user->crm_id ?>' data-data[name]='<?= $user->username ?>' data-get=''>
                <?= $user->username ?>
              </div>
            </div>
          </div>
        </div>
      </header>
    <?php endif; ?>

    <main class="main">
      <?php print_r($userInfo) ?>
      <?= $content ?>
      <div class="support">
        <button type="button" class="support_show">
          <img src="<?= Url::to(['img/icons/support.webp']) ?>" alt="">
        </button>
        <div class="supportChat">
          <div class="supportHeader">
            <p class="supportHeader_text">Поддержка</p>
            <button type="button" class="supportHeader_close">&times;</button>
          </div>
          <div class="supportBody">
            <div class="supportHelper">
              <div class="supportHelper_icon">П</div>
              <div class="supportHelper_text">Ответим на вопросы по платформе, прохождению курса и сориентируем, куда обращаться в других случаях. </div>
            </div>
            <div class="supportUser">
              <div class="supportUser_text">Ответим на вопросы по платформе, прохождению курса и сориентируем, куда обращаться в других случаях. </div>
              <div class="supportUser_icon">П</div>
            </div>
            <div class="supportUser">
              <div class="supportUser_text">Ответим на вопросы по платформе, прохождению курса и сориентируем, куда обращаться в других случаях. </div>
              <div class="supportUser_icon">П</div>
            </div>
            <div class="supportUser">
              <div class="supportUser_text">Ответим на вопросы по платформе, прохождению курса и сориентируем, куда обращаться в других случаях. </div>
              <div class="supportUser_icon">П</div>
            </div>
            <div class="supportUser">
              <div class="supportUser_text">Ответим на вопросы по платформе, прохождению курса и сориентируем, куда обращаться в других случаях. </div>
              <div class="supportUser_icon">П</div>
            </div>
            <div class="supportUser">
              <div class="supportUser_text">Ответим на вопросы по платформе, прохождению курса и сориентируем, куда обращаться в других случаях. </div>
              <div class="supportUser_icon">П</div>
            </div>
          </div>
          <div class="supportFooter">
            <form class="supportForm" action="">
              <label>
                <input type="file" name="file" id="">
                <svg width="26" height="28" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.972" fill-rule="evenodd" clip-rule="evenodd" d="M19.2027 0C19.6883 0 20.1738 0 20.6594 0C23.1644 0.506699 24.648 2.03795 25.1103 4.59375C25.2648 6.02766 24.9231 7.32195 24.0852 8.47656C19.9041 12.7877 15.6869 17.0625 11.4339 21.3008C9.8431 22.2957 8.33249 22.1863 6.90205 20.9727C5.78128 19.6734 5.59246 18.2424 6.33557 16.6797C6.46144 16.4974 6.58736 16.3151 6.71322 16.1328C8.70038 14.1185 10.6876 12.1041 12.6747 10.0898C13.2913 9.71277 13.8578 9.77654 14.3742 10.2812C14.6747 10.7442 14.6927 11.2182 14.4281 11.7031C12.4679 13.6901 10.5077 15.6771 8.54754 17.6641C8.10498 18.2931 8.16789 18.8674 8.73636 19.3867C9.22979 19.6633 9.69733 19.6268 10.1391 19.2773C14.1044 15.2578 18.0698 11.2383 22.0351 7.21875C23.0942 5.79491 23.0313 4.41863 21.8463 3.08984C20.6499 2.16145 19.4271 2.12499 18.1777 2.98047C13.1843 8.00559 8.22982 13.0642 3.31435 18.1562C2.24209 19.6989 2.08024 21.3395 2.8288 23.0781C3.98469 25.0902 5.70214 25.9014 7.98106 25.5117C8.80429 25.2959 9.52361 24.8949 10.1391 24.3086C14.7608 19.5873 19.3825 14.8659 24.0043 10.1445C24.6627 9.69309 25.2651 9.75691 25.8116 10.3359C26.0634 10.7916 26.0634 11.2474 25.8116 11.7031C21.109 16.5065 16.4063 21.3099 11.7036 26.1133C10.5829 27.1553 9.27009 27.7842 7.76526 28C7.20779 28 6.65026 28 6.09279 28C2.78972 27.3954 0.784565 25.4266 0.0773295 22.0938C-0.218318 19.9008 0.339167 17.9685 1.74979 16.2969C6.68479 11.2398 11.6392 6.19943 16.6131 1.17578C17.3806 0.558754 18.2438 0.166827 19.2027 0Z" fill="#1D1E5F" />
                </svg>
              </label>
              <input class="chatInput" placeholder="Введите текст сообщения..." type="text">
              <button class="sendMessages"><img src="<?= Url::to(['img/icons/letter.webp']) ?>" alt=""></button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <?php if (
      Yii::$app->controller->action->id !== 'login'
      && Yii::$app->controller->action->id !== 'signup'
    ) : ?>
      <footer class="footer">
        <div class="container">
          <div class="footer_body">
            <div class="footer_nav">
              <div class="footer_link-logo">
                <a href="<?= Url::to(['/']) ?>" class="footer_logo">
                  <img class="footer_logo-img" src="<?= Url::to(['img/logo.svg']) ?>" alt="Логотип">
                </a>
                <div class="footer_social">
                  <a href="<?= Url::to('#') ?>">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_32_48)">
                        <path opacity="0.991" fill-rule="evenodd" clip-rule="evenodd" d="M13.6816 -0.0292969C14.5605 -0.0292969 15.4395 -0.0292969 16.3184 -0.0292969C21.5709 0.608666 25.526 3.20633 28.1836 7.76367C29.1618 9.60768 29.7575 11.5608 29.9707 13.623C29.9707 14.502 29.9707 15.3809 29.9707 16.2598C29.2392 22.1371 26.1923 26.3266 20.8301 28.8281C19.3545 29.4314 17.831 29.8123 16.2598 29.9707C15.3809 29.9707 14.502 29.9707 13.623 29.9707C7.64262 29.1929 3.43364 26.0483 0.996094 20.5371C0.470561 19.1676 0.128764 17.7613 -0.0292969 16.3184C-0.0292969 15.4199 -0.0292969 14.5215 -0.0292969 13.623C0.545331 8.68605 2.90861 4.8677 7.06055 2.16797C9.10676 0.935766 11.3138 0.203344 13.6816 -0.0292969ZM23.2324 7.70508C24.0352 7.65803 24.3769 8.02916 24.2578 8.81836C23.2839 13.1606 22.2878 17.4966 21.2695 21.8262C20.869 22.2803 20.41 22.3487 19.8926 22.0312C18.4392 21.0564 16.9939 20.0701 15.5566 19.0723C14.7861 19.7744 14.0244 20.4873 13.2715 21.2109C12.6103 21.576 12.1708 21.3905 11.9531 20.6543C11.4486 19.1505 10.9505 17.6466 10.459 16.1426C8.97059 15.7607 7.48623 15.3603 6.00586 14.9414C5.67837 14.7978 5.57095 14.5537 5.68359 14.209C5.75196 14.1016 5.83985 14.0137 5.94727 13.9453C11.717 11.8692 17.4787 9.78914 23.2324 7.70508Z" fill="#5B5B5B" />
                        <path opacity="0.94" fill-rule="evenodd" clip-rule="evenodd" d="M20.7714 10.2246C21.0339 10.2479 21.112 10.3846 21.0058 10.6348C18.3117 12.8307 15.6262 15.0377 12.9492 17.2559C12.8234 18.1529 12.7062 19.0514 12.5976 19.9512C12.5384 20.0002 12.47 20.0197 12.3925 20.0098C12.0022 18.7315 11.5824 17.462 11.1328 16.2012C11.0885 16.0369 11.108 15.8807 11.1914 15.7324C14.3836 13.8875 17.577 12.0516 20.7714 10.2246Z" fill="#5B5B5B" />
                      </g>
                      <defs>
                        <clipPath id="clip0_32_48">
                          <rect width="30" height="30" fill="white" />
                        </clipPath>
                      </defs>
                    </svg>
                  </a>
                  <a href="<?= Url::to('#') ?>">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_32_53)">
                        <path opacity="0.989" fill-rule="evenodd" clip-rule="evenodd" d="M13.623 -0.0292969C14.5215 -0.0292969 15.4199 -0.0292969 16.3184 -0.0292969C21.5709 0.608666 25.526 3.20633 28.1836 7.76367C29.1618 9.60768 29.7575 11.5608 29.9707 13.623C29.9707 14.5215 29.9707 15.4199 29.9707 16.3184C29.3327 21.5709 26.7351 25.526 22.1777 28.1836C20.3337 29.1618 18.3806 29.7575 16.3184 29.9707C15.4199 29.9707 14.5215 29.9707 13.623 29.9707C8.37047 29.3327 4.4154 26.7351 1.75781 22.1777C0.779607 20.3337 0.183902 18.3806 -0.0292969 16.3184C-0.0292969 15.4199 -0.0292969 14.5215 -0.0292969 13.623C0.608643 8.37053 3.2063 4.41547 7.76367 1.75781C9.60768 0.779607 11.5608 0.183902 13.623 -0.0292969ZM12.1582 9.05273C13.4865 9.04295 14.8146 9.05273 16.1426 9.08203C16.4259 9.18861 16.5919 9.39369 16.6406 9.69727C16.6601 11.123 16.6797 12.5488 16.6992 13.9746C16.8894 14.8968 17.3191 15.0335 17.9883 14.3848C19.1216 12.9982 20.0005 11.4553 20.625 9.75586C20.777 9.54803 20.9821 9.44057 21.2402 9.43359C22.51 9.41525 23.7796 9.43477 25.0488 9.49219C25.3223 9.53127 25.4785 9.68748 25.5176 9.96094C25.251 10.852 24.8312 11.6626 24.2578 12.3926C23.56 13.3001 22.8763 14.2181 22.207 15.1465C21.9939 15.5527 22.0134 15.9434 22.2656 16.3184C22.8337 16.9061 23.4197 17.4725 24.0234 18.0176C24.3775 18.391 24.7095 18.7816 25.0195 19.1895C25.172 19.4359 25.3088 19.6898 25.4297 19.9512C25.5513 20.362 25.4243 20.6647 25.0488 20.8594C23.6982 20.9155 22.3506 20.896 21.0059 20.8008C20.6573 20.6852 20.3447 20.5094 20.0684 20.2734C19.4629 19.6289 18.8574 18.9844 18.252 18.3398C17.8383 18.039 17.4575 18.0683 17.1094 18.4277C16.9655 18.6639 16.8679 18.9178 16.8164 19.1895C16.7683 19.6211 16.7097 20.0508 16.6406 20.4785C16.5312 20.7141 16.3456 20.841 16.084 20.8594C13.1001 21.1201 10.688 20.0752 8.84766 17.7246C7.04947 15.2915 5.57487 12.6645 4.42383 9.84375C4.4613 9.65004 4.57849 9.53285 4.77539 9.49219C5.38175 9.4766 5.98723 9.4473 6.5918 9.4043C7.22174 9.43066 7.8467 9.47947 8.4668 9.55078C8.61328 9.61916 8.72068 9.72656 8.78906 9.87305C9.37494 11.299 10.0976 12.6467 10.957 13.916C11.2414 14.3376 11.6125 14.6501 12.0703 14.8535C12.3609 14.7973 12.5367 14.6215 12.5977 14.3262C12.8672 13.0567 12.8672 11.7872 12.5977 10.5176C12.3625 10.0431 11.9816 9.75984 11.4551 9.66797C11.6299 9.3852 11.8642 9.18012 12.1582 9.05273Z" fill="#5B5B5B" />
                      </g>
                      <defs>
                        <clipPath id="clip0_32_53">
                          <rect width="30" height="30" fill="white" />
                        </clipPath>
                      </defs>
                    </svg>
                  </a>
                </div>
              </div>
              <div class="footer_policy">
                <a class="footer_policy-link" href="<?= Url::to(['#']) ?>">Политика персональных данных</a>
                <a class="footer_policy-link" href="<?= Url::to(['#']) ?>">Пользовательское соглашение</a>
              </div>
            </div>
            <div class="footer_info">
              <a class="footer_info-link" href="<?= Url::to('tel:+79457956770') ?>">+7 945 795 67 70</a>
              <a class="footer_info-link" href="<?= Url::to('mailto:info@pythonica.ru') ?>">info@pythonica.ru</a>
              <a class="footer_info-link" href="<?= Url::to(['']) ?>">WhatsApp</a>
              <p class="footer_info-text">*отправляя формы на данном сайте, вы даете согласие на обработку персональных данных в соответствии с 152-ФЗ</p>
            </div>
          </div>
        </div>
      </footer>
    <?php endif; ?>
  </div>
  <div class="preloader">
    <div class="lds-default">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <p class="preloader_text">Загрузка, ожидайте</p>
    </div>
  </div>
  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
