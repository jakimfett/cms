<?php

/**
 * Set the routes
 *
 * Each route must have a minimum of a name,
 * a URI and a set of defaults for the URI.
 *
 * Example:
 * ~~~
 * 	Route::set('frontend/page', 'page(/<action>)')
 * 		->defaults(array(
 * 			'controller' => 'page',
 * 			'action' => 'view',
 * 	));
 * ~~~
 *
 * @uses  Path::lookup
 * @uses  Route::cache
 * @uses  Route::set
 */
if (!Route::cache()) {
    Route::set('newsletter-subscribe', 'newsletter/subscribe')
            ->defaults(array(
                'controller' => 'newsletter',
                'action' => 'subscribe'
    ));

    Route::set('newsletter-unsubscribe', 'newsletter/unsubscribe')
            ->defaults(array(
                'controller' => 'newsletter',
                'action' => 'unsubscribe'
    ));

    Route::set('newsletter-list', 'newsletter/list')
            ->defaults(array(
                'controller' => 'newsletter',
                'action' => 'list'
    ));

    Route::set('page-home', 'index(/<template>)')
            ->defaults(array(
                'controller' => 'pages',
                'action' => 'index'
    ));

    Route::set('default', '(<controller>(/<action>(/<id>)))')
            ->filter('Path::lookup')
            ->defaults(array(
                'controller' => 'welcome',
                'action' => 'index',
    ));
    // Cache the routes in production
    Route::cache(Kohana::$environment === Kohana::PRODUCTION);
}