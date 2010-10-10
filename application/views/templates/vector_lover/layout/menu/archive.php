<h3><?php echo lang('archives'); ?></h3>

<ul class="sidemenu">
	<?php if ($this->archive_library->get_archive()): ?>
		<?php foreach ($this->archive_library->get_archive() as $archive): ?>
			<li><a href="<?php echo site_url('/blog/archive/' . $archive['url']); ?>"><?php echo $archive['date_posted']; ?></a> (<?php echo $archive['posts_count']; ?>)</li>
		<?php endforeach; ?>
	<?php endif; ?>			
</ul>