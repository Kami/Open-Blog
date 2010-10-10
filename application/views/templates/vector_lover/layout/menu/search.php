<h3><?php echo lang('search'); ?></h3>	
			
<form id="qsearch" action="<?php echo site_url('search'); ?>" method="post" >
	<p>
		<label for="qsearch">Search:</label>
		<input class="tbox" type="text" value="" name="term" id="term" />
		<input class="btn" type="image" name="searchsubmit" title="Search" src="<?php echo base_url(); ?>application/views/templates/vector_lover/static/images/search.gif" />
	</p>
</form>