<h3><?php echo lang('categories'); ?></h3>

<ul class="sidemenu">
	<?php if (($categories = $this->categories_library->get_categories())): ?>
		<?php foreach ($categories as $category): ?>
			<li><a href="<?php echo category_url($category['url_name']); ?>"> <?php echo $category['name']; ?></a> (<?php echo $category['posts_count']; ?>)</li>
		<?php endforeach; ?>
	<?php endif; ?>		
</ul>