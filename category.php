<?php include 'dbconnect.php'  ?>

<?php   

$category = $_GET['category'];
$sql = "SELECT * from articles 
        where category_id='$category'
        ORDER BY 1 DESC";  
$result = mysqli_query($mysqli,$sql);
?>

<?php include 'header.php'  ?>
<div class="container">
    <div class="row">

        <div class="col-lg-1"></div>
        <div class="col-lg-10 main">

<?php

    while($row = mysqli_fetch_array($result)){
        
        $id = $row['id'];
        $query = "SELECT * FROM articles as art INNER JOIN categories cat on cat.id=art.category_id WHERE art.id='$id'";
        $result2 = mysqli_query($mysqli,$query);
        $row2 = mysqli_fetch_array($result2);

?>

<div class='cont'>
    <a class="links" href="article.php?category=<?php echo $row2['title']."&id=".$row["id"]."&slug=".$row['slug'] ?>" >
         <img src=<?php echo "assets/".$row['image']?> alt="" style="width:350px;height:200px;">
        <h4><strong><?php echo $row[1]; ?></strong></h4>
    </a>

</div>

<?php  }?>

</div>
    <div class="col-lg-1"></div>
</div>
</div>

<?php  include 'footer.php'; ?>
<?php mysqli_close($mysqli);?>
</body>
</html>
