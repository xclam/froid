<?php

namespace App\Providers;

use App\Services\HtmlBuilder;
use App\Services\FormBuilder;

class HtmlServiceProvider extends \Collective\Html\HtmlServiceProvider
{
     /**
     * Register the form builder instance.
     */
    protected function registerFormBuilder()
    {
        $this->app->bind('form', function($app)
        {
            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->token());

            return $form->setSessionStore($app['session.store']);
        }, true);
    }

    /**
     * Register the html builder instance.
     */
    protected function registerHtmlBuilder()
    {
        $this->app->bind('html', function($app)
        {
            return new HtmlBuilder($app['url'], $app['view']);
        }, true);
    }
}
