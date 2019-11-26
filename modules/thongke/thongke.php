<?php
    $open='modules/thongke/dem.txt';
    $fo=fopen($open,'r');
    $count=fread($fo,filesize($open));
    $count++;
    $fc=fclose($fo);
    $fo=fopen($open,'w');
    $fw=fwrite($fo,$count);
    $fc=fclose($fo);

?>
<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Thông kê truy cập</h4>
  <hr>
  <p>Hiện có: <span><?php echo $count;?> </span>Người đang truy cập</p>
</div>
   