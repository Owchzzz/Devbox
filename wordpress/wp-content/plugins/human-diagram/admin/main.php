<div class="wrap">
	<h2>
		The Human Diagram
	</h2>
	
	<div class="postbox" style="padding:15px;line-height:1;">
		Thank you for installing the human diagram. Create an accurate diagram for your site. <br/>
		To use the human diagram simply add in the shortcode <b>[tc_human_diagram]</b> To any page in your site.
	</div>
	
	<div class="diagram-container">
		<div class="header">
				<h2>
					The Diagram Editor.
				</h2>
			</div>
		
		<img class="img-diagram" id="img-diagram" src="<?php echo HUMANDIAG_PLUGIN_PATH;?>assets/images/human-body.png"/>	
		
		<div class="diagram-box" id="content_box_1" data-target="content_box_1_details" data-id="1">
			<a href=""><h1>
				Non Invasive Diagnosis and Monitoring
			</h1>
			</a>
		</div>
		
		<div class="diagram-box" id="content_box_2" data-target="content_box_2_details" data-id="2">
			<a href="#"><h1>
				Cure
			</h1>
				</a>
		</div>
		
		<div class="diagram-box" id="content_box_3" data-target="content_box_3_details" data-id="3">
			<a href="#"><h1>
				Early Cancer Detection
			</h1>
			</a>
		</div>
		
		<div class="diagram-box" id="content_box_4" data-target="content_box_4_details" data-id="4" data-location="top">
			<a href="#"><h1>
				To Understand Heritability
			</h1>
			</a>
		</div>
		
		<div class="diagram-box" id="content_box_5" data-target="content_box_5_details" data-id="5" data-location="top">
			<a href="#"><h1>
				To be involved
			</h1>
			</a>
		</div>
		
		
		<!--Content Boxes-->
		<?php 
			for($i=0;$i < 5; $i++) {
				$data = $diag_data[$i];
				$num = $i+1;
				echo '<div class="diagram-box" id="content_box_'+$num+'details">';
				echo '<h3>'.$data['title'].'</h3>';
				echo '<p>'.$data['details'].'</p></div>';
			}

		?>
	
</div>


<!--Control Templates-->
<div class="hidden-div" id="placeholder-box-left">
	<button class="ui-btn-set" onclick="rascript.setoptLeft();">
		Set Content Box to Left
	</button>
</div>

<!--Control Templates-->
<div class="hidden-div" id="placeholder-box-right">
	<button class="ui-btn-set" onclick="rascript.setoptRight();">
		Set Content Box to Right
	</button>
</div>


<!--Editor Option-->
<div class="edit-cbox">
	<div class="contents">
		<h4>
			Edit Contents <i class="icon ion-close exit-btn"></i>
		</h4>
		
		<form id="cboxedit" method="post" action="<?php echo admin_url('admin.php?page='.$_REQUEST['page']);?>&action=save">
			<input type="hidden" name="action" id="action" value="save"/>
			<?php wp_nonce_field('save_humandiagram','save_humandiagram');?>
			<input type="hidden" name="id" id="id"/>
			<label>Title</label><input class="widefat" id="title" name="title" placeholder = "Title"/>
			<label>Page URL:</label><input class="widefat" id="page" name="page" placeholder="Full page url (http://www.wordpres.org)"/><br/>
			<label>Details:</label>
			<?php wp_editor('details','details');?>
			
			<input type="submit" value="save" style="float:right;margin-top:15px;margin-bottom:15px;";/>
		</form>
		<div style="clear:both;">

		</div>
	</div>
		
</div>
