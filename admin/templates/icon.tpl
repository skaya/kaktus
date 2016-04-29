<form action="upload.php" method="post" enctype="multipart/form-data" class="upload_pic_form" target="upload_target" onsubmit="startUpload();" >
  <p id="f1_upload_process">Идет загрузка...<br/><img src="loader.gif" /><br/></p>
  <p id="f1_upload_message"></p>
  <div id="f1_upload_form" align="center">

  <table cellpadding="0" cellspacing="0">
    <input type="hidden" name="issue_id" value="{$issue_id}" />
    <input type="hidden" name="garmoshka_set_name" value="{$garmoshka_set_name}" />
    <input type="hidden" name="to_connect" value="page" />
    <input type="hidden" name="upload_type" value="icon" />
    <tr>
      <td>
        ширина:
        <input type="text" name="width" value="{$image_size.page_icon.image_small.width}"  class="text_box_sm"  />
      </td>
      <td>
        высота:
        <input type="text" name="height" value="{$image_size.page_icon.image_small.height}" class="text_box_sm" />
      </td>
    </tr>
    <tr>
  		<td colspan="2">
        {if $icon!=''}<img src="../{$icon}" />{else}<img src="admin_img/no_image.gif" />{/if}
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
