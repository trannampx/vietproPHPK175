<?php
//tìm iphone gold
    $key_arr=explode(' ',$keyword); //['iphone','gold'] cắt mảng theo khoảng trắng
    $key_end=implode('%',$key_arr);//[iphone%gold] nối mảng bằng %
    $sql=mysqli_query($conn,"SELECT * FROM `product` WHERE prd_name LIKE '%$key_end%'");
?>
<!--	List Product	-->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $keyword;?></span></div>
    <div class="row">
        <?php
          while($row=mysqli_fetch_assoc($sql)){ ?>
        <div class="col-lg-4 col-sm-6 product ">
            <div class="product-item card text-center">
                <a href="#"><img src="admin/img/products/<?php echo $row['prd_image']?>"></a>
                <h4><a href="#"><?php echo $row['prd_name']?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,'',',')?></span></p>
            </div>

        </div>
        <?php } ?>
    </div>
    <!--	End List Product	-->
</div>
<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>