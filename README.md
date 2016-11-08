This is a fork of the yellows8's [ctr-httpwn](https://github.com/yellows8/ctr-httpwn) exploit
with a temporary fix while servers are down.

All the [ninupdates](https://github.com/yellows8/ninupdates) stuff is removed and
a static config file is provided. This will, at least allow access to the eShop.

The static config file used here is based on [this](https://github.com/Plailect/Guide/blob/master/server_config.xml) file.

This app will work **AS IS**, but all requests are redirected to http://skiptirengu.tk/ctr-httpwn/NetUpdateSOAP.php which **DOES NOT HAVE** a SSL certificate. Feel free to setup your own server if you want to.

# Usage

- Download the file `ctr-httpwn.zip`.
- Extract the zip and copy the files to the `3ds` folder on your sdcard.
- If you want to use your own server, just replace the url on the file `url_config.txt` with your server's url. Ex: `http://my-server/ctr-httpwn/config.php`

Keep in mind that if your server is running SSL you also need to add an `user_nim_rootcertchain_rootca.der` to the root dir of ctr-httpwn.
See [https://github.com/yellows8/ctr-httpwn#sd-data](https://github.com/yellows8/ctr-httpwn#sd-data).

# Hosting a server

- Download the file `server.zip`.
- Extract it's content to your server's web-accessible folder. Ex: `/var/www/html/ctr-httpwn`.

Keep in mind that the `new_url` under the `config.php` is generated automatically based on your hostname.
