<?php

class TypeTest extends WebTestCase
{
	public $fixtures=array(
		'types'=>'Type',
	);

	public function testShow()
	{
		$this->open('?r=type/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=type/create');
	}

	public function testUpdate()
	{
		$this->open('?r=type/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=type/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=type/index');
	}

	public function testAdmin()
	{
		$this->open('?r=type/admin');
	}
}
