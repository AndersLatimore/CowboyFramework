<h1>Blog</h1>
<p>All nice news and blogposts about me and all things that are happening in the world.</p>
<p><a href='<?=create_url('content', 'create')?>'>Create a new blog post</a></p>
<?php if($contents != null):?>
  <?php foreach($contents as $val):?>
    <h2><?=esc($val['title'])?></h2>
<p class='smaller-text'><em>Posted on <?=$val['created']?> by <?=$val['owner']?></em></p>
<p><?=filter_data($val['data'], $val['filter'])?></p>
<p class='smaller-text silent'><a href='<?=create_url("content/edit/{$val['id']}")?>'>edit</a></p>
<?php endforeach; ?>
<?php else:?>
  <p>No posts exists.</p>
<?php endif;?>
