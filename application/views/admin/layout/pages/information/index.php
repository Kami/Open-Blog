<div class="post">
		<div class="post_title">
			<h1><?php echo lang('information'); ?></h1>
		</div>
		<div class="post_body">
			<p><?php echo lang('information_description'); ?></p>
			<p>
				<?php echo lang('version'); ?> Open Blog <strong><?php echo $version; ?></strong> (<a href="<?php echo site_url('admin/information/upgrade_check'); ?>"><?php echo lang('check_for_upgrades'); ?></a>)<br />
				<?php echo lang('author'); ?> <a href="mailto:<?php echo $author_email; ?>"><?php echo $author; ?></a><br />
				<?php echo lang('official_website'); ?> <a href="<?php echo $website_url; ?>" target="_blank"><?php echo $website_url; ?></a><br />
				<?php echo lang('documentation'); ?> <a href="<?php echo $documentation_url; ?>" target="_blank"><?php echo $documentation_url; ?></a><br />
				<?php echo lang('bugtracker'); ?> <a href="<?php echo $bugtracker_url; ?>" target="_blank"><?php echo $bugtracker_url; ?></a>
			</p>
		</div>
</div>