# CustomerPanel
Host your own authentication customer dashboard.

Leave me a star that motivates me to make more things like this❤️🙏🏽

###### Requirements: 
```
KeyAuth Seller Plan / Subscription - Upgrade at https://keyauth.cc/dashboard/upgrade/
```


[![Screenshot](https://cdn.discordapp.com/attachments/1094772945664098335/1106698081325555844/ByChangeGame.gif)](https://discordapp.com/users/1094988511783964843)

## Copyright License

CustomerPanel is licensed under **Elastic License 2.0**

* You may not provide the software to third parties as a hosted or managed
service, where the service provides users with access to any substantial set of
the features or functionality of the software.

* You may not move, change, disable, or circumvent the license key functionality
in the software, and you may not remove or obscure any functionality in the
software that is protected by the license key.

* You may not alter, remove, or obscure any licensing, copyright, or other notices
of the licensor in the software. Any use of the licensor’s trademarks is subject
to applicable law.

# Getting Started
To connect it to keyauth open folder inc and open config.php with your editor of choice.
Edit as you want but remember it's important that you input correct KeyAuth Credentials
otherwise this won't work.

$name = ""; // Same name as your application

$OwnerId = ""; // Your OwnerID

$SellerKey = ""; // Your Seller Key

###### Make a file named .htaccess: 
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*)$ $1.php

RewriteCond %{REQUEST_FILENAME}.html -f
RewriteRule ^(.*)$ $1.html
```

# Known Bugs
Currently None

# Known Issues
Currently None

# Developed by ! ChangeGame#4800
