<?php /* Smarty version 2.6.12, created on 2016-06-07 06:09:10
         compiled from drop_down_menue.tpl */ ?>
<?php $_from = $this->_tpl_vars['top_menue']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
	<div class="sub-menu <?php if ($this->_tpl_vars['item']['id'] == $this->_tpl_vars['page']['id']): ?>select<?php endif; ?>" id="menu<?php echo $this->_tpl_vars['item']['id']; ?>
">
		<h3><?php echo $this->_tpl_vars['item']['menue']; ?>
</h3>
		<div class="bgPhotos">
			<div class="scrollTop"></div>
			<div class="scrollWrapper">
			  <div class="scrollableArea">
					<?php if ($this->_tpl_vars['item']['array']['0'] != ''): ?>
						<?php $this->assign('s', 0); ?>
						<?php $_from = $this->_tpl_vars['item']['array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item2']):
?>
							<?php $this->assign('s', $this->_tpl_vars['s']+1); ?>
				      <div class="imgBlock" id="<?php echo $this->_tpl_vars['s']; ?>
">
								<A class="img" id="<?php echo $this->_tpl_vars['item2']['id']; ?>
" href="<?php if ($this->_tpl_vars['item']['array'][$this->_sections['item2']['index']]['symlink'] == 1): ?> <?php echo $this->_tpl_vars['item2']['link']; ?>
 <?php else: ?> page-<?php echo $this->_tpl_vars['item2']['id']; ?>
-<?php echo $this->_tpl_vars['lang']; ?>
.html<?php endif; ?>" title="<?php echo $this->_tpl_vars['item2']['title']; ?>
">
									<div class="bgPhoto"></div><img src="<?php echo $this->_tpl_vars['item2']['icon']; ?>
"/>
								</A>
								<div class="info right"><div><span><span class="title"><?php echo $this->_tpl_vars['item2']['menue']; ?>
</span><br/><br/><span class="desc"><?php echo $this->_tpl_vars['item2']['descr_page']; ?>
</span><br/><span class="kol"><?php echo $this->_tpl_vars['item2']['count']; ?>
 photos</span></span><br/><br/><?php echo $this->_tpl_vars['item2']['data_album']; ?>
</div></div>
				      </div>
						<?php endforeach; endif; unset($_from); ?>

					<?php endif; ?>
			  </div>
			</div>
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>