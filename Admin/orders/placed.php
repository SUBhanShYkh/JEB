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
<li class="breadcrumb-item ">Placed</li>
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
            <div class="col col-lg-12 col-md-12">
            <?php
            $result = $obj->get('*','product_order','order_process','2');
                echo '<pre>';
                print_r($result);
                die();
            foreach($result as $row)
            {
            ?>
            <div class="row">
                <div class="col col-lg-6 col-md-12">
                    <div class="card text-start p-2" style="border: solid black 1px;">
                    <h4><i class="fa-solid fa-clipboard-check"></i>&nbsp;<span>Key = PR-123456789</span></h4>
                      <div class="card-body">
                        <ul>
                            <li>FROM : <?=$row['user_id']?></li>
                            <li>PRODUCT :  <?=$row['product_id']?></li>
                            <li>DATE OF ORDER : <?=$row['date_of_order']?></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
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