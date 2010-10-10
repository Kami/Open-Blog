<? if ($this->navigation_library->get_navigation()): ?>
	<? foreach ($this->navigation_library->get_navigation() as $navigation): ?>
		<a href="<?=site_url($navigation['url']);?>" title="<?=$navigation['description'];?>"><?=$navigation['title'];?></a>
	<? endforeach; ?>
<? endif; ?>		