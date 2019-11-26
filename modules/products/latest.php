<?php
    $query=mysqli_query($conn,"SELECT * FROM product ORDER BY prd_id DESC LIMIT 6");  
?>
<!--	Feature Product	-->
<div class="products">
    <h3>Sản phẩm mới</h3>
    <?php
        $i=1;
        while($rows=mysqli_fetch_assoc($query)){
            if($i==1){
               
               echo  '<div class="product-list card-deck"> ';
                
            }       
    ?>
    <div class="product-item card text-center">
        <a href="?page_layout=product&prd_id=<?php echo $rows['prd_id']?>"><img src="admin/img/products/<?php echo $rows['prd_image'];?>"></a>
        <h4><a href="?page_layout=product&prd_id=<?php echo $rows['prd_id']?>"><?php echo $rows['prd_name'];?></a></h4>
        <p>Giá Bán: <span><?php echo $rows['prd_price'];?></span></p>
    </div>
    <?php
            if($i==3){              
                  echo '</div>';       
                $i=1;
            }
            else{
                $i++;
            }
        }
        ?>
</div>
<!--	End Feature Product	-->