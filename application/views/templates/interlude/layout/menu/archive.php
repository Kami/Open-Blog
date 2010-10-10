<? if ($this->archive_library->get_archive()): ?>
	<? foreach ($this->archive_library->get_archive() as $archive): ?>
		<li><a href="<?=site_url('/blog/archive/' . $archive['url']);?>"><?=$archive['date_posted'];?></a> (<?=$archive['posts_count'];?>)</li>
	<? endforeach; ?>
<? endif; ?>