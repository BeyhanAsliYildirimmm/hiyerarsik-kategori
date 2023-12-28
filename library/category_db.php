<?php 
//require_once --> fonk. bi kere yükler

require_once "db.php";

if(isset($_POST["title"]) && isset($_POST["parent_id"]))
{
    //query() --> sql inceltion açığı ortaya çıkar


    $prepare = $db->prepare("INSERT INTO category SET title= :title, parent_id = :parent_id");

    $data= array(
    "title" => $_POST['title'],
    "parent_id" => $_POST['parent_id']
    );

    $insert = $prepare->execute($data);
    if($insert){
        header("Location:../index.php");
    }else{
        echo "Ekleme Sırasında bir problem oluştu !";
    }
}
else{
    echo "Aradığınız sayfa bulunamadı";
}
?>