<?php  include 'dbconnect.php'  ?>
<?php
if(array_key_exists("submit_cat",$_POST)){

    $cat_title = $_POST['category-title'];
    $query2 = "INSERT INTO categories(title) VALUES ('$cat_title')";
    mysqli_query($mysqli,$query2);
    
}


?>


<?php include 'header.php' ?>


<div class="container">

<div class="col-2"></div>
</div>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
    <h2>Create a Category</h2>
<form id ="submit-article" class="flex-column" name="submit-category" method="post" enctype = "multipart/form-data">
    <label for="category-title">Category Title</label>
    <input type="text" id = "category-title" name="category-title">
    <input type="submit"  class="btn btn-primary submit" name="submit_cat" value="Submit_cat">
</form>
</div>
<div class="col-2"></div>
</div>

</div>

<?php  include 'footer.php'  ?>
</body>
</html>