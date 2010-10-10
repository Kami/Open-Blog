<?='<?xml version="1.0" encoding="utf-8"?>';?>

<feed>
	<title><?=$this->system->settings['blog_title'];?></title>
	<subtitle><?=$this->system->settings['blog_description'];?></subtitle>
	<link href="<?=base_url();?>"/>
	<updated><?=standard_date('DATE_ATOM', time())?></updated>
	
	<? if ($posts): ?>
		<? foreach($posts as $post): ?>
		<entry>
			<title><?=$post['title'];?></title>
		    <link rel="alternate" type="text/html" href="<?=base_url() . 'blog/post/' . date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/';?>" />
		    <link rel="service.edit" type="application/atom+xml" href="<?=base_url() . 'blog/post/' . date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/';?>" title="<?=$post['title'];?>" />
		   	<published><?=standard_date('DATE_ATOM', strtotime($post['date_posted']));?></published>
		   
		   <summary><![CDATA[<?=strip_tags(word_limiter($post['excerpt'], 100));?>]]></summary>
		   <author>
		       <name><?=$post['display_name'];?></name>
		   </author>
		   <content type="html" xml:lang="en" xml:base="<?=base_url();?>">
		        <![CDATA[<?=$post['excerpt'];?>]]>
		   </content>
		</entry>
		<? endforeach; ?>
	<? endif; ?>

</feed>