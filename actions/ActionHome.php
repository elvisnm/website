<?php
/**
 * Action usada em para a página Home
 * @author Elvis Moreira
 * @version 1.0
 * @date 05-08-2011
 */
 
class ActionHome{

	public function access($page, Smarty $template) {		
		$template->display($page);
 	}
	
	public function get ($page, Smarty $template, Array $get) {
		$this->access($page, $template); 
 	}

	public function post ($page, Smarty $template, Array $post) {
		$this->access($page, $template);
 	}
}
?>