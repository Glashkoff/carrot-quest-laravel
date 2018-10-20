Library to communicate with [CarrotQuest](https://carrotquest.io) service
====


Requirements
------------
 - PHP 7.1+
 - [Laravel](https://laravel.com) 5.*


Installation
------------
Add the following to the `require` section in your `composer.json` manually:

```json
"professionalweb/carrot-quest-laravel": "^1.0"
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

Example
-------
```php
...
use professionalweb\CarrotQuest\Interfaces\Services\CarrotQuestService;
...
public function createUser(CarrotQuestService $service):void
{
    // Get user model
    // Create if not exists
    $carrotUser = $service
        ->users()
        ->setUserId(13)
        ->user()
        ->byUserId()
        ->get();
}
...
```

The MIT License (MIT)
---------------------

Copyright (c) 2018 Sergey Zinchenko, [Professional web](http://web-development.pw)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.