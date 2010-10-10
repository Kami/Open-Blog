<h2><?php echo lang('links'); ?></h2>
<ul class="block">
	<?php if (($links = $this->links_library->get_links())): ?>
		<?php foreach ($links as $link): ?>
			<li><a href="<?php echo $link['url']; ?>" title="<?php echo $link['description']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['name']; ?></a></li>
		<?php endforeach; ?>
	<?php endif; ?>
</ul>