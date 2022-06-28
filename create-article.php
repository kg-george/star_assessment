<?php  include 'dbconnect.php';
        session_start();
        date_default_timezone_set("Europe/Athens");
        $query = "SELECT * FROM categories";
        $res = mysqli_query($mysqli,$query);

        $error = "";
        
        function mynl2br($text) { 
            return strtr($text, array("\r\n" => '<br />', "\r" => '<br />', "\n" => '<br />')); 
         } 

        function createSlug($text, string $divider = '-')
        {
          $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
          $text = preg_replace('~[^-\w]+~', '', $text);
          $text = trim($text, $divider);
          $text = preg_replace('~-+~', $divider, $text);
          $text = strtolower($text);
        
          if (empty($text)) {
            return 'n-a';
          }
        
          return $text;
        }

        function getSlug() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
          
            for ($i = 0; $i < 10; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }
          
            return $randomString;
        }
        
        if(array_key_exists("submit",$_POST)){

            if(!$_POST['title']){
                $error .= "Title is required<br>";
            }

            if($_POST['category']=="--"){
                $error .= 'Category is required<br>';
            }


            if(!$_POST['slug']){
                $slug = getSlug();
            }else{
                $slug = createSlug($_POST['slug']);
            }


            if(!$_POST['sub-title']){
                $error .= "Sub-title is required<br>";
            }
            if(!$_POST['text']){
                $error .= "Text is required<br>";
            }

            if($error == ""){

                $file = $_FILES['image']['name'];
                
                $title = $_POST['title'];
                $subtitle = $_POST['sub-title'];
                //$date = date("Y-m-d h:i:sa");
                $text = mynl2br($_POST['text']);
                $category = $_POST['category'];
                $category_title = "SELECT * from categories where title='$category'";
                $cat_red = mysqli_fetch_array(mysqli_query($mysqli,$category_title));
                $cat_id = $cat_red['id'];
                $date_hour = "SELECT NOW()+3";
                $sql_date = mysqli_query($mysqli,$date_hour);
                $date = mysqli_fetch_array($sql_date);


                $sql = "INSERT INTO articles (title,subtitle,slug,text,date,category_id,image) VALUES ('$title','$subtitle','$slug','$text','$date[0]','$cat_id','$file')";
                $result = mysqli_query($mysqli,$sql);

                $target = "assets/".$file;

                move_uploaded_file($_FILES['image']['tmp_name'], $target);
 
            }
            

        }


        
?>

<?php include 'header.php';?>
<div class="container">
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
    <h2>Create an Article</h2>
    <?php  if($error != ""):  ?>
    <div class="alert alert-danger" role="alert"> <?php echo $error; ?> <br> </div>
    <?php endif; ?>
<form id ="submit-article" class="flex-column" name="submit-article" method="post" enctype = "multipart/form-data">
    <label for="title">Title</label>
    <input type="text" id = "title" name="title">
    <label for="sub-title">Sub-Title</label>
    <input type="text" id = "sub-title" name="sub-title">
    <label for="slug">Slug</label>
    <small>Greek letters won't count</small>
    <input type="text"  id = "slug" name="slug">
    
    <label for="file">Upload an image</label>
    <input type="file" name="image" value="" />
    <label for="category">Category</label>
    <select class="category" name="category">
      <option selected="selected">--</option>
        <?php while($row2 = mysqli_fetch_array($res)){ 
        ?>

        <option  value=<?php echo $row2['title']?> name=<?php echo $row2['title']?>><?php echo $row2['title']?></option>

      <?php }?>
    </select>
    <label for="text">Article content </label>
    <textarea rows="10" id = "text" name="text"></textarea>
    <input type="submit"  class="btn btn-primary submit" name="submit" value="Submit">
</form>
</div>
<div class="col-2"></div>
</div>

</div>

<script>

    
</script>

<?php  include 'footer.php'; ?>
<?php mysqli_close($mysqli);?>
</body>
</html>