<?php
  $success = $this->session->flashdata('success');
  if(!empty($success)) {
    echo("<div class='success'>$success</div>");
  }
?>
<?php foreach($news as $news_item): ?>
  <h2><?php echo $news_item['title'] ?></h2>
  <div class='main'>
    <?php echo $news_item['text'] ?>
  </div>
  <p><a href="<?php echo site_url('news/' . $news_item['slug']) ?>">View article</a></p>
<?php endforeach ?>
