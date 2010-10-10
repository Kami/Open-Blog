<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<feed>
	<title><?php echo $this->system_library->settings['blog_title']; ?></title>
	<subtitle><?php echo $this->system_library->settings['blog_description']; ?></subtitle>
	<link href="<?php echo base_url(); ?>"/>
	<updated><?php echo standard_date('DATE_ATOM', time()); ?></updated>
	
	<?php if ($posts): ?>
		<?php foreach ($posts as $post): ?>
		<entry>
			<title><?php echo $post['title']; ?></title>
		    <link rel="alternate" type="text/html" href="<?php echo base_url() . 'blog/post/' . date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/'; ?>" />
		    <link rel="service.edit" type="application/atom+xml" href="<?php echo base_url() . 'blog/post/' . date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/'; ?>" title="<?php echo $post['title']; ?>" />
		   	<published><?php echo standard_date('DATE_ATOM', strtotime($post['date_posted'])); ?></published>
		   
		   <summary><![CDATA[<?php echo strip_tags(word_limiter($post['excerpt'], 100)); ?>]]></summary>
		   <author>
		       <name><?php echo $post['display_name']; ?></name>
		   </author>
		   <content type="html" xml:lang="en" xml:base="<?php echo base_url(); ?>">
		        <![CDATA[<?php echo $post['excerpt']; ?>]]>
		   </content>
		</entry>
		<?php endforeach; ?>
	<?php endif; ?>

</feed>