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
    array('/blog/posts/fetch', 'ANY', 'blog@fetch'),
    array('/blog/posts/submit', 'GET', 'blog@view_submit'),
    array('/blog/posts/submit/preview', 'POST', 'blog@view_preview'),
    array('/blog/posts/submit', 'POST', 'blog@submit'),
    array('/blog/{slug}', 'GET', 'blog@view_post'),
    array('/blog', 'GET', 'blog@view_list'),
    array('/shoutbox/query', 'GET', 'shoutbox@query'),
    array('/services/netaddr', 'ANY', 'services@netaddr'),
    array('/services/mcsrv', 'ANY', 'services@mcsrv'),
    array('/sitemap', 'GET', 'index@sitemap'),
    array('$404', 'ANY', 'error404@index')
];
