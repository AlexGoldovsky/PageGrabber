# PageGrabber ![Build status](https://img.shields.io/circleci/project/AlexGoldovsky/PageGrabber.svg)
PageGrabber is a Composer package the makes it easy to grab website's title.

## Installing PageGrabber
The recommended way to install PageGrabber is throught [Composer] (https://getcomposer.org/).

if you don't have Composer installed, you may install it via CLI, by typing
```
curl -sS https://getcomposer.org/installer | php
```
Next, run the Composer command to install PageGrabber:
```
composer require alexgoldovsky/page-grabber
```

## Usage

Here is a simple example:
```
<?php
require 'vendor/autoload.php';
use PageGrabber\PageGrabber;

$grabber = new PageGrabber("https://blazemeter.com");
$title = $grabber->getTitle();
echo $title;
```
Output:
```
JMeter, Load & Continuous Performance Testing Platform
```

## notes
1. PageGrabber validates input value as URL according to [RFC 2396] (http://www.faqs.org/rfcs/rfc2396.html)
