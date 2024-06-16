<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Hello;

$hello = new Hello();

// Do not modify code below
require 'view.php';
use CowSay\Cow;

$bessie = new Cow('Hello, Farm!');
$bessie = new Cow('Hello, Farm!');
$bessie->setEyes('oO')
    ->setTongue('U')
    ->setPoop('@@@')
    ->setUdder('W');
// echo $bessie;

// store the output in a variable
//<pre> tag is used to define preformatted text
// use the pre tag to preserve the whitespace and line breaks in the output
$output = $bessie->say();
echo '<pre class="cow-say">' . $output . '</pre>';


