<?php /* Smarty version 2.6.12, created on 2013-04-29 00:28:21
         compiled from icon.tpl */ ?>
<form action="upload.php" method="post" enctype="multipart/form-data" class="upload_pic_form" target="upload_target" onsubmit="startUpload();" >
  <p id="f1_upload_process">Идет загрузка...<br/><img src="loader.gif" /><br/></p>
  <p id="f1_upload_message"></p>
  <div id="f1_upload_form" align="center">

  <table cellpadding="0" cellspacing="0">
    <input type="hidden" name="issue_id" value="<?php echo $this->_tpl_vars['issue_id']; ?>
" />
    <input type="hidden" name="garmoshka_set_name" value="<?php echo $this->_tpl_vars['garmoshka_set_name']; ?>
" />
    <input type="hidden" name="to_connect" value="page" />
    <input type="hidden" name="upload_type" value="icon" />
    <tr>
      <td>
        ширина:
        <input type="text" name="width" value="<?php echo $this->_tpl_vars['image_size']['page_icon']['image_small']['width']; ?>
"  class="text_box_sm"  />
      </td>
      <td>
        высота:
        <input type="text" name="height" value="<?php echo $this->_tpl_vars['image_size']['page_icon']['image_small']['height']; ?>
" class="text_box_sm" />
      </td>
    </tr>
    <tr>
  		<td colspan="2">
        <?php if ($this->_tpl_vars['icon'] != ''): ?><img src="../<?php echo $this->_tpl_vars['icon']; ?>
" /><?php else: ?><img src="admin_img/no_image.gif" /><?php endif; ?>
      </td>
    </tr>


    <tr>
      <td colspan="2">
        <input name="myfile" id="myfile" type="file" size="30" value="файл" class="browse_form1"/>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" name="submitBtn" value="Загрузить" class="mini_save icon"/>
      </td>
    </tr>
  </table></div>

  <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px;"></iframe>
</form>