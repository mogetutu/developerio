<?php

use Mockery as m;

class QueueSyncJobTest extends PHPUnit_Framework_TestCase {

	public function tearDown()
	{
		m::close();
	}


	public function testFireResolvesAndFiresJobClass()
	{
		$container = m::mock('Illuminate\Container\Container');
		$job = new Illuminate\Queue\Jobs\SyncJob($container, 'Foo', 'data');
		$handler = m::mock('StdClass');
		$container->shouldReceive('make')->once()->with('Foo')->andReturn($handler);
		$handler->shouldReceive('fire')->once()->with($job, 'data');

		$job->fire();
	}


	public function testFireResolvesAndFiresJobClassWithCorrectMethod()
	{
		$container = m::mock('Illuminate\Container\Container');
		$job = new Illuminate\Queue\Jobs\SyncJob($container, 'Foo@bar', 'data');
		$handler = m::mock('StdClass');
		$container->shouldReceive('make')->once()->with('Foo')->andReturn($handler);
		$handler->shouldReceive('bar')->once()->with($job, 'data');

		$job->fire();
	}

}