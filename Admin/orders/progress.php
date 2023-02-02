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
<li class="breadcrumb-item ">Progress</li>
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
        <div class="row">
            <div class="col col-lg-4 col-md-12">
                    <div class="card text-center" style="border: solid black 1px;">
                    <img class="card-img-top" src="" alt="Product-Img">
                    <div class="card-body">
                        <?php
                        //$id = $_GET['id']; 
            
                        $product = $obj->get('*','product','','','JOIN product_order ON product.id = product_order.product_id;');
                        foreach($product as $row)
                        {
                            ?>
                            <h4><?=$row['product_name'];?></h4>
                            <?php 
                            // 0 -> DELEVERD
                            // 1 -> ON ROUTE
                            // 2 -> PLACED
                            // 3 -> NOT PLACED
                            if($row['order_process'] == 0){ echo '<h5><i class="fa-regular fa-circle-check"></i> Deliverd</h5>';}
                            elseif($row['order_process'] == 1){ echo '<h5><i class="fa-solid fa-truck-fast"></i> On Route</h5>';}
                            elseif($row['order_process'] == 2)
                            { 
                                echo '<h5><i class="fa-solid fa-clipboard-check"></i> Placed</h5>';
                                $get_order_id = $obj->get('id','product_order');
                                $order_id =$get_order_id['0']['id'];
                                ?>
                                <br>
                                <a href="shipment.php?order-id=<?php echo $order_id; ?>"><i class="fa-solid fa-truck-ramp-box"></i> Send?</a>
                                <?php                                
                            }
                            else
                            {
                                echo '<h5><i class="fa-solid fa-circle-xmark"></i> Not Placed YEt</h5>';
                                $get_order_id = $obj->get('id','product_order');
                                $order_id =$get_order_id['0']['id'];
                                ?>
                                <br>
                                <a href="placed.php?order-id=<?php echo $order_id; ?>"><i class="fa-solid fa-clipboard-check"></i> PLACED IT?</a>
                                <?php

                            }
                        }
                        ?>
                    </div>
                    </div>
            </div>

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