{literal}
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
			  jQuery("#gallery-list").sortable({ opacity: 0.8, cursor: 'move', update:
		      function() {
		      	jQuery("#response").html('Load').show();
		      	var order = jQuery(this).sortable("serialize") + '&update=order';
		      	console.log(order);
		      	//console.log(jQuery(this).sortable("serialize"));
		      	jQuery.post("portfolio.php", order, function(theResponse){
		      	 	jQuery("#response").html('Finish');

		  				// jQuery("#response").html(theResponse);
		  				// jQuery("#response").slideDown('slow');
		  			});
				  }
				});
			});
		});
	</script>
{/literal}

<div id="response"> </div>

<div id="gallery-list">
	{assign var=i value=-1}
	{section loop=$pics name=pic}
		{assign var=id value=$pics[pic].id}
		{assign var=link_id value=$pics[pic].link_id}
		<div class="gallery-one" id="arrayorder_{$id}">
			<div class="gallery-img">
				<a class="delete-picture" onclick="javascript:check('изображение', 'gallery-pics','delete_pic','portfolio.php','id={$id}&issue_id={$issue_id}');" title="удалить" >
					<img src='admin_img/delete.png' class="delete_button">
				</a>
				<img src='{$root}{$pics[pic].picture_sm}'>
			</div>

			<div class="text_discr" id="text_discr{$pics[pic].id}">
				<div onclick="{ajax_update update_id=text_discr$id function="pic_edit" url="portfolio.php" params="id=$id&pic_id=$id&table=pictures"}">
					{assign var=p value=0}
					{section loop=$langs name=l}
						{assign var=field value=name_$langs[l]}
						{if $p==1}/{/if}
						{if $pics[pic].$field==''} &mdash; {else}{$pics[pic].$field}{/if}
						{assign var=p value=1}
					{/section}
				</div>
			</div>
		</div>
	{/section}
</div>
