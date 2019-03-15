<h1>user list</h1>
<?php foreach($userlist as $key => $val){ ?>
 <p>
   <b> <?php echo $val['uname']; ?> </b>  create: <?php echo date("Y-m-d H:i:s", $val['ctime']); ?>
   <a href="<?php echo site_url("admin/user/modify/")  . $val['id']; ?>" >修改</a> 
   <a href="<?php echo site_url("admin/user/del/") . $val['id']; ?>" >删除</a> 
 </p>
<?php } ?> 