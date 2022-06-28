<?php
    include 'dbconnect.php';
    session_start();

    $row_id = $_GET['id'];
    $sql = "SELECT * FROM articles where id='$row_id' ORDER BY 1 DESC";
    $result = mysqli_query($mysqli,$sql);

?>

<?php include 'header.php'?>


<div class="container">
    <div class="row">

        <div class="col-lg-2"></div>
        <div class="col-lg-8">
    
    <?php  while($row = mysqli_fetch_array($result)){  
           
            $id = $row['id'];
            $query = "SELECT * FROM articles as art INNER JOIN categories cat on cat.id=art.category_id WHERE art.id='$id'";
            $result2 = mysqli_query($mysqli,$query);
            $row2 = mysqli_fetch_array($result2);
        ?>        
            <br>
            <h4><strong><?php echo $row['title']; ?></strong></h4>
            <h5><?php echo $row['subtitle']; ?></h5>
            <div class="clock_category">
            <img style="width:20px;height:20px;" src="assets/clock.jpg" alt="clock"><h6 class="date">&nbsp;&nbsp;<?php echo $row['date']?> |<span class="articles-category"><i>  <?php echo mb_strtoupper($row2['title']); ?></i></span></h6>
            </div>
            <br>
            <img src=<?php echo "assets/".$row['image']?> alt="" style="width:500px;height:350px;">
            <br><br>
            <p><?php echo $row['text']; ?></p>

    <?php 
            
        } ?>
  
</div>
    <div class="col-lg-2"></div>
</div>
</div>


<?php  include 'footer.php'; ?>
<?php mysqli_close($mysqli);?>
</body>
</html>


