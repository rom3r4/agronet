<?php

set_time_limit(120);

/**
 * Uncomment these lines  to use MEMCACHE and VARNISH servers (if available in OS)
 */
 

/***

$conf['reverse_proxy'] = TRUE;
$conf['reverse_proxy_header'] = 'HTTP_X_CLUSTER_CLIENT_IP';
$conf['reverse_proxy_addresses'] = array('127.0.0.1');

// Memcache
$conf['cache_backends'][] = 'profiles/commons/modules/contrib/memcache/memcache.inc';
$conf['cache_default_class'] = 'MemCacheDrupal';
$conf['cache_class_cache_form'] = 'DrupalDatabaseCache';

// Varnish
$conf['cache_backends'][] = 'sites/all/modules/varnish/varnish.cache.inc';
$conf['cache_class_cache_page'] = 'VarnishCache';
// Drupal 7 does not cache pages when we invoke hooks during bootstrap.
// This needs to be disabled.
$conf['page_cache_invoke_hooks'] = FALSE;

// Memcache
// $conf['cache_backends'][] = 'sites/all/modules/memcache/memcache.inc';
// $conf['cache_default_class'] = 'MemCacheDrupal';
// $conf['cache_class_form'] = 'DrupalDatabaseCache';

// APC
$conf['cache_backends'][] = 'sites/all/modules/apc/drupal_apc_cache.inc';
$conf['cache_class_cache'] = 'DrupalAPCCache';
$conf['cache_class_cache_bootstrap'] = 'DrupalAPCCache';
//$conf['apc_show_debug'] = TRUE; // Remove the slashes to use debug mode.


// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE);


// Add Varnish as the page cache handler.
$conf['cache_backends'][] = 'sites/all/modules/varnish/varnish.cache.inc';
$conf['cache_class_cache_page'] = 'VarnishCache';
// Drupal 7 does not cache pages when we invoke hooks during bootstrap. This needs
// to be disabled.
$conf['page_cache_invoke_hooks'] = FALSE;

***/