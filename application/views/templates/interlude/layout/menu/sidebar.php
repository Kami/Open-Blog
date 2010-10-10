<ul>
	<li>
		<h2><?=lang('search');?></h2>
		<ul>
			<? $this->load->view('templates/interlude/layout/menu/search'); ?>
		</ul>
	</li>
	
	<li>
		<h2><?=lang('archives');?></h2>
		<ul>
			<? $this->load->view('templates/interlude/layout/menu/archive'); ?>
		</ul>
	</li>
	
	<li>
		<h2><?=lang('categories');?></h2>
		<ul>
			<? $this->load->view('templates/interlude/layout/menu/categories'); ?>
		</ul>
	</li>
	
	<li>
		<h2><?=lang('feeds');?></h2>
		<ul>
			<? $this->load->view('templates/interlude/layout/menu/feeds'); ?>
		</ul>
	</li>
	
	<li>
		<h2><?=lang('links');?></h2>
		<ul>
			<? $this->load->view('templates/interlude/layout/menu/links'); ?>
		</ul>
	</li>
	
	<li>
		<h2><?=lang('other');?></h2>
		<ul>
			<? $this->load->view('templates/interlude/layout/menu/other'); ?>
		</ul>
	</li>
</ul>