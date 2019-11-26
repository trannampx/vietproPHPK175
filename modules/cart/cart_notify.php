<?php
$soluong=0;
    if(isset($_SESSION['sa'])){
        $soluong=array_sum($_SESSION['sa']);
    }

?>
<div id="cart" class="col-lg-3 col-md-3 col-sm-12">
    <a class="mt-4 mr-2" href="#">giỏ hàng</a><span class="mt-3"><?php echo $soluong;?></span>
</div>