<?php foreach ($this->sidebar_library->sidebar as $item): ?>
	<?php $this->load->view('templates/natural_essence/layout/menu/' . $item['file']); ?>
<?php endforeach; ?>