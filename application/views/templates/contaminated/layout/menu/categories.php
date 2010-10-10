<? if ($this->categories_library->get_categories()): ?>
	<? foreach ($this->categories_library->get_categories() as $category): ?>
		<li><a href="<?=site_url('/blog/category/' . $category['url_name']);?>"> <?=$category['name'];?></a> (<?=$category['posts_count'];?>)</li>
	<? endforeach; ?>
<? endif; ?>