<?php  include 'dbconnect.php';
        
        session_start();

        $sql = "SELECT * FROM articles ORDER BY 1 DESC";
        $result = mysqli_query($mysqli,$sql);
        $counter = 0; 

        $sql2 = "SELECT * FROM categories";
        $res = mysqli_query($mysqli,$sql2);
        
        if(array_key_exists("choose_cat",$_GET)){

            header("Location:category.php?category=".$_GET['category']);
        }


?>
<?php include 'header.php'?>


<div class="container">
    <div class="row">

    <div class="col-lg-2">
    
    <form method="GET" style="margin-top: 40px;">
    <label for="category">Search a category</label>
        <select class="category" name="category" >
            <option selected="selected">--</option>
            <?php   while($categories = mysqli_fetch_array($res)){
               
        ?>
            <option  value=<?php echo $categories['id']?> name="category"><?php echo $categories['title']?></option>


        <?php   } ?>

        </select>  
        <input type="submit" name="choose_cat" class="btn btn-dark submit" value="Submit_cat">
    </form>
    </div>
          
        <div class="col-lg-10 main">
    
    <?php  while($row = mysqli_fetch_array($result)){  
            if($counter == 5) return;

            $counter++; 
            $id = $row['id'];
            $query = "  SELECT * FROM articles as art 
                        INNER JOIN categories cat on cat.id=art.category_id 
                        WHERE art.id='$id'";
            $result2 = mysqli_query($mysqli,$query);
            $row2 = mysqli_fetch_array($result2);
        ?>
            
            <div class='cont'>
                <a class="links" href="article.php?category=<?php echo $row2['title']."&id=".$row['id']."&slug=".$row['slug'] ?>" >
                    <img src=<?php echo "assets/".$row['image']?> alt="" style="width:350px;height:200px;">
                    <h4><strong><?php echo $row['title']; ?></strong></h4>
                </a>
                <a  style="text-decoration:none;color:#A49FFD" href="category.php?category=<?php echo $row2['id'];?>" ><span> <?php echo mb_strtoupper($row2['title']);   ?> </span> </a>
            </div>
            
           
    <?php  } ?>
  
</div>
<?php include 'footer.php'; ?>
</div>
</div>



<?php mysqli_close($mysqli);?>
</body>
</html>