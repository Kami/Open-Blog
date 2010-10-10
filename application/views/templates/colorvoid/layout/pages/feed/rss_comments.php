<?='<?xml version="1.0" encoding="utf-8"?>';?>

<rss version="2.0"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/">

	<channel>
		<title><?=lang('comments_for');?> <?=$this->system->settings['blog_title'];?></title>
	    <link><?=base_url();?></link>
	    <description><?=$this->system->settings['blog_description'];?></description>
	    <pubDate><?=standard_date('DATE_RSS', time());?></pubDate>
	    <language><?=$this->system->settings['language'];?></language>
	    <docs>http://blogs.law.harvard.edu/tech/rss</docs>
	
	    <dc:rights>Copyright <?=gmdate('Y', time());?></dc:rights>
	    
	    <? if ($comments): ?>
		    <? foreach($comments as $comment): ?>
		    <item>
				<title><?=xml_convert(lang('comment_on') . $comment['title'] . lang('comment_by') . $comment['author']);?></title>
				<link><?=base_url() . 'blog/post/' . date('Y', strtotime($comment['date_posted'])) . '/' . date('m', strtotime($comment['date_posted'])) . '/' . date('d', strtotime($comment['date_posted'])) . '/' . $comment['url_title']  . '/#comment-' . $comment['id'];?></link>
				<guid><?=base_url() . 'blog/post/' . date('Y', strtotime($comment['date_posted'])) . '/' . date('m', strtotime($comment['date_posted'])) . '/' . date('d', strtotime($comment['date_posted'])) . '/' . $comment['url_title']  . '/#comment-' . $comment['id'];?></guid>
				<description><![CDATA[
				<?=$comment['content'];?>
		      	]]>
		      	</description>
				<pubDate><?=standard_date('DATE_RSS', strtotime($comment['date']));?></pubDate>
		     </item>
		    <? endforeach; ?>
	    <? endif; ?>
	    
	</channel>
</rss> 