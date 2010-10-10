<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>

<rss version="2.0"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/">
	<channel>
		<title><?php echo $this->system_library->settings['blog_title']; ?></title>
	    <link><?php echo base_url(); ?></link>
	    <description><?php echo $this->system_library->settings['blog_description']; ?></description>
	    <pubDate><?php echo standard_date('DATE_RSS', time()); ?></pubDate>
	    <language><?php echo $this->system_library->settings['language']; ?></language>
	    <docs>http://blogs.law.harvard.edu/tech/rss</docs>
	
	    <dc:rights>Copyright <?php echo gmdate('Y', time()); ?></dc:rights>
	    
	    <?php if ($posts): ?>
		    <? foreach($posts as $post): ?>
		    <item>
				<title><?php echo xml_convert($post['title']); ?></title>
				<link><?php echo base_url() . 'blog/post/' . date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/'; ?></link>
				<guid><?php echo base_url() . 'blog/post/' . date('Y', strtotime($post['date_posted'])) . '/' . date('m', strtotime($post['date_posted'])) . '/' . date('d', strtotime($post['date_posted'])) . '/' . $post['url_title']  . '/'; ?></guid>
				<description><![CDATA[
				<?php echo $post['excerpt']; ?>
		      	]]>
		      	</description>
				<pubDate><?php echo standard_date('DATE_RSS', strtotime($post['date_posted'])); ?></pubDate>
		     </item>
		    <?php endforeach; ?>
	    <?php endif; ?>   
	</channel>
</rss> 