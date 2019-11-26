	<?php
		if(isset($_GET['page_cat'])){
			$page_cat=$_GET['page_cat'];
		}else{
			$page_cat=1;
		}
		//tạo số category tong 1 trang
		$cat_per_page=5;
		// tính key của cat
		$key_cat=$page_cat*$cat_per_page-$cat_per_page;
		// tính tổng số cat
		$total_cat=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM category"));
		// tính tổng page
		$total_page_cat=ceil($total_cat/$cat_per_page);
		// tạo biến chứa các nút trang
		$list_page_cat='';
		// làm nút prev
		$cat_page_prev=$page_cat-1;
		if($cat_page_prev<=0){
			$cat_page_prev=1;
		}
		$list_page_cat.='<li class="page-item"><a class="page-link" href="index.php?page_layout=category&page_cat='.$cat_page_prev.'">&laquo;</a></li>';
		// tạo các nút chuyển trang
		for($i=1;$i<=$total_page_cat;$i++){
			$list_page_cat.='<li class="page-item"><a class="page-link" href="index.php?page_layout=category&page_cat='.$i.'">'.$i.'</a></li>';
		}
		// tạo nút next
		$next_page_cat=$page_cat+1;
		if($next_page_cat>$total_page_cat){
			$next_page_cat=$total_page_cat;
		}
		$list_page_cat.='<li class="page-item"><a class="page-link" href="index.php?page_layout=category&page_cat='.$next_page_cat.'">&raquo;</a></li>';

	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý danh mục</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lý danh mục</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="index.php?page_layout=add_category" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm danh mục
            </a>
        </div>
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
									data-toolbar="#toolbar"
									data-toggle="table">
		
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên danh mục</th>
										<th>Hành động</th>
									</tr>
									</thead>
									<tbody>
									<?php
                                    $sql="SELECT * FROM category ORDER BY cat_id ASC LIMIT $key_cat, $cat_per_page ";
                                    $query=mysqli_query($conn,$sql);
                                    while($assoc=mysqli_fetch_assoc($query)){ 

									?>
										<tr>
											<td style=""><?php echo $assoc['cat_id'] ?></td>
											<td style=""><?php echo $assoc['cat_name'] ?></td>
											<td class="form-group">
												<a href="/" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
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
										<?php echo $list_page_cat;?>
									</ul>
								</nav>
							</div>
						</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->


