<?php
header("Last-Modified: " . date("D, d M Y H:i:s", time()) . " GMT");
require_once './Admin/db-install.php';
require_once './Admin/db.php';
require_once "./Admin/function.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$urls=$_SERVER['REQUEST_URI'];
require_once './header.php';
$url=explode("/",$urls);
$id=$url[2];
$public_comment=good_param($_POST['comment-on']);
$comment_name=good_param($_POST['name-comment']);
$comment_text=good_param($_POST['text-comment']);
$comment_email=good_param($_POST['name-email']);
//Функция обрезки строки по параметрам
$batch_form=good_param($_POST['batch-name']);
$batch_form=strtoupper($batch_form);

post_info();
foreach ($posty as $info_post)
{


?>
    <meta name="description" content="<?php echo $info_post['description']?>">
    <title><?php echo $info_post['title']?></title>
</head>
<body>
<header class="header-post">
    <div class="container">
        <?php
        require_once 'navigate.php';
        ?>
        <div class="row">
            <div class="col-lg-12">
                    <h1 class="post-header-title text-center"><?php echo $info_post['h1']?></h1>
            </div>
        </div>
    </div>
</header>
<section class="content-section">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb content-section-text">
                        <li class="breadcrumb-item"><a href="<?php echo INDEX;?>">Главная</a></li>
                        <li class="breadcrumb-item"><a href="/<?php echo $info_post['category_id']?>"><?php echo $info_post['category_title']?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $info_post['title']?></li>
                    </ol>
                </nav>
            </div>
            <?php if (function_exists($info_post['brands'])==TRUE) {
            $info_post['brands']();?>

            <div class="col-lg-12 text-center">
                <form class="batch-form" action="" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="batch-group">
                                <?php if ((!isset($_POST['batch-name']))&&(isset($_POST['batch-search']))){ echo "Форма не заполнена";}?>
                                <input class="form-control batch-name" name="batch-name" type="text" placeholder="Задайте серийный номер часов" required>
                            </div>
                            <div class="col-lg-12 text-right">
                                <noindex><a class="what-code" href="<?php echo INDEX."/"."images"."/".$info_post['what_img'];?>" target="_blank">как найти номер?..</a></noindex>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="batch-search-button">
                                <button type="submit" name="batch-search" class="btn batch-search">Проверить</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            <?php }?>
			<div class="col-lg-12 text-center"> 
			</div>
            <div class="content-section-post col-lg-12">
                <?php if (!empty($batch_form)){?>
                <div class="col-lg-12">
                    <table class="batch-info-table w-100 justify-content-center">
                        <tr>
                            <th>Ваш серийный номер:</th>
                            <td> <?php echo $batch_form;?></td>
                        </tr>
                        <tr>

                        <tr>
                            <th>Год производства:</th>
                            <td> <?php if (!empty($year)) {
                                    echo $year;
                                } else echo "Ошибка! Неправильный формат кода...";
                                ?></td>
                        </tr>
                        <tr>
                            <th>Месяц производства:</th>
                            <td> <?php if (!empty($month)){
                                    echo $month;
                                }else echo "Ошибка! Неправильный формат кода...";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Модель:</th>
                            <?php if (empty($models)){?>
                            <td> <?php echo $info_post['years']?></td>
                            <?php } else { ?><td> <?php echo $models?></td><?php }?>                        </tr>
                        <tr>
                            <th>Прошло с выпуска :</th>
                            <td><?php if (!empty ($day)){
                                echo $day ?>
                            </td><?php } else echo "NoN";?>
                        </tr>
                        <tr>
                            <th>Подлинность : </th>
                            <td><?php if (!empty($year && $month)){
                                echo "УСТАНОВЛЕНА";
                                }else echo "НЕ УСТАНОВЛЕНА";?></td>
                        </tr>
                    </table>
                    <?php require_once 'social.php';?>
                    <div class="col-lg-12 ancor">
                        <p class="text-center">Не смогли просканировать номер ?.. <a class="ancor-comment" href="<?php INDEX?>/<?php echo $info_post['category_id']?>/<?php echo $info_post['url']?>#comment"> Оставьте</a> заявку! Мы поможем все проверить.</p>
                    </div>
                </div><?php }?>

                <div class="col-lg-12">
                    <p class="text-justify">
                        <?php echo $info_post['text'];?>
                    </p>
                </div>
            <div class="col-lg-12 text-center">
                <?php
                require_once 'social.php';
                require_once 'related-post.php';
                ?>
                <h3 id="comment">Комментарии:</h3>
                <hr class="hr-line">
            </div>
                <?php
                comments_good();
                foreach ($goodkom as $items)
                {
                ?>
                                    <div class="row">

                        <div class="col-lg-3 text-center">
                            <h4><?php echo $items['avtor']?></h4>
                            <p><?php echo date("d.m.y",strtotime($items['date'])); ?></p>
                            <img class="img-comment" src="<?php echo INDEX;?>/images/autor.png">

                        </div>
                        <div class="col-lg-9 ">
                            <p><?php echo $items['text']?></p>
                        </div>
                    </div>
            <hr class="hr-line">
                <?php
                }
                ?>
                <div class="col-lg-12 text-center">
                <form method="post" name="comments-form" class="comment-form">
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">*Имя</label>
                        <input type="text" name="name-comment" class="form-control" id="exampleFormControlInput1" placeholder="Введите имя:" required>
                    </div>
                    <div class="form-group ">
                        <label for="exampleFormControlInput1">*Email</label>
                        <input type="text" name="name-email" class="form-control" id="exampleFormControlInput1" placeholder="Введите email:" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">*Ваше сообщение</label>
                        <textarea class="form-control" name="text-comment" id="exampleFormControlTextarea1" rows="3" placeholder="Расскажите подробнее о проблеме или обращении..." required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="comment-on" class="btn btn-primary comment-start">
                    </div>
                </form>
                    <?php

                    if (($public_comment==true)&&(filter_var($comment_email, FILTER_VALIDATE_EMAIL) !== false))
                    {   post_comment();
                        echo "*Ваш комментарий отправлен на модерацию. После проверки он появится на сайте";
                    }else echo "Заполните все необходимые(*) поля и нажмите Отправить"
                    ?>
            </div>
            </div>

        </div>
    </div>
</section> <?php }?>
<script async src="https://flowpubdom.info/j/60a6383c9d322faa2ed02247"></script> 
</body>
<?php
require_once 'footer.php';
?>

</html>
