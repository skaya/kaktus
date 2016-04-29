<?php /* Smarty version 2.6.12, created on 2015-11-24 01:02:57
         compiled from gallery.tpl */ ?>
<div id="fp_gallery">
	<div id="fp_exit" class="fp_exit"></div>
	<div id="fp_next" class="fp_next"></div>
	<div id="fp_prev" class="fp_prev"></div>
  <div id="fp_stop" class="fp_play"></div>
  <div id="fp_play" class="fp_play"></div>
	<img src="<?php echo $this->_tpl_vars['photo'][0]['picture_origin']; ?>
" alt="" class="fp_preview"/>
	<div id="outer_container">
		<div id="fp_thumbtoggle" class="fp_thumbtoggle"><span>&nbsp;</span></div>
		<div id="thumbScroller">
			<div class="content-wrapper">
			<div class="container">
				<?php unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['photo']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
					<div class="content">
						<div class="content-img">
						<a href="#">
							<div class="bgThamb"></div>
							<img src="<?php echo $this->_tpl_vars['photo'][$this->_sections['i']['index']]['picture_sm']; ?>
" alt="<?php echo $this->_tpl_vars['photo'][$this->_sections['i']['index']]['picture_origin']; ?>
" class="thumb" />
						</a>
						</div>
					</div>
        <?php endfor; endif; ?>
			</div>
			</div>
		</div>
	</div>
</div>