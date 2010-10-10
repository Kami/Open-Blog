<?php foreach ($this->sidebar_library->sidebar as $item): ?>
	<?php $this->load->view('templates/emplode/layout/menu/' . $item['file']); ?>
<?php endforeach; ?>