<?php
 
include_once(__DIR__.'/../../function.php');
 $list = getCategory();
 

?>
<div class="categories">
    <section class="category-section">
      <a class="category active" href="http://localhost/core_php/app_youtube/youtube/index.php">All</a>
      <?php foreach($list as $key => $value){?>
      <a class="category" href="http://localhost/core_php/app_youtube/youtube/index.php?category_id=<?php echo $value['id']; ?>" ><?php echo $value['category_title']; ?></a>
      
      <?php } ?>
    </section>
  </div>