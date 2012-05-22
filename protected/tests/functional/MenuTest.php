<?php

class MenuTest extends WebTestCase
{
	public $fixtures=array(
		'menus'=>'Menu',
	);

	public function testShow()
	{
		$this->open('?r=menu/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=menu/create');
	}

	public function testUpdate()
	{
		$this->open('?r=menu/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=menu/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=menu/index');
	}

	public function testAdmin()
	{
		$this->open('?r=menu/admin');
	}
}
