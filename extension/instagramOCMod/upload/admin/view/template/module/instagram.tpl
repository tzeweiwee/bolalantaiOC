<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-instagram" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-instagram" class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="status" id="status" class="form-control">
                <?php if ($status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>       
          <div class="form-group">
            <label class="col-sm-2 control-label" for="name"><?php echo $entry_name; ?></label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
            </div>
          </div>             
          <table id="module" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <td class="text-right">#</td>
                <td class="text-left"><?php echo $entry_limit; ?></td>
                <td class="text-left"><?php echo $entry_resolution; ?></td>
                <td class="text-left"><?php echo $entry_username; ?></td>
                <td class="text-left"><?php echo $entry_likes; ?></td>
                <td class="text-left"><?php echo $entry_comments; ?></td>
                <td></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-right"></td>
                <td class="text-left"><input type="text" name="limit" value="<?php echo $limit; ?>" placeholder="<?php echo $entry_limit; ?>" class="form-control" /></td>
                <td class="text-left">
 				<select name="resolution" id="input-resolution" class="form-control">
                    <option value="low_resolution" <?php if ($resolution == 'low_resolution' ) echo 'selected' ; ?>>low_resolution 320x320</option>
                    <option value="thumbnail" <?php if ($resolution == 'thumbnail' ) echo 'selected' ; ?>>thumbnail 150x150</option>                
                    <option value="standard_resolution" <?php if ($resolution == 'standard_resolution' ) echo 'selected' ; ?>>standard_resolution 640x640</option>
                </select>                    
                </td>    
                <td><input type="text" name="username" value="<?php echo $username; ?>" placeholder="<?php echo $entry_username; ?>" class="form-control" /></td>           
                <td><input type="checkbox" name="likes" value="1" <?php echo ($likes==1 ? 'checked' : '');?> placeholder="<?php echo $entry_likes; ?>" class="form-control" /></td>           
                <td><input type="checkbox" name="comments" value="1"<?php echo ($comments==1 ? 'checked' : '');?> placeholder="<?php echo $entry_comments; ?>" class="form-control" /></td>           

                <td class="text-left"></td>
              </tr>            
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>