<?php

class TasklistsControllerTest extends TestCase {
	public function testIndex()
	{
		$response = $this->call('GET', 'tasklists');
		$this->assertTrue($response->isOk());
	}

	public function testShow()
	{
		$response = $this->call('GET', 'tasklists/1');
		$this->assertTrue($response->isOk());
	}

	public function testCreate()
	{
		$response = $this->call('GET', 'tasklists/create');
		$this->assertTrue($response->isOk());
	}

	public function testEdit()
	{
		$response = $this->call('GET', 'tasklists/1/edit');
		$this->assertTrue($response->isOk());
	}
}
