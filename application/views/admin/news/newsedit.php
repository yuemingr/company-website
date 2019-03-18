<h1> edit news form</h1>
<?php echo validation_errors();?>
<?php echo form_open(''); ?>
  <libel for="title">标题</libel>
  <input type="input" name="title" value="<?php echo $new['title']; ?>" /> <br />
  <libel for="content">内容</libel>
  <input type="passwd" name="content" value="<?php echo $new['content']; ?>" /><br />
  <libel for="passwd">重复密码</libel>
  <input type="passwd" name="passwd1" /><br />
  
  <input type="submit" name="确定" value="提交" />
  