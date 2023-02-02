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
<li class="breadcrumb-item ">Category</li>
<li class="breadcrumb-item ">Update by Search</li>
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
            <form method="POST">
            <label>Update</label>
            <div class="input-group masked-input mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text">
            <i class="zmdi zmdi-hc-fw"></i>
            </span>
            </div>
            <input type="search" class="form-control text" placeholder="Ex: Category" name="category" required>
            </div>
            <input type="submit"  value="Search" class="btn btn-success" name="type">
            <a href="http://localhost/JEB/Admin/category/" class="btn btn-warning text-white">Back To list</a>
            </form>
        </div>
    </div>
    <div class="body">
        <div class="col-lg-12 col-md-12">
        <?php
        if(isset($_POST['type']))
        {
            $category = $_POST['category'];
            $result = $obj->get('*','category','','',"WHERE `category_name` LIKE '$category'");
            if($result == TRUE)
            {
            ?>
            <table class="table table-borderd">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
            foreach($result as $row)
            {
            ?>
            <tr>
                <td><?=$row['id']?></td>
                <td><?=$row['category_name']?></td>
                <td>
                    <form method="POST">
                        <button class="btn btn-danger w-100" name="btn">DELETE</button>
                    </form>
                </td>
            </tr>
            <?php
            }
            $id = $row['id'];
            if(isset($_POST['btn']))
            {
                $result = $obj->delete('category',"`id` = ".$id);
                if($result = TRUE)
                {
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="http://localhost/JEB/Admin/category/";';
                    echo '</script>';
                }
            }
            }
            elseif($result == 0)
            {
                echo "<tr><td><h2>NO RECORD FOUND!!!</h2></td></tr>";
            }

        }
        ?>   
        </tbody>
        </table>
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