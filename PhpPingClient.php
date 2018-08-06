<?php



namespace PingClient;



use Exception;



class PingClient

{

	private $host = null;

	private $port = null;

	private $timeout = null;

	

	function __construct($host = null, $port = null, $timeout = 30)

	{

		$this->setHost($host);

		$this->setPort($port);

		$this->setTimeout($timeout);

	}

	

	public function ping($host = null, $port = null, $timeout = 30)

	{

		if($host) {

			$this->setHost($host);

		}

		

		if($port) {

			$this->setPort($port);

		}

		

		$this->setTimeout($timeout);

		

		$host = $this->getHost();

		$port = $this->getPort();

		$timeout = $this->getTimeout();

		

		// throw exception when host was not set correctly

		if(!$host) {

			throw new Exception('Host not set.');

		}

		

		// establish socket connection & track timestamps

		$timeStart = microtime(true);

		$socket = fsockopen($host, $port, $errno, $errstr, $timeout);

		$timeEnd = microtime(true);

		

		// throw exception when something went wrong with socket connection

		if($socket === false) {

			throw new Exception($errstr);

		}

	

		return $timeEnd-$timeStart;

	}

	

	protected function setHost($host)

	{

		$this->host = $host;

	}

	

	protected function getHost()

	{

		return $this->host;

	}

	

	protected function setPort($port)

	{

		$this->port = $port;

	}

	

	protected function getPort()

	{

		return $this->port;

	}

	

	protected function setTimeout($timeout)

	{

		$this->timeout = $timeout;

	}

	

	protected function getTimeout()

	{

		return $this->timeout;

	}

}
