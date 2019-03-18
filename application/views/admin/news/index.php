<h2><?php echo $title;?></h2>

<?php foreach ($news as $news_item): ?>

  <h3> <?php echo $news_item['title']; ?></h3>
  <p> <?php echo $news_item['content']; ?></p>
  <p><a href="<?php echo site_url('news/'. $news_item['id']); ?>">view </a></p>
<?php endforeach;?>