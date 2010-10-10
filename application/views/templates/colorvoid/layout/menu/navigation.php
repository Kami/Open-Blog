<ul>
	<? if ($this->navigation_library->get_navigation()): ?>
		<? foreach ($this->navigation_library->get_navigation() as $navigation): ?>
			<li><a href="<?=site_url($navigation['url']);?>" title="<?=$navigation['description'];?>"><span><?=$navigation['title'];?></span></a></li>
		<? endforeach; ?>
	<? endif; ?>		
</ul>

<div class="clearer">&nbsp;</div>