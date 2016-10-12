<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="<?php echo  $helper->getDirection(); ?>" class="<?php echo $helper->getDirection(); ?>" lang="<?php echo $lang; ?>">
<!--<![endif]-->
<?php  require( ThemeControlHelper::getLayoutPath( 'common/parts/head.tpl' ) );   ?>
<body class="<?php echo $class; ?> layout-<?php echo $template_layout; ?> ">
<div class="row-offcanvas row-offcanvas-left"> 
<div class="bo-mainmenu">
  <nav id="topbar">
    <div class="container">
      <div class="nav pull-left" id="setting">
        <ul class="list-inline">
          <li  class="hidden-xs hidden-sm hidden-md telephone"> 
            <div class="pull-left">
                  <span>call us <?php echo $telephone; ?></span> 
            </div>
          </li>
          <li><?php echo $currency; ?></li>
          <li><?php echo $language; ?></li>
        </ul>  
      </div> 
      <div id="top-links" class="nav pull-right">
        <ul class="list-inline">
          <li class="dropdown hidden-lg"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Setting</span><span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li><a class="shoppingcart" href="<?php echo $shopping_cart; ?>"><?php echo $text_shopping_cart; ?></a></li>
              <li><a class="last checkout" href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a></li>
              <li><a class="account" href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
               <?php if ($logged) { ?>
                <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
               <?php } else { ?>
                <li><a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
                <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a> </li>
              <?php } ?>
            </ul>
          </li>
          <li class="hidden-xs hidden-sm hidden-md"><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
         <li class="hidden-xs hidden-sm hidden-md"><a href="<?php echo $wishlist; ?>" id="wishlist-total" title="<?php echo $text_wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
              <?php if ($logged) { ?>
              <li class="hidden-xs hidden-sm hidden-md"> <a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
              <?php } else { ?>
              <li class="hidden-xs hidden-sm hidden-md">  <a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
              <li class="hidden-xs hidden-sm hidden-md"> <a href="<?php echo $login; ?>"><?php echo $text_login; ?></a>  </li>
              <?php } ?>
          <li class="hidden-xs"><?php echo $cart; ?></li>
        </ul>
      </div>

    </div>
  </nav>
  </div>

<header class="header-v1">
  <div class="container text-center">
    <div id="logo">
      <?php if ($logo) { ?>
      <a href="<?php echo $home; ?>"><img src="<?php echo $logo; ?>" title="<?php echo $name; ?>" alt="<?php echo $name; ?>" class="img-responsive" /></a>
      <?php } else { ?>
      <h1><a href="<?php echo $home; ?>"><?php echo $name; ?></a></h1>
      <?php } ?>
    </div>
  </div>
  <div class="menu">
    <div class="container">
      <div class="inner">
        <?php  require( ThemeControlHelper::getLayoutPath( 'common/parts/mainmenu.tpl' ) );   ?>
      </div>
    </div>
  </div>
</header>

  <!-- sys-notification -->
  <div id="sys-notification">
    <div class="container">
      <div id="notification"></div>
    </div>
  </div>
  
  <!-- /sys-notification -->
  <?php
  /**
  * Showcase modules
  * $ospans allow overrides width of columns base on thiers indexs. format array( column-index=>span number ), example array( 1=> 3 )[value from 1->12]
  */
  //$modules = $helper->getCloneModulesInLayout( $blockid, $layoutID );
  $blockid = 'slideshow';
  $blockcls = "hidden-xs hidden-sm";
  $ospans = array(1=>12);
  require( ThemeControlHelper::getLayoutPath( 'common/block-cols.tpl' ) );
  ?>
  <?php
  /**
  * Showcase modules
  * $ospans allow overrides width of columns base on thiers indexs. format array( column-index=>span number ), example array( 1=> 3 )[value from 1->12]
  */
  $blockid = 'showcase';
  $blockcls = 'hidden-xs hidden-sm';
  $ospans = array(1=>12);
  require( ThemeControlHelper::getLayoutPath( 'common/block-cols.tpl' ) );
  ?>
  <?php
  /**
  * promotion modules
  * $ospans allow overrides width of columns base on thiers indexs. format array( column-index=>span number ), example array( 1=> 3 )[value from 1->12]
  */
  $blockid = 'promotion';
  $blockcls = "hidden-xs hidden-sm";
  $ospans = array(1=>12, 2=>12);
  require( ThemeControlHelper::getLayoutPath( 'common/block-cols.tpl' ) );
  ?>
  
 <div class="maincols">
