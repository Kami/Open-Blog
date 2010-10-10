<?php if ($this->navigation_library->get_navigation()): ?>
	<ul>
		<?php foreach ($this->navigation_library->get_navigation() as $navigation): ?>
			<li><a href="<?php echo ($navigation['external'] == 0) ? site_url($navigation['url']) : $navigation['url']; ?>" title="<?php echo $navigation['description']; ?>"><span><?php echo $navigation['title']; ?></span></a></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>	
<div class="clearer">&nbsp;</div>