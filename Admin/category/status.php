<?php
include '../config/config.php';
$obj = new init();
$id = $_GET['id'];
$status = $_GET['status']; 

//FIRST_CONDITION--->
if($id != '' && $status == '0')
{
    $values = ['category_status'=>'1'];
    $result = $obj->update('category',$values,'id = '.$id);
    if($result = TRUE)
    {         
        echo '<script type="text/javascript">';
        echo 'window.location.href="http://localhost/JEB/Admin/category/";';
        echo '</script>';
    }
}
//SECOND_CONDITION--->
elseif($id != '' && $status == '1')
{
    $values = ['category_status'=>'0'];
    $result = $obj->update('category',$values,'id = '.$id);
    if($result = TRUE)
    if($result = TRUE)
    {         
        echo '<script type="text/javascript">';
        echo 'window.location.href="http://localhost/JEB/Admin/category/";';
        echo '</script>';
    }
}
//THIRD_CONDITION--->
elseif($id != '' && $status == 'edit')
{   
$result =  $obj->get('*','category','id',$id);
foreach($result as $row)
{
?>
<?php include 'inc/header.php'; ?>
<section class="content">
<div class="body_scroll">
<!-- ===BLOCK-HEADER=== -->
<div class="block-header">
<div class="row">
<div class="col-lg-7 col-md-6 col-sm-12">

<!-- ===BREADCRUMB=== -->
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="../index.php"><i class="zmdi zmdi-home"></i> Home</a></li>
<li class="breadcrumb-item ">Category</li>
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
            <label>Category</label>
            <div class="input-group masked-input mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text">
            <i class="zmdi zmdi-hc-fw"></i>
            </span>
            </div>
            <input type="text" class="form-control text" value="<?=$row['category_name']?>" name="category" required>
            </div>
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
}
if(isset ( $_POST['btn'] ) )
    {
    $category = $_POST['category'];
    $values = ['category_name'=>$category,'category_status'=>'1'];
    $result = $obj->update('category',$values,'id = '.$id);
    if($result = TRUE){ header('location:list.php'); }
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
<li class="breadcrumb-item ">Category</li>
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
        $result = $obj->delete('category','id ='.$id);
        if($result = TRUE)
        {
            echo '<script type="text/javascript">';
            echo 'window.location.href="http://localhost/JEB/Admin/category/";';
            echo '</script>'; 
        }
    }
    elseif(isset ( $_POST['btn-cencel'] ) )
    {
        echo '<script type="text/javascript">';
        echo 'window.location.href="http://localhost/JEB/Admin/category/";';
        echo '</script>';
    }
}

?>
