<div class="<?php echo str_replace('_','-',$blockid); ?> <?php echo $blockcls;?>" id="pavo-<?php echo str_replace('_','-',$blockid); ?>">
  <div class="container">
    <div class="inside space-padding-tb-50">
       <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 address">
          <?php if( $content=$helper->getLangConfig('widget_address') ) {?>
              <?php echo $content; ?>
          <?php } ?>
        </div>
        <?php if ($informations) { ?>
        <div class="col-sm-2 col-md-2 col-sm-6 col-xs-12">
          <div class="footer-heading"><?php echo $text_information; ?></div>
          <ul class="list-unstyled">
            <?php foreach ($informations as $information) { ?>
            <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
        <div class="col-md-2 col-sm-6 col-xs-12 column">
          <div class="footer-heading"><?php echo $text_service; ?></div>
          <ul class="list-unstyled">
          <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
          <!-- <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li> -->
          <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
        </ul>
        </div>
        <div class="col-sm-2 col-md-2 col-sm-6 col-xs-12">
          <div class="footer-heading"><?php echo $text_extra; ?></div>
            <ul class="list-unstyled">
            <li><a href="<?php echo $manufacturer; ?>"><?php echo $text_manufacturer; ?></a></li>
<!--             <li><a href="<?php echo $voucher; ?>"><?php echo $text_voucher; ?></a></li>
            <li><a href="<?php echo $affiliate; ?>"><?php echo $text_affiliate; ?></a></li> -->
            <li><a href="http://localhost/OC_slapslap_PAV/index.php?route=pavdeals/deals">Deals</a></li> 
          </ul>     
          </div>
        
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 contact">
          <div class="footer-heading">Our Store</div>
          <div><?php if( $content=$helper->getLangConfig('widget_contact') ) {?>
              <?php echo $content; ?>
          <?php } ?></div>
        </div>
      </div>
    </div>
  </div>
</div>

