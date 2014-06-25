# DBAuth: Kohana Auth driver for Database authentication

Database-user Auth driver, used to authenticate as a user of the DBMS (rather
than a user whose credentials are stored in the database).

## Usage

To use, simply:

 - set `'driver' => 'db'` in the `APPPATH/config/auth.php` config file,
 - do not set the username or password in the`APPPATH/config/database.php`
   config file,
 - and make sure a valid database name is given in that latter file.

For example, a minimal `APPPATH/config/auth.php` looks like this:

	<?php
	return array(
		'driver' => 'DB'
	);

...and a minimal `APPPATH/config/database.php` could be this:

	<?php
	return array (
		'default' => array (
			'connection' => array(
				'hostname'   => 'db.example.net', // But usually 'localhost'
				'database'   => 'db_name_here',
			 ),
		),
	);

(Of course, if your host and database names match the defaults as given in
`MODPATH/database/config/database.php` then you don't need your own Database
config file at all.)

## Free and Open Source Software

The MIT License (MIT)

Copyright (c) 2014 Sam Wilson

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
