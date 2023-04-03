# Installation

```bash
sudo apt update
sudo apt install memcached
sudo apt install php5-memcached
sudo service apache2 restart
```

# Verifying

```bash
ps aux | grep memcached
netstat -ap | grep 11211
```
OR

Create a new PHP file with below content & run it in your browser
```bash
<?php
  phpinfo();
?>
```
