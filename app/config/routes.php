<?php

/*
    Asatru PHP - routes configuration file

    Add here all your needed routes.

    Schema:
        [<url>, <method>, controller_file@controller_method]
    Example:
        [/my/route, get, mycontroller@index]
        [/my/route/with/{param1}/and/{param2}, get, mycontroller@another]
    Explanation:
        Will call index() in app\controller\mycontroller.php if request is 'get'
        Every route with $ prefix is a special route
*/

return [
    array('/', 'GET', 'index@index'),
    array('/projects/view/{slug}', 'GET', 'projects@view_project'),
    array('/blog/posts/fetch', 'ANY', 'blog@fetch'),
    array('/blog/posts/submit', 'GET', 'blog@view_submit'),
    array('/blog/posts/submit/preview', 'POST', 'blog@view_preview'),
    array('/blog/posts/submit', 'POST', 'blog@submit'),
    array('/blog/{slug}', 'GET', 'blog@view_post'),
    array('/shoutbox/query', 'GET', 'shoutbox@query'),
    array('/services/endpoints/list', 'ANY', 'services@endpoint_list'),
    array('/services/endpoints/quantity', 'ANY', 'services@endpoint_quantity'),
    array('/services/endpoints/status/specific', 'ANY', 'services@endpoint_status_specific'),
    array('/services/endpoints/status/all', 'ANY', 'services@endpoint_status_all'),
    array('/services/netaddr', 'ANY', 'services@netaddr'),
    array('/services/mcsrv', 'ANY', 'services@mcsrv'),
    array('/services/ko-fi/webhook', 'POST', 'services@kofi_webhook'),
    array('/sitemap', 'GET', 'index@sitemap'),
    array('$404', 'ANY', 'error404@index')
];
