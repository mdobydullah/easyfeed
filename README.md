<p align="center">
  <br>
  <a href="https://easyfeed.netlify.com">
    <img src="https://user-images.githubusercontent.com/13184472/69899322-8a9c3c00-138e-11ea-8d52-3b90869e7f16.png" width="90"/>
  </a>
</p>
<h1 align="center">EasyFeed</h1>
<h3 align="center">Create and Read RSS & Atom Feed</h3>
<p align="center">
EasyFeed is a simple PHP package to create and read RSS & Atom feed specially for Laravel
</p>

<p align="center">
  <a title="Latest Stable Version" href="https://packagist.org/packages/obydul/easyfeed">
    <img src="https://poser.pugx.org/obydul/easyfeed/v/stable">
  </a>
  <a title="Latest Stable Version" href="https://packagist.org/packages/obydul/easyfeed">
    <img src="https://poser.pugx.org/obydul/easyfeed/v/unstable">
  </a>
  <a title="PHP from Packagist" href="https://packagist.org/packages/obydul/easyfeed">
    <img src="https://img.shields.io/packagist/php-v/obydul/easyfeed">
  </a>
  <a title="License" href="LICENSE">
    <img src="https://poser.pugx.org/obydul/easyfeed/license">
  </a>
  <a title="Follow on Twitter" href="https://twitter.com/obydulsa">
    <img src="https://img.shields.io/twitter/follow/obydulsa?label=Follow&style=social">
  </a>
  <br>
  <br>
</p>

> This project is under active development. Any feedback or contributions would be appreciated.

## Quick Start

To install this package run the Composer command

```
composer require obydul/easyfeed
```

For Laravel 5.5 and above this package supports [Laravel Auto-Discovery](https://laravel.com/docs/master/packages#package-discovery) and will be discovered automatically.


For Laravel versions prior to 5.5 follow next guide:

In your `config/app.php` add following:

```php
'providers' => [
    ...
    Obydul\EasyFeed\EasyFeedServiceProvider::class, // Add this line
[,

'aliases' => [
    ...
    'FeedRead' => Obydul\EasyFeed\Facades\FeedRead::class, // Add this line
],
```

## Get Started
Please read [our simple documentation](https://easyfeed.netlify.com) to get started.

## License
Licensed under the [MIT License](https://github.com/mdobydullah/easyfeed/blob/master/LICENSE).
