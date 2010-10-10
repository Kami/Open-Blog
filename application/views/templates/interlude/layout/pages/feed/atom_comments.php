<?='<?xml version="1.0" encoding="utf-8"?>';?>

<feed>
	<title><?=lang('comments_for');?> <?=$this->system->settings['blog_title'];?></title>
	<subtitle><?=$this->system->settings['blog_description'];?></subtitle>
	<link href="<?=base_url();?>"/>
	<updated><?=standard_date('DATE_ATOM', time())?></updated>
	
	<? if ($comments): ?>
		<? foreach($comments as $comment): ?>
		<entry>
			<title><?=lang('comment_on') . $comment['title'] . lang('comment_by') . $comment['author'];?></title>
		    <link rel="alternate" type="text/html" href="<?=base_url() . 'blog/post/' . date('Y', strtotime($comment['date_posted'])) . '/' . date('m', strtotime($comment['date_posted'])) . '/' . date('d', strtotime($comment['date_posted'])) . '/' . $comment['url_title']  . '/#comment-' . $comment['id'];?>" />
		    <link rel="service.edit" type="application/atom+xml" href="<?=base_url() . 'blog/post/' . date('Y', strtotime($comment['date_posted'])) . '/' . date('m', strtotime($comment['date_posted'])) . '/' . date('d', strtotime($comment['date_posted'])) . '/' . $comment['url_title']  . '/#comment-' . $comment['id'];?>" />
		   	<published><?=standard_date('DATE_ATOM', strtotime($comment['date']));?></published>
		   
		   <summary><![CDATA[<?=strip_tags(word_limiter($comment['content'], 100));?>]]></summary>
		   <author>
		       <name><?=$comment['author'];?></name>
		   </author>
		   <content type="html" xml:lang="en" xml:base="<?=base_url();?>">
		        <![CDATA[<?=$comment['content'];?>]]>
		   </content>
		</entry>
		<? endforeach; ?>
	<? endif; ?>

</feed>