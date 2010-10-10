<div class="box">
	<div class="box_title"><?=lang('search');?></div>
	<div class="box_body">
		<? $this->load->view('templates/colorvoid/layout/menu/search'); ?>
	</div>
	<div class="box_bottom"></div>
</div>

<div class="box">
	<div class="box_title"><?=lang('archives');?></div>
	<div class="box_body">
		<ul>
			<? $this->load->view('templates/colorvoid/layout/menu/archive'); ?>
		</ul>
	</div>
	<div class="box_bottom"></div>
</div>

<div class="box">
	<div class="box_title"><?=lang('categories');?></div>
	<div class="box_body">
		<ul>
			<? $this->load->view('templates/colorvoid/layout/menu/categories'); ?>
		</ul>
	</div>
	<div class="box_bottom"></div>
</div>

<div class="box">
	<div class="box_title"><?=lang('feeds');?></div>
	<div class="box_body">
		<ul>
			<? $this->load->view('templates/colorvoid/layout/menu/feeds'); ?>
		</ul>
	</div>
	<div class="box_bottom"></div>
</div>
				
<div class="box">
	<div class="box_title"><?=lang('links');?></div>
	<div class="box_body">
		<ul>
			<? $this->load->view('templates/colorvoid/layout/menu/links'); ?>
		</ul>
	</div>
	<div class="box_bottom"></div>
</div>


<div class="box">
	<div class="box_title"><?=lang('other');?></div>
	<div class="box_body">
		<ul>
			<? $this->load->view('templates/colorvoid/layout/menu/other'); ?>
		</ul>
	</div>
	<div class="box_bottom"></div>
</div>