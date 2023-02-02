<?php include 'inc/header.php'; include '../config/config.php'; $obj = new init();
if(isset($_POST['btn']))
{

    $product = $_POST['product'];
    $desc = $_POST['desc'];
    //$img = $_POST['img'];
    $img = rand(1000, 9999) . basename($_FILES['img']['name']);
    $path = "productimgs/";
    move_uploaded_file($_FILES['img']['tmp_name'], $path . $img);
    $price = $_POST['price'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $values = ['product_name'=>$product,'product_description'=>$desc,'product_img'=>$img,'price'=>$price,'product_status'=>$status,'category_id'=>$category];
    $result = $obj->add('product',$values);
    if($result = TRUE)
    {
        header('location:list.php');
    }
}




?>
<section class="content">
<div class="body_scroll">
<!-- ===BLOCK-HEADER=== -->
<div class="block-header">
<div class="row">
<div class="col-lg-7 col-md-6 col-sm-12">

<!-- ===BREADCRUMB=== -->
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="../index.php"><i class="zmdi zmdi-home"></i> Home</a></li>
<li class="breadcrumb-item ">Product</li>
<li class="breadcrumb-item ">Add</li>
</ul>
<!-- ===/BREADCRUMB/=== -->


<button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
</div>

</div>
</div>
<!-- ===/BLOCK-HEADER/=== -->
<div class="container-fluid">
<div class="row clearfix">
<div class="col-lg-12">
<div class="card">

    <!-- ===BODY=== -->
    <div class="body">
        <div class="col-lg-12 col-md-12">
            <form method="post">
            <label>Product</label>
            <br>
            <label for="upload_img">
            <img src="https://static.thenounproject.com/png/5191452-200.png" alt="IMG" id="output" width="100%" style="cursor: pointer;">
            </label>
            <input type="file" name="img" id="upload_img" onchange="loadfile(event)" style="display: none;">
            <input type="text" class="form-control text mb-2" placeholder="Ex: Product" name="product" required>
            <input type="text" class="form-control text mb-2" placeholder="Ex: Description" name="desc" required>
            <input type="number" class="form-control text mb-2" placeholder="Ex: price" name="price" required>
            <input type="hidden" class="form-control text mb-2" placeholder="Ex: Product" name="status" required value="1">
            <select name="category" class="form-control text mb-2">
            <?php 
                  $result =  $obj->get('*','category');
                  foreach($result as $row)
                  { ?>
                  
                    <option value="<?=$row['id']?>" ><?=$row['category_name']?></option>
                <?php }
                ?>                
            </select>
            <input type="submit" value="Add Category" class="btn btn-success" name="btn">
            </form>
        </div>
    </div>
    <!-- ===/BODY/=== -->

</div>
</div>
</div>
</div>
</div>
</section>
<script>
    function loadfile(event){
    var img = document.getElementById('output');
    img.src = URL.createObjectURL(event.target.files[0]);
    console.log(img);
  };
    
</script>
<?php include 'inc/footer.php' ?>