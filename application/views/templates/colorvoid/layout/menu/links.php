<? if ($this->links_library->get_links()): ?>
	<? foreach ($this->links_library->get_links() as $link): ?>
		<li><a href="<?=$link['url'];?>" title="<?=$link['description'];?>" target="<?=$link['target'];?>"><?=$link['name'];?></a></li>
	<? endforeach; ?>
<? endif; ?>