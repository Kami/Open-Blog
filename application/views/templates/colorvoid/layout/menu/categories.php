<div class="box">
	<div class="box_title"><?php echo lang('categories'); ?></div>
	<div class="box_body">
		<ul>
			<?php if ($this->categories_library->get_categories()): ?>
				<?php foreach ($this->categories_library->get_categories() as $category): ?>
					<li><a href="<?php echo site_url('/blog/category/' . $category['url_name']); ?>"> <?php echo $category['name']; ?></a> (<?php echo $category['posts_count']; ?>)</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
	<div class="box_bottom"></div>
</div>