<h1> 用户登陆 </h1>
<?php echo validation_errors();?>
<?php echo form_open('admin/user/login'); ?>
  <libel for="uname">账户名</libel>
  <input type="input" name="uname" /> <br />
  <libel for="passwd">密码</libel>
  <input type="passwd" name="passwd" /><br />
  <input type="submit" name="确定" value="登陆" />
  