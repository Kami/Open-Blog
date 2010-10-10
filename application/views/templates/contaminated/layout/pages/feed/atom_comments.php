<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<feed>
	<title><?php echo lang('comments_for'); ?> <?php echo $this->system_library->settings['blog_title']; ?></title>
	<subtitle><?php echo $this->system_library->settings['blog_description']; ?></subtitle>
	<link href="<?php echo base_url(); ?>"/>
	<updated><?php echo standard_date('DATE_ATOM', time())?></updated>
	
	<?php if ($comments): ?>
		<?php foreach($comments as $comment): ?>
		<entry>
			<title><?php echo lang('comment_on') . $comment['title'] . ' ' . lang('comment_by') . ' ' . $comment['author']; ?></title>
		    <link rel="alternate" type="text/html" href="<?php echo base_url() . 'blog/post/' . date('Y', strtotime($comment['date_posted'])) . '/' . date('m', strtotime($comment['date_posted'])) . '/' . date('d', strtotime($comment['date_posted'])) . '/' . $comment['url_title']  . '/#comment-' . $comment['id']; ?>" />
		    <link rel="service.edit" type="application/atom+xml" href="<?php echo base_url() . 'blog/post/' . date('Y', strtotime($comment['date_posted'])) . '/' . date('m', strtotime($comment['date_posted'])) . '/' . date('d', strtotime($comment['date_posted'])) . '/' . $comment['url_title']  . '/#comment-' . $comment['id']; ?>" />
		   	<published><?php echo standard_date('DATE_ATOM', strtotime($comment['date'])); ?></published>
		   
		   <summary><![CDATA[<?php echo strip_tags(word_limiter($comment['content'], 100)); ?>]]></summary>
		   <author>
		       <name><?php echo $comment['author']; ?></name>
		   </author>
		   <content type="html" xml:lang="en" xml:base="<?php echo base_url(); ?>">
		        <![CDATA[<?php echo $comment['content']; ?>]]>
		   </content>
		</entry>
		<?php endforeach; ?>
	<?php endif; ?>
</feed>