<?php
class advcomment_Controller extends Controller {

    //Zum schnell Testen. Bei Veröffentlichung Entfernen.
   public function bar($imgid)
    {
        echo advcomment::avatar($imgid);
    }
    
    //Speichert eine neuen Kommentar
    public function save()
    {
        $db = Database::instance();
        echo ("1");
        //Empfangen des Formulars
        $imgid = $db->escape ($_POST['imgid']);
        $name = $db->escape  ($_POST['name']);
        $mail = $db->escape  ($_POST['mail']);
        $web = $db->escape ($_POST['web']);
        $comment = $db->escape ($_POST['comment']);
        $date = $datum = date("Y-m-d");
        echo ("1");
        //HTML Maskieren
        $name = advcomment::htmlmask($name);
        $web = advcomment::htmlmask($web);
        $comment = advcomment::htmlmask($comment);
        //Webseite Workaround
        if($web ==""){
            $web="NULL";
        }
        //Generieren des Activation Key
        $ackey = uniqid('schlei',true);
        //Kommentar in Datenbank schreiben
        $db->query("INSERT INTO {advcomments} (`id` ,`imgid` ,`Nick` ,`Mail` ,`Web` ,`Text` ,`date` ,`stat`, `ackey`)
        VALUES (NULL , '$imgid', '$name', '$mail', '$web' , '$comment', '$date', '0', '$ackey'
        );;");
        
    }
    
 }
 ?>