<h4 class="heading-instagram"><a class="tt01 tt02 coreSpriteNavigationBrandSmall" href="https://www.instagram.com/<?php echo $instagrams[0]['user']->username?>" ><?php echo $heading_title; ?></a></h4>
<div class="insta_user"><a href="https://www.instagram.com/<?php echo $instagrams[0]['user']->username?>" target="_blank"> <?php echo Ucfirst($instagrams[0]['user']->username); ?>
&nbsp;<img  class="profilepicuser" src="<?php echo $instagrams[0]['user']->profile_picture  ?>"></a></div>
<div class="row instagram">
  <?php foreach ($instagrams as $instagram) { ?>
  <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="product-thumb-instagram transition">
      <div class="image"><a href="<?php echo $instagram['href']; ?>" target="_blank"><img src="<?php echo $instagram['thumb']; ?>" class="img-responsive" /></a></div>
      <div class="caption">
        <p><a href="<?php echo $instagram['href']; ?>" target="_blank"><?php echo $instagram['description']; ?><?php echo $instagram['date']; ?>
        <?php if(isset($instagram['likes']) && $instagram['likes']>0) { 
                   echo ' likes: '.$instagram['likes'];
         } ?></a></p>
        <?php if(isset($instagram['comments'])) { ?>
                <?php foreach ($instagram['comments'] as $comment) { ?>
                <p><?php echo $comment->text ?>&nbsp;<a href="https://www.instagram.com/<?php echo $comment->from->username ?>/" target="_blank"><?php echo $comment->from->username ?></a></p>
				<div><a href="https://www.instagram.com/<?php echo $comment->from->username ?>/" target="_blank"><img  class="profilepicinsta" src="<?php echo $comment->from->profile_picture  ?>"></a></div>               
                <?php  } ?>
        <?php  } ?>         
      </div>
    </div>
  </div>
  <?php } ?>
</div>
