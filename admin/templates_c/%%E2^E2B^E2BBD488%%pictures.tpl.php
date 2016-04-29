<?php /* Smarty version 2.6.12, created on 2015-11-24 01:04:22
         compiled from pictures.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajax_update', 'pictures.tpl', 50, false),)), $this); ?>
<?php echo '
	<script type="text/javascript">
		jQuery.noConflict();
		jQuery(document).ready(function(){

			// function slideout(){
		 //    setTimeout(function(){
		 //      jQuery("#response").slideUp("slow", function (){});
		 //    }, 2000)
		 //  }

		  jQuery("#response").hide();

			jQuery(function() {
			  jQuery("#gallery-list").sortable({ opacity: 0.8, cursor: \'move\', update:
		      function() {
		      	jQuery("#response").html(\'Load\').show();
		      	var order = jQuery(this).sortable("serialize") + \'&update=order\';
		      	console.log(order);
		      	//console.log(jQuery(this).sortable("serialize"));
		      	jQuery.post("portfolio.php", order, function(theResponse){
		      	 	jQuery("#response").html(\'Finish\');

		  				// jQuery("#response").html(theResponse);
		  				// jQuery("#response").slideDown(\'slow\');
		  			});
				  }
				});
			});
		});
	</script>
'; ?>


<div id="response"> </div>

<div id="gallery-list">
	<?php $this->assign('i', -1); ?>
	<?php unset($this->_sections['pic']);
$this->_sections['pic']['loop'] = is_array($_loop=$this->_tpl_vars['pics']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pic']['name'] = 'pic';
$this->_sections['pic']['show'] = true;
$this->_sections['pic']['max'] = $this->_sections['pic']['loop'];
$this->_sections['pic']['step'] = 1;
$this->_sections['pic']['start'] = $this->_sections['pic']['step'] > 0 ? 0 : $this->_sections['pic']['loop']-1;
if ($this->_sections['pic']['show']) {
    $this->_sections['pic']['total'] = $this->_sections['pic']['loop'];
    if ($this->_sections['pic']['total'] == 0)
        $this->_sections['pic']['show'] = false;
} else
    $this->_sections['pic']['total'] = 0;
if ($this->_sections['pic']['show']):

            for ($this->_sections['pic']['index'] = $this->_sections['pic']['start'], $this->_sections['pic']['iteration'] = 1;
                 $this->_sections['pic']['iteration'] <= $this->_sections['pic']['total'];
                 $this->_sections['pic']['index'] += $this->_sections['pic']['step'], $this->_sections['pic']['iteration']++):
$this->_sections['pic']['rownum'] = $this->_sections['pic']['iteration'];
$this->_sections['pic']['index_prev'] = $this->_sections['pic']['index'] - $this->_sections['pic']['step'];
$this->_sections['pic']['index_next'] = $this->_sections['pic']['index'] + $this->_sections['pic']['step'];
$this->_sections['pic']['first']      = ($this->_sections['pic']['iteration'] == 1);
$this->_sections['pic']['last']       = ($this->_sections['pic']['iteration'] == $this->_sections['pic']['total']);
?>
		<?php $this->assign('id', $this->_tpl_vars['pics'][$this->_sections['pic']['index']]['id']); ?>
		<?php $this->assign('link_id', $this->_tpl_vars['pics'][$this->_sections['pic']['index']]['link_id']); ?>
		<div class="gallery-one" id="arrayorder_<?php echo $this->_tpl_vars['id']; ?>
">
			<div class="gallery-img">
				<a class="delete-picture" onclick="javascript:check('изображение', 'gallery-pics','delete_pic','portfolio.php','id=<?php echo $this->_tpl_vars['id']; ?>
&issue_id=<?php echo $this->_tpl_vars['issue_id']; ?>
');" title="удалить" >
					<img src='admin_img/delete.png' class="delete_button">
				</a>
				<img src='<?php echo $this->_tpl_vars['root'];  echo $this->_tpl_vars['pics'][$this->_sections['pic']['index']]['picture_sm']; ?>
'>
			</div>

			<div class="text_discr" id="text_discr<?php echo $this->_tpl_vars['pics'][$this->_sections['pic']['index']]['id']; ?>
">
				<div onclick="<?php echo smarty_function_ajax_update(array('update_id' => "text_discr".($this->_tpl_vars['id']),'function' => 'pic_edit','url' => "portfolio.php",'params' => "id=".($this->_tpl_vars['id'])."&pic_id=".($this->_tpl_vars['id'])."&table=pictures"), $this);?>
">
					<?php $this->assign('p', 0); ?>
					<?php unset($this->_sections['l']);
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
						<?php $this->assign('field', "name_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>
						<?php if ($this->_tpl_vars['p'] == 1): ?>/<?php endif; ?>
						<?php if ($this->_tpl_vars['pics'][$this->_sections['pic']['index']][$this->_tpl_vars['field']] == ''): ?> &mdash; <?php else:  echo $this->_tpl_vars['pics'][$this->_sections['pic']['index']][$this->_tpl_vars['field']];  endif; ?>
						<?php $this->assign('p', 1); ?>
					<?php endfor; endif; ?>
				</div>
			</div>
		</div>
	<?php endfor; endif; ?>
</div>