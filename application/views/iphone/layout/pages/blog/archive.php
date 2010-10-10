<ul selected="true">
    <li class="group"><?php echo lang('archives'); ?></li>
    	<?php foreach ($posts as $post): ?>
	        <li>
	        <a href="<?php echo post_url($post['url_title'], $post['date_posted']); ?>"><?php echo $post['title']; ?></a>
	        </li>
		<?php endforeach; ?>
</ul>
	