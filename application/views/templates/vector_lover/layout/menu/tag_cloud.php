<h3><?php echo lang('tag_cloud'); ?></h3>
<div class="tags">	
	<?php if (($tags = $this->tags_library->get_tags())): ?>
		<?php foreach ($tags as $tag): ?>
			<a href="<?php echo tag_url($tag['name']); ?>"><span class="tag_<?php echo $this->tags_library->get_font_size($this->tags_library->get_maximum_usage_count(), $tag['usage_count']); ?>"><?php echo $tag['name']; ?></span></a>
		<?php endforeach; ?>
	<?php else: ?>
		<?php echo lang('no_tags'); ?>
	<?php endif; ?>
</div>