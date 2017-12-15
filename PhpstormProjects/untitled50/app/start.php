<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require "vendor/autoload.php";
define('SITE_URL','http://www.jewish-store.com');
$paypal = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential('AbTJlQc_pLQHDfjGRnn5twpCMGsVXv7MuZ8GFHyWbo-y4aOxCTwHMx80Rikl564NNb4USlrOCPDMH5SZ',
        'ELMQLt_D8bpVmJ7mDLWWE-AC3pxUe5U0-1Z98wS20xT2lt66OaYgqDhtkiTKkgMBAC7wUJkn5jAIOGl4'

    )
);