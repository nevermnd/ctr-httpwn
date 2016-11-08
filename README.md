This is a fork of the yellows8's [ctr-httpwn](https://github.com/nevermnd/ctr-httpwn) exploit
with a temporary fix while servers are down.

All the [ninupdates](https://github.com/yellows8/ninupdates) stuff is removed and
a static config file is provided. This will, at least allow access to eShop.

The static config file used here is based on [this](https://github.com/Plailect/Guide/blob/master/server_config.xml) file.

# Usage

- Extract the zip and copy the files to your `ctr-httpwn` folder under the `3ds` folder on your sdcard.
- Change the url on the file `url_config.txt` to point to your server. 

# Hosting a server

The `new_url` under the config is generated automatically based on your hostname, sou you just
need to copy the `web/` folder to your server's web-accessible folder and start your server.