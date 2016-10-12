<style type="text/css">
    #instaTitle{
      text-align: center;
    }
    #instaimages img{
      <?php echo $stylesheet; ?>
    }
    #instaimages{
      text-align: center;
    }
</style>

<h2 id="instaTitle"><a href="https://www.instagram.com/slapshopmy/"><?php echo $title; ?></a></h2>
<br>
<?php
if($is_error){
?>
<div class="row">
    <h4><?php echo $error; ?><h4>
</div>
<?php
}else{
?>
<div class="row" id="instaimages">

        <?php
     foreach ($images as $image){
        echo '<a href="https://www.instagram.com/slapshopmy/">';
        echo '<img src="'.$image.'"/>';
        echo '</a>';
    }
    ?>

<?php
}
?>
</div>
