<?php
/**
 * Created by PhpStorm.
 * User: Ron
 * Date: 2014-10-29
 * Time: 01:03 AM
 */
Event::listen('PayFast.*', 'PayFast\Listeners\EmailNotifier');