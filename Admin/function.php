<?php
require_once 'db-install.php';
require_once 'db.php';
//Выводит посты в зависимости от категории
function db_post()
{
    global $dbh;
    global $id;
    global $post;
    $post=$dbh->prepare("SELECT * FROM post WHERE category_id=:id AND public='yes'");
    $post->execute(array('id'=>$id));
    return $post;
}
//Выводит инфу о основной информации внутри поста
function post_info()
{
    global $dbh;
    global $id;
    global $posty;
    $posty=$dbh->prepare("SELECT * FROM post WHERE url=:id");
    $posty->execute(array('id'=>$id));
    return $posty;
}
//Список категорий и их урлы в меню

function db_cat()
{
    $zapros = "SELECT * FROM category ";
    global $dbh;
    global $cat;
    $cat = $dbh->query($zapros);
    return $cat;
}
//Выводит информацию на странице категории
function category_info()
{
    global $dbh;
    global $cat;
    global $urls;
    $id=$urls;
    $id=htmlspecialchars($id);
    $id=urldecode($id);
    $id=trim($id);
    $cat = $dbh->prepare("SELECT * FROM category WHERE url=:id");
    $cat->execute(array('id'=>$id));
    return $cat;
}
//Функция поиска
function search_post()
{
    global $dbh;
    global $search;
    global $search_name;
    global $num_res;
    $search=$dbh->prepare("SELECT * FROM post WHERE MATCH (text) AGAINST (? IN BOOLEAN MODE)");
    $search->execute (array($search_name));
    $num_res=$search->rowCount();
    return $search;
}
//Функция отправки комментария
function post_comment ()
{
    global $dbh;
    global $komment;
    global $id;
    global $comment_text;
    global $comment_name;
    global $comment_email;
    $komment=$dbh->prepare("INSERT INTO comments SET avtor=?,text=?,id_post=?,Email=?")->execute([$comment_name,$comment_text,$id,$comment_email]);
    return $komment;
}
//Отправка поста в БД
function public_post_bd()
{
    global $dbh;
    global $public_bd;
    global $text_post;
    global $brands_post;
    global $year_post;
    global $title_post;
    global $description_post;
    global $h1_post;
    global $url_post;
    global $cat_inf;
    global $name_img;
    global $alt_img;
    global $img_brands;
    global $what_img;
    global $youtube_id;
    global $brands_site;
    $public_bdata="INSERT INTO post (text,url,title,description,h1,category_id,category_title,image_alt,image,brands,years,img_brands,what_img,youtube_id,brands_site) VALUES (:text,:url,:title,:description,:h1,:category_id,:category_title,:image_alt,:image,:brands,:years,:img_brands,:what_img,:youtube_id,:brands_site)";
    $public_based=[':text'=>$text_post,':url'=>$url_post,':title'=>$title_post,':description'=>$description_post,'h1'=>$h1_post,'category_id'=>$cat_inf[0],'category_title'=>$cat_inf[1],'image_alt'=>$alt_img,'image'=>$name_img,'brands'=>$brands_post,'years'=>$year_post,'img_brands'=>$img_brands,'what_img'=>$what_img,'youtube_id'=>$youtube_id,'brands_site'=>$brands_site];
    $public_bd=$dbh->prepare($public_bdata)->execute($public_based);
}
//Функция для безопасности гет и пост запросов
function good_param($proverka)
{
    $proverka=htmlspecialchars($proverka);
    $proverka=urldecode($proverka);
    $proverka=trim($proverka);
    $proverka=stripcslashes($proverka);
    return $proverka;
}
//Функция вывода списка одобренных комментариев
function comments_good()
{
    global $dbh;
    global $goodkom;
    global $id;
    $goodkom=$dbh->prepare("SELECT * FROM comments WHERE id_post=:id AND public='yes'");
    $goodkom->execute(array('id'=>$id));
    return $goodkom;
}
//Функция получения значения логин-пароль
function in_admin ()
{
    global $dbh;
    global $passlog;
    $passlog=$dbh->query("SELECT * FROM admin");
    return $passlog;
}
//Получаем все комментарии
function more_comment()
{
    global $dbh;
    global $table_comments;
    $use_comment="SELECT * FROM comments";
    $table_comments=$dbh->query($use_comment);
    return $table_comments;
}
//Удаление комментария
function delete_comment()
{
    global $dbh;
    global $delcomment;
    global $delkom;
    $delcomment=$dbh->prepare("DELETE FROM comments WHERE id=?");
    $delcomment->execute([$delkom]);
    return $delkom;
}
//одобрение комментариев
function public_comment()
{
    global $dbh;
    global $public_comments;
    global $publcom;
    $publcom = good_param($_GET['public']);
    $publ='yes';
    $public_comment="UPDATE comments SET public=? WHERE id=?";
    $public_comments=$dbh->prepare($public_comment);
    $public_comments->execute([$publ,$publcom]);
    return $public_comments;
}
//одобрение поста
function public_post()
{
    global $dbh;
    global $public_post;
    global $publpost;
    $publpost = good_param($_GET['publicpost']);
    $publk='yes';
    $public_posts="UPDATE post SET public=? WHERE id=?";
    $public_post=$dbh->prepare($public_posts);
    $public_post->execute([$publk,$publpost]);
    return $public_post;
}
//Все статьи
function more_post()
{
    global $dbh;
    global $table_posts;
    $use_post="SELECT * FROM post ORDER BY brands";
    $table_posts=$dbh->query($use_post);
    return $table_posts;
}

