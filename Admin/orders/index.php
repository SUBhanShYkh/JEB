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
<li class="breadcrumb-item ">Order</li>
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
            <th>From</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Delevery Address</th>
            <th>P.O Box</th>
            <th>Phone</th>
            <th>Date Of Order</th>
            <th>Process</th>
        </thead>
        <tbody>
            <?php
            $result = $obj->get('*','product_order');
            foreach($result as $row){
            ?>
            <tr>
                <td><?=$row['id']?></td>
                <td>
                <?php 
                $user = $obj->get('*','user','','','JOIN product_order ON user.id = product_order.user_id;');
                foreach($user as $users){ echo $users['user_name'];}
                ?>
                </td>
                <td>
                <?php 
                $user = $obj->get('*','product','','','JOIN product_order ON product.id = product_order.product_id;');
                foreach($user as $users){ echo $users['product_name'];}
                ?>  
                </td>
                <td><?=$row['qauntity']?></td>
                <td><?=$row['delevery_address']?></td>
                <td><?=$row['pobox']?></td>
                <td><?=$row['phone']?></td>
                <td><?=$row['date_of_order']?></td>
                <!-- <td><?=$row['order_process']?></td> -->
                <td><a href="progress.php?id=<?=$row['id']?>">CheckOut <i class="fa-solid fa-angles-right"></i> </a></td>
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