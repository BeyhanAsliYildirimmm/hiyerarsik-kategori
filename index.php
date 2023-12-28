<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori /Alt Kategori İşlemleri</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">

</head>
<body>

<?php
  /************************************************************/ 
  
 require_once "library/db.php";
 require_once "library/functions.php";

 $category_list = $db->query("SELECT * FROM category", PDO::FETCH_OBJ)->fetchAll();


 //PDO::FETCH_OBJ--> dataları obje olarak alır
//PDO::FETCH_ASSOC --> Dataları array olarak alır data erişim --> <?php echo $category["title"];

 /************************************************************ */

?>

    <div class="container ">
        <h3 class="text-center">Kategori /Alt Kategori İşlemleri</h3>
       <div class="row">
         <div class="col-md-6 well">
            <h4 class="text-center">Kategori Ekleme</h4>
            <hr>
            <form action="library/category_db.php" method="post">
                <div class="form-group">
                    <label>Kategori Adı</label>
                    <input type="text" class="form-control" name="title" />
                </div>
                <div class="form-group">
                    <label>Varsa Üst Kategori</label>
                   <select name="parent_id" class="form-control">
                    <option selected value="0" > Yok </option>
                    <?php foreach ($category_list as $category)  {?>
                         <option  value=<?php echo $category->id; ?> ><?php echo $category->title; ?></option>
                         
                         <?php } ?>
                   </select> 
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Kaydet</button>
                <button type="submit" class="btn btn-danger btn-sm">İptal</button>

            </form>
         </div>
         <div class="col-md-6">
            <div class="col-md-11 well"></div>
            <h4 class="text-center">Kategori Hiyerarşisi </h4>
            <hr>

           <?php drawElement( buildTree($category_list)) ?>
          
         </div>
       </div>
    </div>
</body>
</html>