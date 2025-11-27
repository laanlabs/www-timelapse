		<!-- SIDEBAR -->
		<div id="sidebar" >
			
			<div style="padding-bottom:20px;padding-top:10px; padding-left:4px">
				<a href="http://bit.ly/iTimeLapse" target="_new"><img width="225" src="/images/app-store.png"/></a>
			</div>
			
			
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<div id="box" style="margin-left:auto;margin-right:auto;"><h2>Categories</h2><ul><?php wp_list_categories('title_li='); ?></ul></div>
			<?php endif; ?>
			
			
			<div id="box" style="margin-left:auto;margin-right:auto;"><h2>Links</h2><ul>
				<li><a href="http://labs.laan.com">Laan Labs</a></li>
				
				<</ul></div>
		
			
		</div>
		<!-- END SIDEBAR -->
