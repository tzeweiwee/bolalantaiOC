<?php if ($modules) { ?>
<div class="col-md-3" id="sidebar-right">
<column id="column-right" class="hidden-xs sidebar">
  <?php foreach ($modules as $module) { ?>
  <?php echo $module; ?>
  <?php } ?>
</column>
</div>
<?php } ?>
