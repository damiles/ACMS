<?php

class ArticleTest extends WebTestCase
{
	public $fixtures=array(
		'articles'=>'Article',
	);

	public function testShow()
	{
		$this->open('?r=article/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=article/create');
	}

	public function testUpdate()
	{
		$this->open('?r=article/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=article/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=article/index');
	}

	public function testAdmin()
	{
		$this->open('?r=article/admin');
	}
}
