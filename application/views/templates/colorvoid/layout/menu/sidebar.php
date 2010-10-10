<?php foreach ($this->sidebar_library->sidebar as $item): ?>
	<?php $this->load->view('templates/colorvoid/layout/menu/' . $item['file']); ?>
<?php endforeach; ?>