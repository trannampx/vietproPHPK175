 <?php
    $prd_id=$_GET['prd_id'];
    $sql=mysqli_query($conn,"SELECT * FROM product WHERE  prd_id='$prd_id'");
    $prd=mysqli_fetch_assoc($sql);
 ?>
                <!--	List Product	-->
                <div id="product">
                	<div id="product-head" class="row">
                    	<div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
                        	<img src="admin/img/products/<?php echo $prd['prd_image']?>">
                        </div>
                        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                        	<h1><?php echo $prd['prd_name']?></h1>
                            <ul>
                            	<li><span>Bảo hành:</span> <?php echo $prd['prd_warranty']?></li>
                                <li><span>Đi kèm:</span> <?php echo $prd['prd_accessories']?></li>
                                <li><span>Tình trạng:</span><?php echo $prd['prd_new']?></li>
                                <li><span>Khuyến Mại:</span><?php echo $prd['prd_promotion'];?></li>
                                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                                <li id="price-number"><?php echo number_format($prd['prd_price'],0,'','.');?></li>
                                <li id="status"><?php if($prd['prd_featured']==1){echo 'Còn Hàng';}else{echo 'Hết hàng';}?></li>
                            </ul>
                            <div id="add-cart"><a href="modules/cart/add_cart.php?prd_id=<?php echo $prd_id;?>">Mua ngay</a></div>
                        </div>
                    </div>
                    <div id="product-body" class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>Đánh giá về <?php echo $prd['prd_name']?></h3>
                            <p>
                            <?php echo $prd['prd_details']?>
                            </p>
                            
                        </div>
                    </div>
                    
                    <!--	Comment	-->

                    <!-- <?php
                        // date_default_timezone_set('Asia/Ho_Chi_Minh');
                        // if(isset($_POST['sbm'])){
                        //     $comm_name=$_POST['comm_name'];
                        //     $comm_mail=$_POST['comm_mail'];
                        //     $comm_details=$_POST['comm_details'];
                        //     $comm_date=date('Y-m-d H:i:s');
                        //     $sql_comm=mysqli_query($conn,"INSERT INTO comment (prd_id, comm_name, comm_mail, comm_date, comm_details) 
                        //     VALUES ('$prd_id','$comm_name','$comm_mail','$comm_date','$comm_details')");

                        // }
                    
                    
                    ?> -->
                    <!-- <div id="comment" class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>Bình luận sản phẩm</h3>
                            <form method="post">
                                <div class="form-group">
                                    <label>Tên:</label>
                                    <input name="comm_name" required type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                    <label>Nội dung:</label>
                                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>     
                                </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
                            </form> 
                        </div>
                    </div> -->
                    <!--	End Comment	-->  
                    
                    <!--	Comments List	-->
                    <!-- <?php
                        $sql_comm=mysqli_query($conn,"SELECT * FROM comment WHERE prd_id='$prd_id' ORDER BY comm_id DESC");
                    
                    ?>
                    <div id="comments-list" class="row">
                        <?php
                            // while( $row=mysqli_fetch_assoc($sql_comm)){
                        ?>
                    	<div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="comment-item">
                                <ul>
                                    <li><b><?php echo $row['comm_name']?></b></li>
                                    <li><?php echo $row['comm_date']?></li>
                                    <li>
                                        <p><?php echo $row['comm_details']?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php  //} ?>
                    </div> -->
                    <!--	End Comments List	-->
                </div>
                <!--	End Product	--> 

                <!--comment face-->
                <div class="fb-comments" data-href="http://localhost/php_k175/start/vietpro_mobile_shop/?page_layout=product&amp;prd_id=<?php echo $prd_id;?>" data-width="100%" data-numposts="5"></div>
                
