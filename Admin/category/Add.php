<?php include 'inc/header.php'; include '../config/config.php';
if(isset($_POST['btn']))
{
    $category = $_POST['category'];
    if($category != '')
    {
        $obj = new init();
        $values = ['category_name'=>$category,'category_status'=>'1'];
        $result = $obj->add('category',$values);
        if($result = TRUE)
        {  
            if (!headers_sent()) 
            { 
                header('location:http://localhost/JEB/Admin/category/');
            } 
            elseif(headers_sent()) 
            {
            echo '<script type="text/javascript">';
            echo 'window.location.href="http://localhost/JEB/Admin/category/";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=http://localhost/JEB/Admin/category/" />';
            echo '</noscript>';
            }
        }
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
<li class="breadcrumb-item ">Category</li>
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
            <label>Category</label>
            <div class="input-group masked-input mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text">
            <i class="zmdi zmdi-hc-fw"></i>
            </span>
            </div>
            <input type="text" class="form-control text" placeholder="Ex: Category" name="category" required>
            </div>
            <input type="submit" value="Add" class="btn btn-success" name="btn">
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

<!-- =========AJAX========== -->

<script>
$('#btn').click(function(){
    var category = $('#category').val();
            alert(category);
});
</script>

<!-- =========/AJAX/========== -->