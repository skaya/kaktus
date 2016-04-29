<?php
require_once(str_replace('\\\\','/',dirname(__FILE__)).'/../class/config.class.php');
require_once(str_replace('\\\\','/',dirname(__FILE__)).'/../class/util.class.php');
/*SpawConfig::setStaticConfigItem('DOCUMENT_ROOT', '/h/harmonyby/htdocs/');
SpawConfig::setStaticConfigItem('SPAW_ROOT', '/h/harmonyby/htdocs/admin/spaw/');
SpawConfig::setStaticConfigItem('SPAW_DIR', 'http://'.$_SERVER['HTTP_HOST'].'/admin/spaw/');
$Images_upload='http://'.$_SERVER['HTTP_HOST'].'/';
*/

SpawConfig::setStaticConfigItem('DOCUMENT_ROOT', "w:/home/localhost/www/kaktus/");
SpawConfig::setStaticConfigItem('SPAW_ROOT',"w:/home/localhost/www/kaktus/admin/spaw/");
//echo SpawConfig::getStaticConfigValue('SPAW_ROOT');
SpawConfig::setStaticConfigItem('SPAW_DIR', 'http://localhost/kaktus/admin/spaw/');
$Images_upload='http://localhost/kaktus/';

//W:/home/localhost/www/avrora/admin/spaw/ 
//W:/home/localhost/www/avrora/admin/spaw/ 
// DEFAULTS used when no value is set from code
// language 
SpawConfig::setStaticConfigItem('default_lang','ru');
// output charset (empty strings means charset specified in language file)
SpawConfig::setStaticConfigItem('default_output_charset','utf-8');
// theme 
SpawConfig::setStaticConfigItem('default_theme','spaw2lite');
// toolbarset 
SpawConfig::setStaticConfigItem('default_toolbarset','standard');
// stylesheet
SpawConfig::setStaticConfigItem('default_stylesheet',SpawConfig::getStaticConfigValue('SPAW_DIR').'wysiwyg.css');
// width 
SpawConfig::setStaticConfigItem('default_width','100%');
// height 
SpawConfig::setStaticConfigItem('default_height','500px');

// specifies if language subsystem should use iconv functions to convert strings to the specified charset
SpawConfig::setStaticConfigItem('USE_ICONV',true);
// specifies rendering mode to use: "xhtml" - renders using spaw's engine, "builtin" - renders using browsers engine
SpawConfig::setStaticConfigItem('rendering_mode', 'xhtml', SPAW_CFG_TRANSFER_JS);
// specifies that xhtml rendering engine should indent it's output
SpawConfig::setStaticConfigItem('beautify_xhtml_output', true, SPAW_CFG_TRANSFER_JS);
// specifies host and protocol part (like http://mydomain.com) that should be added to urls returned from file manager (and probably other places in the future) 
SpawConfig::setStaticConfigItem('base_href', '', SPAW_CFG_TRANSFER_JS);
// specifies if spaw should strip domain part from absolute urls (IE makes all links absolute)
SpawConfig::setStaticConfigItem('strip_absolute_urls', true, SPAW_CFG_TRANSFER_JS);
// specifies in which directions resizing is allowed (values: none, horizontal, vertical, both)
SpawConfig::setStaticConfigItem('resizing_directions', 'vertical', SPAW_CFG_TRANSFER_JS);
// specifies that special characters should be converted to the respective html entities
SpawConfig::setStaticConfigItem('convert_html_entities', false, SPAW_CFG_TRANSFER_JS);

// data for style (css class) dropdown list
SpawConfig::setStaticConfigItem("dropdown_data_core_style",
  array(
    '' => 'Normal',
    'style1' => 'Style No.1',
    'style2' => 'Style No.2',
  )
);
// data for style (css class) dropdown in table properties dialog
SpawConfig::setStaticConfigItem("table_styles",
  array(
    '' => 'Normal',
    'nalog' => 'red_table',
   
  )
);
// data for style (css class) dropdown in table cell properties dialog
SpawConfig::setStaticConfigItem("table_cell_styles",
  array(
    '' => 'Normal',
    'style1' => 'Style No.1',
    'style2' => 'Style No.2',
  )
);
// data for fonts dropdown list
SpawConfig::setStaticConfigItem("dropdown_data_core_fontname",
  array(
    'Arial' => 'Arial',
    'Courier' => 'Courier',
    'Tahoma' => 'Tahoma',
    'Times New Roman' => 'Times',
    'Verdana' => 'Verdana'
  )
);
// data for fontsize dropdown list
SpawConfig::setStaticConfigItem("dropdown_data_core_fontsize",
  array(
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    '6' => '6'
  )
);
// data for paragraph dropdown list
SpawConfig::setStaticConfigItem("dropdown_data_core_formatBlock",
  array(
    'Normal' => 'Normal',
    '<H1>' => 'Heading 1',
    '<H2>' => 'Heading 2',
    '<H3>' => 'Heading 3',
    '<H4>' => 'Heading 4',
    '<H5>' => 'Heading 5',
    '<H6>' => 'Heading 6',
    '<pre>' => 'Preformatted',
    '<address>' => 'Address',
    '<p>' => 'Paragraph'    
  )
);
// data for link targets drodown list in hyperlink dialog
SpawConfig::setStaticConfigItem("a_targets",
  array(
    '_self' => 'Self',
    '_blank' => 'Blank',
    '_top' => 'Top',
    '_parent' => 'Parent'
  )
);


