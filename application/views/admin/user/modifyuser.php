<h1> add user form</h1>
<?php echo validation_errors();?>
<?php echo form_open(''); ?>
  账户名: <?php echo $user['uname']?> <br />
  <libel for="passwd">密码</libel>
  <input type="passwd" name="passwd"  /><br />
  <libel for="passwd">重复密码</libel>
  <input type="passwd" name="passwd1" /><br />
  
  <input type="submit" name="修改" value="修改" />
  