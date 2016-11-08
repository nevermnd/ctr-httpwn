This is a fork of the yellows8's [ctr-httpwn](https://github.com/nevermnd/ctr-httpwn) exploit
with a temporary fix while servers are down.

All the [ninupdates](https://github.com/yellows8/ninupdates) stuff is removed and
a static config file is provided. This will, at least allow access to the eShop.

The static config file used here is based on [this](https://github.com/Plailect/Guide/blob/master/server_config.xml) file.

The current `url_config.txt` is ponting to http://skiptirengu.tk which DOES NOT HAVE a SSL certificate.

# Usage

- Download the file `ctr-httpwn.zip`.
- Extract the zip and copy the files to your `ctr-httpwn` folder under the `3ds` folder on your sdcard.
- Change the url on the file `url_config.txt` to point to your server. 

Keep in mind that if your server is running SSL you also need to add an `user_nim_rootcertchain_rootca.der` to the root dir of ctr-httpwn.
See [https://github.com/yellows8/ctr-httpwn#sd-data](https://github.com/yellows8/ctr-httpwn#sd-data).

# Hosting a server

- Download the file `server.zip`.
- Extract it's content to your server's web-accessible folder. Ex: `/var/www/html/ctr-httpwn`.
- Start the server.

Keep in mind that the `new_url` under the `config.php` is generated automatically based on your hostname.