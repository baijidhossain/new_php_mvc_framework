<?php

class Home extends Controller {
    public function Index() {       

		$this->data['page_title'] = 'Dashboard';

		$this->view = 'Home';

		$this->response();
	}

}