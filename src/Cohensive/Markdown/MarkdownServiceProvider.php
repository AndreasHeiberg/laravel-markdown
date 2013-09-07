<?php
namespace Cohensive\Markdown;

use Illuminate\Support\ServiceProvider;

class MarkdownServiceProvider extends ServiceProvider
{
	/*
	 * Bootstrap application events
   *
   * @return void
	 */
	public function boot()
	{
    $this->package('cohensive/markdown');
    // Register the package configuration with the loader.
    $this->app['config']->package('cohensive/markdown', __DIR__.'/../config');
	}

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
		$this->app['markdown'] = $this->app->share(function($app) {
			return new Factory($app);
		});
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return array('markdown');
  }
}
