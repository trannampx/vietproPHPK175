<?php
    $sql="SELECT * FROM product WHERE prd_featured=1 ORDER BY prd_id DESC LIMIT 6";
    $query=mysqli_query($conn,$sql);
?>

<!--	Feature Product	-->
<div class="products">
    <h3>Sản phẩm nổi bật</h3>
 <div class="product-list card-deck">
    <?php
        while($rows=mysqli_fetch_assoc($query)){  
    ?>
    <div class="product-item card text-center" data-toggle="tooltip" title="<?php echo $rows['prd_name'];?>">
            <a href="?page_layout=product&prd_id=<?php echo $rows['prd_id']?>"><img src="admin/img/products/<?php echo $rows['prd_image'];?>"></a>
            <h4><a href="?page_layout=product&prd_id=<?php echo $rows['prd_id']?>"><?php echo $rows['prd_name'];?></a></h4>
            <p>Giá Bán: <span><?php echo $rows['prd_price'];?></span></p>
        </div>
        <?php    
        }
        ?>
    </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<!--	End Feature Product	-->