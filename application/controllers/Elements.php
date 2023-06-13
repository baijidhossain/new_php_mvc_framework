<?php

class Elements extends Controller
{

	public function Index()
	{

		$this->data['page_title'] = 'Elements';

		$this->view = 'elements/index';

		$this->response();
	}
}
