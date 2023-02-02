<?php include 'inc/header.php'; include '../config/config.php'; $obj = new init(); ?>
<section class="content">
<div class="body_scroll">
<!-- ===BLOCK-HEADER=== -->
<div class="block-header">
<div class="row">
<div class="col-lg-7 col-md-6 col-sm-12">

<!-- ===BREADCRUMB=== -->
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="../index.php"><i class="zmdi zmdi-home"></i> Home</a></li>
<li class="breadcrumb-item ">product</li>
<li class="breadcrumb-item ">List</li>
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
    <table class="table table-borderd">
        <thead>
            <th>#</th>
            <th>Img</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Status</th>
            <th>Category</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $result = $obj->get('*','product');
            foreach($result as $row){
            ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['product_img']?></td>
                <td><?=$row['product_name']?></td>
                <td><?=$row['product_description']?></td>
                <td><?=$row['price']?></td>
                <td><?=$row['category_id']?></td>
                <td><?php
                if($row['product_status'] == '1'){ ?>
                <a href="status.php?id=<?php echo $row['id']?>&status=<?php echo $row['product_status']?> "   class="btn btn-info">Click To Active</a>
                <?php }else{?>
                <a href="status.php?id=<?php echo $row['id']?>&status=<?php echo $row['product_status']?> "   class="btn btn-danger">Click To Unactive</a>
                <?php }
                ?></td>
                <td>
                <a href="status.php?id=<?php echo $row['id']?>&status=edit" class="btn btn-warning">Edit</a>
                <a href="status.php?id=<?php echo $row['id']?>&status=delete" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    </div>
    <!-- ===/BODY/=== -->

</div>
</div>
</div>
</div>
</div>
</section>
<?php include 'inc/footer.php' ?>