# CustomerPanel
Host your own authentication customer dashboard.

###### Requirements: 
```
KeyAuth Seller Plan / Subscription - Upgrade at https://keyauth.cc/dashboard/upgrade/
```


[![Screenshot](https://cdn.discordapp.com/attachments/1094772945664098335/1106698081325555844/ByChangeGame.gif)](https://discordapp.com/users/1094988511783964843)

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
