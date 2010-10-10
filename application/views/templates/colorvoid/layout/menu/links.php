<div class="box">
	<div class="box_title"><?php echo lang('links'); ?></div>
	<div class="box_body">
		<ul>
			<?php if ($this->links_library->get_links()): ?>
				<?php foreach ($this->links_library->get_links() as $link): ?>
					<li><a href="<?php echo $link['url']; ?>" title="<?php echo $link['description']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['name']; ?></a></li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</div>
	<div class="box_bottom"></div>
</div>