// toolbar sets (should start with "toolbarset_"
// standard core toolbars
SpawConfig::setStaticConfigItem('toolbarset_standard',
  array(
    "format" => "format",
    "font" => "font",
    "edit" => "edit",
    "table" => "table",
    "plugins" => "plugins",
    "insert" => "insert",
    "tools" => "tools"
  ) 
);
// all core toolbars
SpawConfig::setStaticConfigItem('toolbarset_all',
  array(
    "format" => "format",
    "style" => "style",
    "edit" => "edit",
    "table" => "table",
    "plugins" => "plugins",
    "insert" => "insert",
    "tools" => "tools",
    "font" => "font"   
  ) 
);
// mini core toolbars
SpawConfig::setStaticConfigItem('toolbarset_mini',
  array(
    "format" => "format_mini",
    "edit" => "edit",
    "tools" => "tools"
  ) 
);

// colorpicker config
SpawConfig::setStaticConfigItem('colorpicker_predefined_colors',
  array(
    'black',
    'silver',
    'gray',
    'white',
    'maroon',
    'red',
    'purple',
    'fuchsia',
    'green',
    'lime',
    'olive',
    'yellow',
    'navy',
    'blue',
    '#fedcba',
    'aqua'
  ),
  SPAW_CFG_TRANSFER_SECURE
);

// SpawFm plugin config:

// global filemanager settings
SpawConfig::setStaticConfigItem(
  'PG_SPAWFM_SETTINGS',
  array(
    'allowed_filetypes'   => array('any'),  // allowed filetypes groups/extensions
    'allow_modify'        => true,         // allow edit filenames/delete files in directory
    'allow_upload'        => true,         // allow uploading new files in directory
    'chmod_to'          => 0777,          // change the permissions of an uploaded file if allowed
                                            // (see PHP chmod() function description for details), or comment out to leave default
    'max_upload_filesize' => 0,             // max upload file size allowed in bytes, or 0 to ignore
    'max_img_width'       => 0,             // max uploaded image width allowed, or 0 to ignore
    'max_img_height'      => 0,             // max uploaded image height allowed, or 0 to ignore
    'recursive'           => true,         // allow using subdirectories
    'allow_modify_subdirectories' => true, // allow renaming/deleting subdirectories
    'allow_create_subdirectories' => true, // allow creating subdirectories
    'forbid_extensions'   => array('php'),  // disallow uploading files with specified extensions
    'forbid_extensions_strict' => true,     // disallow specified extensions in the middle of the filename
  ),
  SPAW_CFG_TRANSFER_SECURE
);

// directories

SpawConfig::setStaticConfigItem(
  'PG_SPAWFM_DIRECTORIES',
  array(
    array(
      'dir'     => $Images_upload.'Flash/',
	  'fsdir'   => SpawConfig::getStaticConfigValue('DOCUMENT_ROOT').'Flash/', // optional absolute physical filesystem path
      'caption' => 'Flash movies', 
      'params'  => array(
        'allowed_filetypes' => array('flash')
      )
    ),
    array(
      'dir'     => $Images_upload.'Image/',
	  'fsdir'   => SpawConfig::getStaticConfigValue('DOCUMENT_ROOT').'Image/', // optional absolute physical filesystem path
      'caption' => 'Images',
      'params'  => array(
        'default_dir' => true, // set directory as default (optional setting)
        'allowed_filetypes' => array('images')
      )
    ),
    array(
      'dir'     => $Images_upload.'File/',
      'fsdir'   => SpawConfig::getStaticConfigValue('DOCUMENT_ROOT').'File/', // optional absolute physical filesystem path
      'caption' => 'Files', 
      'params'  => array(
        'allowed_filetypes' => array('any')
      )
    ),
  ),
  SPAW_CFG_TRANSFER_SECURE
);


?>
