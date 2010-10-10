<?php if (($navigation = $this->navigation_library->get_navigation())): ?>
	<?php foreach ($navigation as $navigation_item): ?>
		<a href="<?php echo ($navigation_item['external'] == 0) ? site_url($navigation_item['url']) : $navigation_item['url']; ?>" title="<?php echo $navigation_item['description']; ?>"><?php echo $navigation_item['title']; ?></a>
	<?php endforeach; ?>
<?php endif; ?>		