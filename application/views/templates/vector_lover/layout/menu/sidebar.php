<?php foreach ($this->sidebar_library->sidebar as $item): ?>
	<?php $this->load->view('templates/vector_lover/layout/menu/' . $item['file']); ?>
<?php endforeach; ?>