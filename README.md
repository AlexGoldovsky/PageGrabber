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
After installing.
inside your php file, you need to require Composer's autoloader:
```
require 'vendor/autoload.php';
```

## Basic usage

Here is a simple example:
'''
$grabber = new \PageGraber\PageGrabber("https://blazemeter.com");
$title = $grabber->getTitle();
echo $title;
'''
Output:
'''
`JMeter, Load & Continuous Performance Testing Platform`
'''
## Left To-do
- Varify functionality of php built in functions used for url parsing and validation.
- Handle uncaught exceptions that might be thrown by Guzzle
- Handle possible errors that might be caused by DomDocument
- Allow calling new PageGrabber($url) directly
