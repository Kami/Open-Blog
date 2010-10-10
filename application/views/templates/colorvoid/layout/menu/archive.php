<div class="box">
	<div class="box_title"><?php echo lang('archives'); ?></div>
	<div class="box_body">
		<ul>
			<?php if ($this->archive_library->get_archive()): ?>
				<?php foreach ($this->archive_library->get_archive() as $archive): ?>
					<li><a href="<?php echo site_url('/blog/archive/' . $archive['url']); ?>"><?php echo $archive['date_posted']; ?></a> (<?php echo $archive['posts_count']; ?>)</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
	<div class="box_bottom"></div>
</div>