<h2><?php echo lang('archives'); ?></h2>
<ul class="block">
	<?php if ($this->archive_library->get_archive()): ?>
		<?php foreach ($this->archive_library->get_archive() as $archive): ?>
			<li><a href="<?php echo site_url('/blog/archive/' . $archive['url']); ?>"><?php echo $archive['date_posted']; ?> (<?php echo $archive['posts_count']; ?>)</a></li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>