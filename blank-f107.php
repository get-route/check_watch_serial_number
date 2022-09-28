<?php
require_once "./Admin/function.php";
require_once "./Admin/db-install.php";
require_once "./Admin/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <?php
    require_once 'header.php';
    ?>
    <meta name="description" content="Скачать оригинальный бланк описи вложения почты России в формате ворд или pdf. Посмотреть образец заполнения оригинального документа на практике.">
    <title>Опись вложения почта России бланк скачать</title>
</head>
<body>
<header class="header-post">
    <div class="container">
        <?php
        require_once 'navigate.php';
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="info-post">
                    <h1 class="post-header-title text-center">Бланк описи вложения Ф-107</h1>
                </div>

            </div>
        </div>
    </div>
</header>
<section class="content-section">
    <div class="container ">

            <div class="content-section-post col-lg-12">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-search-button text-center">
                            <a href="F107-obrazec.docx" class="btn serch-value-button" target="_blank">Пустой бланк WORD</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-search-button text-center">
                            <a href="F107-obrazec.pdf" class="btn serch-value-button" target="_blank">Пустой бланк PDF</a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-search-button text-center">
                            <a href="./" class="btn serch-value-button" target="_blank">Заполнить онлайн</a>
                        </div>
                    </div>
                <div class="col-lg-12">
                    <p>Использование описи вложения на почте России, является реальной возможность максимально обезопасить свою посылку или письмо. Бланк документа заполняется строго в соответствии с содержимым отправления, подтверждается сотрудником службы и проверяется непосредственно после получения.</p>
                    <blockquote>Это конечно не гарантирует, что отправленные Вами ценные вещи дойдут в целости, однако точно вселяет уверенность в то, что в случае форс-мажорных обстоятельств, Вы как клиент, с помощью формы 107 сможете доказать свою правоту.</blockquote>
                    <p>Далее мы подробнее изучим правила заполнения пустого бланка документа и постараемся максимально сжато рассказать о том, как нужно его предоставлять в отделение почты России.</p>

                    <h2>Правила заполнения пустого бланка описи вложения</h2>
                    <img class="mx-auto d-block rounded" src="images/blank-opis-vlojenia-f107.jpg" alt="Бланк описи вложения Ф-107 скачать ворд и пдф">
                    <p>Перед тем как начать, убедитесь, что Вы скачали правильный образец бланка Ф-107. Найти опись вложения можно у нас на сайте и загрузить себе на компьютер в формате WORD или PDF. Затем последовательно записываются следующие данные</p>

                    <ol class="bullet">
                        <li><u>ФИО</u> отправителя. Задаете данные того лица, которое обращается в службу доставки.</li>
                        <li>Заполняется информация о <u>наименовании</u>. В частности необходимо записать:
                            <ol class="bullet">
                                <li><u>Номер предмета.</u></li>
                                <li><u>Наименование</u>, например ложка, кружка, картина и т.д</li>
                                <li>Пишется <u>количество вложенных предметов</u> в посылку или письмо.</li>
                                <li>Указывается <u>ценность</u> в рублях.</li>
                                <li>Подводится <u>итог</u> количества и общей стоимости.</li>
                            </ol>
                        </li>
                    </ol>

                    <p>Остальные данные заполняются уже в почтовом отделении сотрудником. Опись предоставляется в 2х экземплярах. Первый остается у клиента, а второй укладывается непосредственно в отправление.</p>
                </div>
                <div class="col-lg-12 text-center">
                    <?php
                    require_once 'social.php';
                    require_once 'related-post.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
<?php
require_once 'footer.php';
?>

</html>