//Бренды на главной
function on_post()
{
    global $dbh;
    global $on_posts;
    $use_post="SELECT * FROM post WHERE public='yes' AND brands IN ('Apple', 'Samsung','Casio','Seiko','Rolex','Tissot') ORDER BY brands";
    $on_posts=$dbh->query($use_post);
    return $on_posts;
}
//Случайные статьи в футере
function footer_post(){
    global $index_two_posts;
    two_index_post();
    foreach ($index_two_posts as $footers){
    echo "<ol><li>";
        echo "<a href=".INDEX."/".$footers['category_id']."/".$footers['url'].">".$footers['title']."</a>";
        echo "</li></ol>";
    }
}
//Удаление поста
function delete_post()
{
    global $dbh;
    global $delposts;
    global $delpost;
    $delposts=$dbh->prepare("DELETE FROM post WHERE id=?");
    $delposts->execute([$delpost]);
    return $delposts;
}

//Получение постов на главной
function two_index_post()
{
    global $dbh;
    global $index_two_posts;
    $use_post="SELECT * FROM `post` WHERE public='yes' ORDER BY RAND() LIMIT 3 ";
    $index_two_posts=$dbh->query($use_post);
    return $index_two_posts;
}
//последние записи
function related_index_post()
{
    global $dbh;
    global $related_posts;
    $use_post="SELECT * FROM `post` WHERE public='yes' ORDER BY RAND() LIMIT 6";
    $related_posts=$dbh->query($use_post);
    return $related_posts;
}
//Бренды на категории
function on_post_cat()
{
    global $dbh;
    global $on_posts;
    $use_post="SELECT * FROM post WHERE public='yes' ORDER BY brands_site";
    $on_posts=$dbh->query($use_post);
    return $on_posts;
}
//Каталог статей в Алфавитном порядке с буквами
function alphabet(){
    global $on_posts;
    global $unic_simbols;
    global $simbols_post;
    on_post_cat();
    foreach ($on_posts as $item) {
        //Обрезаем название бренда по первой букве.
        $simbols_post = substr($item['brands_site'], 0, 1);
        //Если заголовок буквы алфавита уже есть, то не печатаем его
        //Выводим списком посты, согласно алфавита.
        if ($simbols_post !== $unic_simbols){
            $unic_simbols = $simbols_post;
            ?>
            <div class="col-lg-12 text-center">
            <h2 class="text-center header-alphabet"><?php echo $simbols_post; ?></h2>
            </div><?php } ?>
        <ol class="alphabet-ul">
            <li><h3>
                    <a href="/<?php echo $item ['category_id'] ?>/<?php echo $item ['url'] ?>"
                       class="card-title"><?php echo $item ['brands_site'] ?></a>
                </h3></li>
        </ol>
    <?php }

}
//Все статьи для sitemap
function more_post_sitemap()
{
    global $dbh;
    global $table_posts;
    $use_post="SELECT * FROM post WHERE public='yes'";
    $table_posts=$dbh->query($use_post);
    return $table_posts;
}
//Создаем массивы для функции роутинга
function routing_urls(){
    global $table_posts;
    global $cat;
    global $post_url;
    global $cat_url;
    global $url_kat;
    global $url_post;
    global $route;
    more_post();
    foreach ($table_posts as $post_url){
        $url_post[]=array("post"=>$post_url['url']);
    }
    db_cat();
    foreach ($cat as $cat_url){
        $url_kat[]=array("kat"=>$cat_url['url']);
    }
    $route=array_merge($url_kat,$url_post);
}

function Apple()
{
    global $batch_form;
    global $year;
    global $month;
    global $day;
    global $models;
    $url="https://serial-number-decoder.co.uk/apple-serial-number/apple-serial.php/?sn=$batch_form";
    $headers = @get_headers($url);
    $ok_header=$headers[0];
if (!preg_match("/[а-я]/i", $batch_form)&&($ok_header=="HTTP/1.1 200 OK")){
    $apple=file_get_contents($url);
    $apples=(htmlspecialchars($apple));
    preg_match_all('#.+specresult.+#m',$apples,$matches);
    $strs=strval(htmlspecialchars_decode($matches[0][0]));
//модель производства.
    preg_match_all('#\s[A-Z].+\)#m',$strs,$marka);
//Дата изготовлеия
    preg_match_all('#\w+\s\d+\s\w+\s\d\d\d\d#m',$strs,$srok_godnosti);

    $models=strval($marka[0][0]);
    $start_prodact=strval($srok_godnosti[0][0]);
    $year="(Неделя/Год )".$start_prodact;
    $month="Точный месяц установить невозможно";
    preg_match_all('#\d\d\d\d#m',$srok_godnosti[0][0],$year_start);
    $one_year = date('Y');
    if ($year_start[0][0]!==$one_year) {
        $day = $one_year-$year_start[0][0]." Лет";
    }else{
        echo "Прошло менее года";
    }

}else echo "Смените раскладку клавиатуры и уточните Ваш номер";
}


?>