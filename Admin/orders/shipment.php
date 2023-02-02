<?php
echo $id = $_GET['order-id'];
//die();
if($id != '')
{
    include '../config/config.php'; $obj = new init();
    $values = ['order_process'=>'1']; 
    $result = $obj->update('product_order',$values,'id ='.$id);
    if($result = TRUE)
    {
        header('location:progress.php');
    }
}


?>