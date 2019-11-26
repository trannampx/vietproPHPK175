<?php
    $sql=mysqli_query($conn,"SELECT * FROM category ORDER BY cat_id ASC")

?>
<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
            <?php
                while($rows=mysqli_fetch_assoc($sql)){    
            ?>
            <li class="menu-item"><a href="?page_layout=category&cat_name=<?php echo $rows['cat_name'];?>&cat_id=<?php echo $rows['cat_id'];?>"><?php echo $rows['cat_name'];?></a></li>
            <?php
                }
            ?>
        </ul>
    </div>
</nav>