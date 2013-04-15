<?php namespace Illuminate\Queue\Connectors;

use IronMQ;
use Illuminate\Queue\IronQueue;

class IronConnector implements ConnectorInterface {

	/**
	 * Establish a queue connection.
	 *
	 * @param  array  $config
	 * @return \Illuminate\Queue\QueueInterface
	 */
	public function connect(array $config)
	{
		$ironConfig = array('token' => $config['token'], 'project_id' => $config['project']);

		return new IronQueue(new IronMQ($ironConfig), $config['queue']);
	}

}