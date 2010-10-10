<? if ($this->navigation_library->get_navigation()): ?>
	<ul>
	<? foreach ($this->navigation_library->get_navigation() as $navigation): ?>
		<a href="<?=site_url($navigation['url']);?>" title="<?=$navigation['description'];?>"><?=$navigation['title'];?></a>
	<? endforeach; ?>
	</ul>
<? endif; ?>		