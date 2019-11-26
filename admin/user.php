<?php
    if(isset($_GET['page_user'])){
        $page_user=$_GET['page_user'];
    }else{
        $page_user=1;
    }
        // tạo số user trong 1 page
        $num_user_per_page=5;
        // tìm key của user
        $key_user=$page_user*$num_user_per_page-$num_user_per_page;
        //tính tổng số user
        $total_user=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user"));
        $total_page_user=ceil($total_user/$num_user_per_page);
        
        // tạo biến chứa các trang
        $list_page_user='';
        ///////////// làm thanh prev/////////////
        //tạo biến prev
        $prev_page_user=$page_user-1;
        // nếu khi prev nhỏ hơn hoặc bằng không thì cho prev bằng 1
        if($prev_page_user<=0){
            $prev_page_user=1;
        }
        // tại link cho prev
        $list_page_user.='<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page_user='.$prev_page_user.'">&laquo;</a></li>';
        //tạo các trang bằng vòng lặp for
        for($i=1;$i<=$total_page_user;$i++){
            // tại link cho các trang
            $list_page_user.=' <li class="page-item"><a class="page-link" href="index.php?page_layout=user&page_user='.$i.'">'.$i.'</a></li>';
        }
        // khởi tạo next
        $next_page_user=$page_user+1;
        if($next_page_user>$total_page_user){
            $next_page_user=$total_page_user;
        }
        $list_page_user.='<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page_user='.$next_page_user.'">&raquo;</a></li>';
    
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page_layout=add_user" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Họ & Tên</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql="SELECT * FROM user LIMIT $key_user, $num_user_per_page ";
                                    $query=mysqli_query($conn,$sql);
                                    while($assoc=mysqli_fetch_assoc($query)){
                                ?>
                                <tr>
                                    <td style=""><?php echo $assoc['user_id']; ?></td>
                                    <td style=""><?php echo $assoc['user_full']; ?></td>
                                    <td style=""><?php echo $assoc['user_mail']; ?></td>
                                    <td><span class="label <?php if($assoc['user_level']==1){echo 'label-danger' ;}else{echo 'label-warning';}?>"><?php if($assoc['user_level']==1){echo 'Admin' ;}else{echo 'Member';}?></span></td>
                                    <td class="form-group">
                                        <a href="thanhvien-edit.html" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="/" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
						</table>
                    </div>
                    <div class="panel-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php echo $list_page_user;?>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->

