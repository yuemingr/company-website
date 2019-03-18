<h1> add news form</h1>
<?php echo validation_errors();?>
<?php echo form_open('admin/user/create'); ?>
  <libel for="uname">标题</libel>
  <input type="input" name="uname" /> <br />
  <libel for="passwd">内容</libel>
  <input type="passwd" name="passwd" /><br />
  <libel for="passwd">重复密码</libel>
  <input type="passwd" name="passwd1" /><br />
  
  <input type="submit" name="确定" value="create" />
  