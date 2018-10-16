Library to communicate with [CarrotQuest](https://carrotquest.io) service
====


Requirements
------------
 - PHP 7.1+


Installation
------------
Add the following to the `require` section in your `composer.json` manually:

```json
"professionalweb/carrot-quest-laravel": "dev-master"
```
Run `composer update` afterwards.

Or just execute
```bash
composer require professionalweb/carrot-quest-laravel
```


Initialization
--------------

## config/carrot-quest.php
```php
<?php

return [
    'url'           => 'https://api.carrotquest.io/v1',
    'auth_token'    => '%auth_token%',
];
```