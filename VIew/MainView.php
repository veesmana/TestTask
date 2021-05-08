<?php
require_once './Core/View.php';
class MainView extends View
{
	function generate($content_view, $template_view)
	{
		include $template_view;
	}
}
?>