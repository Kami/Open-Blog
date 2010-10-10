<div class="box">
	<div class="box_title"><?php echo lang('archives');?></div>
	<div class="box_content">
		<ul>
			<?php if ($this->archive_library->get_archive()): ?>
				<?php foreach ($this->archive_library->get_archive() as $archive): ?>
					<li><a href="<?php echo site_url('/blog/archive/' . $archive['url']); ?>"><?php echo $archive['date_posted']; ?> (<?php echo $archive['posts_count']; ?>)</a></li>
				<?php endforeach; ?>
			<? endif; ?>
		</ul>
	</div>
</div>