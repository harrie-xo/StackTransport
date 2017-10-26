<?php

namespace App\Component\Packages\StackTransport;

use App\Component\Providers\ServiceProviders\ServiceProvidersFactory as ServiceProviders;

class StackTransportServiceProvider extends ServiceProviders
{
	/**
	 * 
	 * Illuminating all instance that has definied/registered before
	 * to the all controller class
	 * you'll be able to use instance of any class with $this->auth and etcetera...
	 * 
	 * @return instance object
	 * 
	 */
	public function boot()
	{
		$this->boot = [
			'stack'	    => $this->getProvider('stack')
		];
	}

	public function register()
	{
		$this->set([ 'stack'	=> __DIR__."/routers.php" ]);
	}
}
