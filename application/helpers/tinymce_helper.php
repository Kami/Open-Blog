<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function initialize_tinymce()
{
	$tinymce = '
		<!-- TinyMCE -->
		<script type="text/javascript" src="' . base_url() . 'application/views/admin/static/javascript/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				// General options
				mode : "textareas",
				theme : "advanced",
				plugins : "emotions",
				relative_urls : false,
				remove_script_host : false,
				document_base_url : "' . base_url() . '",
				theme_advanced_buttons3_add : "emotions",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_buttons1 : "bold, italic, underline, strikethrough, justifyleft, justifycenter, justifyright, justifyfull, bullist, numlist, link, unlink, emotions",
				theme_advanced_buttons2: "",
				theme_advanced_buttons3 : ""	
			});
		</script>
		<!-- /TinyMCE -->
		';
	
	return $tinymce;
}

/* End of file tinymce_helper.php */
/* Location: ./application/helpers/tinymce_helper.php */