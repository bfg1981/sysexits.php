sysexits.php
============

PHP port of sysexits.h


Installation
============

composer.json:

    {
      "repositories": [
        {"type": "vcs", "url": "https://github.com/sdj/sysexits.php"}
      ],
      "requre" : {
        "sdj/sysexits.php": "dev-master"
      }
    }


Usage
=====

    <?php
    require 'vendor/autoload.php';
    use sdj\Sysexits;
    Sysexits::do_exit('ok');

