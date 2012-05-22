<?php

class RolTest extends WebTestCase
{
	public $fixtures=array(
		'rols'=>'Rol',
	);

	public function testShow()
	{
		$this->open('?r=rol/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=rol/create');
	}

	public function testUpdate()
	{
		$this->open('?r=rol/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=rol/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=rol/index');
	}

	public function testAdmin()
	{
		$this->open('?r=rol/admin');
	}
}
