<?php
include '../config/config.php';
$obj = new init();
$id = $_GET['id'];
$status = $_GET['status']; 

//FIRST_CONDITION--->
if($id != '' && $status == '0')
{
    $values = ['product_status'=>'1'];
    $result = $obj->update('product',$values,'id = '.$id);
    if($result = TRUE){ header('location:list.php'); }
}
//SECOND_CONDITION--->
elseif($id != '' && $status == '1')
{
    $values = ['product_status'=>'0'];
    $result = $obj->update('product',$values,'id = '.$id);
    if($result = TRUE){ header('location:list.php'); }
}
//THIRD_CONDITION--->
elseif($id != '' && $status == 'edit')
{ 
include 'inc/header.php';  
$result = $obj->get('*','product');
foreach($result as $row){
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
<li class="breadcrumb-item ">Update</li>
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
            <img src="<?php echo $row['product_img'] ?>" alt="IMG" id="output" width="100%" style="cursor: pointer;">
            </label>
            <input type="file" name="img" id="upload_img" onchange="loadfile(event)" style="display: none;">
            <input type="text" class="form-control text mb-2" name="product" required value="<?=$row['product_name']?>">
            <input type="text" class="form-control text mb-2" name="desc" required value="<?=$row['product_description']?>">
            <input type="number" class="form-control text mb-2"name="price" required value="<?=$row['price']?>">
            <input type="hidden" class="form-control text mb-2"name="status" required value="1">
            <select name="category" class="form-control text mb-2">
            <?php 
            $result = $obj->get('*','category','id ='.$row['category_id']);
            foreach($result as $secondrow)
            {
            ?>
            <option value="<?=$secondrow['id']?>"><?=$secondrow['category_name']?></option>
            <?php
            } 
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
<?php include 'inc/footer.php' ?>
<?php    
    if(isset ( $_POST['btn'] ) )
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
        $result = $obj->update('product',$values,'id = '.$id);
        if($result = TRUE)
        {
            header('location:list.php');
        }
    }
}
}
//FOURTH_CONDITION--->
elseif($id != '' && $status == 'delete')
{ 
include 'inc/header.php';  
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
<li class="breadcrumb-item ">Delete</li>
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
            <div class="alert alert-danger"><strong>Sure!</strong> want to delete???.</div>
            <input type="submit" value="Delete" class="btn btn-danger" name="btn">
            <input type="submit" value="Cencel" class="btn btn-success" name="btn-cencel">
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
<?php include 'inc/footer.php' ?>
<?php    
    if(isset ( $_POST['btn'] ) )
    {
    $obj->delete('product','id ='.$id);
    if($result = TRUE){ header('location:list.php'); }
    }
    elseif(isset ( $_POST['btn-cencel'] ) )
    {
        header('location:list.php');
    }
}
?>
