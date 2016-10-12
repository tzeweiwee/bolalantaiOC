 <?php
 $this->language( 'module/themecontrol' );
  $objlang = $this->registry->get('language');

?>
 <div class="pav-verticalmenu">
    <div class="panel-heading">
    <h4 class="panel-title">
      <?php echo $objlang->get("text_all_category"); ?>
    </h4>
    </div>       
	<div class="navbar navbar-default">
		<div  class="verticalmenu" role="navigation">
			<div class="navbar-header">
			<a href="javascript:;" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle">
		        <span class="fa fa-bar"></span>
		        <span class="fa fa-bar"></span>
		        <span class="fa fa-bar"></span>
		     </a>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php echo $treemenu; ?>
			 </div></div>
		</div>
	</div>
</div>