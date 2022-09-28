<?php
header("Last-Modified: " . date("D, d M Y H:i:s", time()) . " GMT");
require_once "./Admin/function.php";
require_once "./Admin/db-install.php";
require_once "./Admin/db.php";
$urls=$_SERVER['REQUEST_URI'];
$url=explode("/",$urls);
routing_urls();
foreach ($route as $item) {
    $str_kat =$item['kat'] ;
    $str_pos = "/" . $url[1] . "/" . $item['post'];
    if ($urls === "/") {
    }
    elseif ($urls === "/" . $str_kat) {
        include_once 'category.php';
        exit();
    } elseif ($urls === $str_pos) {
        include_once 'post.php';
        exit();
    } elseif ($urls === "/sitemap.xml") {
        include_once 'sitemap.php';
        exit();}
}
if (($urls !=="/")) {
    http_response_code(404);
    include_once '404.php';
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Проверка подлинности часов известных брендов по серийному номеру. Расшифровка срока изготовления и оригинальности.">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo INDEX;?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo INDEX;?>/css/style.css">
    <link rel="icon" href="<?php echo INDEX;?>/favicon.png" type="image/png">
    <title>All-Watch - проверка часов по серийному номеру онлайн</title>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8745570220712762"
     crossorigin="anonymous"></script>
</head>
<body>
<header>

    <div class="header">
        <div class="container">
            <?php
            require_once 'navigate.php';
            ?>
            <div class="col-lg-12">
                <h1 id="code" class="form-search-header text-center">Сканирование подлинности и срока годности часов</h1>
                <p class="form-search-paragraph text-center">"Выберите интересующий Вас бренд. Укажите сведения  и получите результат"</p>
            </div>

            <div class="row">
                <noindex>
                <div class="col-lg-12 text-center ">

                    <div class="collapse show" id="collapseExample">
                        <div class="row">
                            <?php on_post();
                            foreach ($on_posts as $table_posts) {
                                ?>
                                <div class="col-lg-4">
                                    <a class="index-link-img" href="<?php echo INDEX."/".$table_posts['category_id']."/".$table_posts['url']?>"><img class="index-cat-img" src="images/<?php echo $table_posts['img_brands']?>" >
                                        <p class="button-parfume"><?php echo $table_posts['brands_site']?></p>
                                    </a>
                                </div>
                            <?php }?>
                            <div class="col-lg-12 text-center">
                                <a class="button-index" href="<?php echo INDEX;?>/brands" target="_blanc">Показать все...</a>
                            </div>
                        </div>
                    </div>
                </div>
                </noindex>
            </div>
        </div>
    </div>
</header>

<section class="info-watch">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2>Чем занимается сервис All-Watch</h2>
            </div>
            <div class="col-lg-4">
                <p class="info-watch-text">Позволяет узнать год выпуска часов изветных марок</p>
                <p class="info-watch-text">Дает информацию о меделе и механизме</p>
                <p class="info-watch-text">Предварительно определяет подлинность по серийному номеру</p>
            </div>
            <div class="col-lg-4">
                <img src="<?php echo INDEX?>/favicon.png" alt="что такое сервис All-Watch?">
            </div>
            <div class="col-lg-4">
                <p class="info-watch-text">Раскрывает советы по выбору оригинального товара </p>
                <p class="info-watch-text">Предоставляет сведения о возрасте рассматриваемого изделия</p>
                <p class="info-watch-text">Уменьшает риск покупки контрофакта</p>
            </div>
        </div>
    </div>
</section>
<section class="instructions">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Инструкция по проверке</h2>
            </div>
            <div class="col-lg-6 sliders text-center">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                            <div class="container"></div>
                            <img src="<?php echo  INDEX?>/images/keys/intructions-slide1.jpg" class="d-block w-100" alt="выбеор бренда часов для проверки">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo  INDEX?>/images/keys/intructions-slide2.jpg" class="d-block w-100" alt="поиск номера серийного идентификатора бренда">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo  INDEX?>/images/keys/intructions-slide3.jpg" class="d-block w-100" alt="вписывание серийника в форму поиска и расшифровки">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo  INDEX?>/images/keys/intructions-slide4.jpg" class="d-block w-100" alt="данные расшифровки">
                            <div class="carousel-caption d-none d-md-block">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Предыдущий</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Следующий</span>
                    </a>
                </div>

            </div>
            <div class="col-lg-6">
                <ol class="indexol">
                    <li>Находите интересующую Вас модель на сайте</li>
                    <li>Узнаете, как определить ее серийный номер по инструкции на фото</li>
                    <li>Вписываете идентификационные данные в поле формы</li>
                    <li>Получаете данные года выпуска и предполоительные сведения о подлинности.</li>

                </ol>
            </div>
        </div>
    </div>
</section>
<section class="help-servises">
    <div class="row">
        <div class=""
    </div>
</section>
<section class="info-section">
    <div class="container">
        <div class="col-lg-12">
            <h3 id="faq" class="text-center">Вопросы:</h3>
        </div>

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <div class="accordion" id="accordionExample1">

                        <h4 class="lg-0">
                            <button class="btn btn-link text-center buton-info" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Что такое серийный номер?
                            </button>
                        </h4>

                        <h4 class="lg-0">
                            <button class="btn btn-link collapsed buton-info" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Какие данные можно узнать при проверке?
                            </button>
                        </h4>
                        <h4 class="lg-0">
                            <button class="btn btn-link collapsed buton-info" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Гарантирует ли он оригинальность?
                            </button>
                        </h4>
                        <h4 class="lg-0">
                            <button class="btn btn-link collapsed buton-info" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Как обезопасить себя перед покупкой часов?
                            </button>
                        </h4>
                        <h4 class="lg-0">
                            <button class="btn btn-link collapsed buton-info" type="button" data-toggle="collapse"
                                    data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Если номер не указан. Что делать?
                            </button>
                        </h4>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="accordion" id="accordionExample">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section">Это специальный идентификационный набор букв и цифр, составленных в определенной последовательности. Для каждого производителя и отдельно взятой модели часов, может быть свой набор кодов.

                                </p>
                            </div>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section">В серийную последовательность заносится та информация, которую изготовитель посчитает нужным внести. В одном случае это может быть только модель, серия и уникальный ключ, а вдругом полный список механизмов, вид циферблата и т.д. 
                                </p>
                            </div>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section">К сожалению на 100% нет. Учитывая, что данные расшифровки берутся из открытых источников, их порой предоставляет сам производитель, у подделки также может быть нанесен на первый взгляд подлинный серийник. Однако контрафакт зачастую выдают детали. Например неаккуратность нанесения или высота букв и цифр. Об этом мы также дополнительно сообщаем.
                                </p>
                            </div>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section"> Для каждой конкретной марки есть свои рекомендации. О них мы также говорим. Для отдельно взятого бренда могут быть мелкие критерии, которые не учитываются мошенниками. Сюда можно отнести качество сборки, запас хода, внешние характеристики. Некоторые из них можно увидеть невооруженным взглядом, предупредив от бесполезной траты денег.
                                </p>
                            </div>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                             data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="paragraph-section">В большинстве брендов, коды наносят на обратной стороне или внутри ПО устройства. Однако есть модели, для которых цифро-буквенное обозначение штампуется внутри механизма. В этом случае приходится смотреть в паспорт или идти к часовому мастеру.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="post-section">
    <div class="container">
        <div class="col-lg-12">
            <h2 id="param" class="text-center">Отзывы</h2>
        </div>
        <div class="row">
            <div class="col-lg-6 review">
                <div id="carouselExampleFade1" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active rewiew_blok">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="rewiev-text">"Я фанат часов. Есть большинство современные марок Casio, однако имеется и коллекционные. Последние приходится покупать с рук и поделаных в Китае, сделанных под винтажные, очень много. Поэтому сервис очень помогает оперативно все проверить."</p>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <p>Иван А</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item rewiew_blok">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="rewiev-text">"Очень удобный сайт, собраны все модели. Просто выбирай бренд часовой и смотри по нему информацию. Очень много старых часов, по которым просто так период выпуска не узнаешь, а идти к часовому мастеру не представляется возможным."</p>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <p>Петр П</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item  rewiew_blok">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="rewiev-text">"Первый раз наткнулся на all-watch, когда покупал отцу часы. У него были Омега и он их потерял на рыбалке. Думал приятное сделать и нашел такие же на сайте объявлений. К счастью почитал информацию о них и серийник забил, оказались какой-то китайской подделкой. Хорошо, что не купил."</p>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <p>Михаил З</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item  rewiew_blok">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="rewiev-text">"Мне сервис помог наглого мастера распознать. Я перед приходом в мастерскую, проверяла часы мужа по серийному номеру. Потом когда от часовщика с ремонта их забирала, то опять указала номер. Оказалось, что в мастерской нам подменили механизм на более дешевый. Доказала все в итоге через суд."</p>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <p>Анна М</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                <img src="<?php echo INDEX;?>/images/watchok.png" class="lupe">
                <img src="<?php echo INDEX;?>/images/watches.png" class="people">
            </div>
        </div>
    </div>
</section>
</body>
<script>
    $("#carouselExampleFade1").carousel({
        interval : 10000
    });
</script>
<?php
require_once 'footer.php';
?>
</html>