<?php

$route['blog/page/(:num)'] = 'blog/index/$1';
$route['post/(:any)'] = 'blog/post/$1';
$route['archive/(:any)'] = 'blog/archive/$1';
$route['category/(:any)'] = 'blog/category/$1';

/* End of file blog_routes.php */
/* Location: ./application/modules/blog/blog_routes.php */