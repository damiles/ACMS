<?php

class FileTest extends WebTestCase
{
	public $fixtures=array(
		'files'=>'File',
	);

	public function testShow()
	{
		$this->open('?r=file/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=file/create');
	}

	public function testUpdate()
	{
		$this->open('?r=file/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=file/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=file/index');
	}

	public function testAdmin()
	{
		$this->open('?r=file/admin');
	}
}
