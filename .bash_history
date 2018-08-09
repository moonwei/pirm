sudo passwd root
sudo vim .bashrc
source .bashrc
ll
sudo vim .bashrc
source .bashrc
ll
ip addr
ping 192.168.6.1
ping 192.168.6.2
sudo shutdown now
ping 192.168.6.1
sudo vim /etc/netplan/50-cloud-init.yaml 
sudo netplan apply 
ping 192.168.137.1
reboot
sudo vim /etc/netplan/50-cloud-init.yaml 
sudo netplan apply
ip addr
sudo vim /etc/netplan/50-cloud-init.yaml 
sudo netplan apply
ip addr
sudo vim /etc/netplan/50-cloud-init.yaml 
ip addr
ping 172.18.7.152
ip addr
reboot
ifconfig
ip addr
lspci
ip link
dmesg | grep eth
ipconfig
ifconfig
ip addr
ip 
ip -h
ip --hlep
ip --help
ip link
ip route
ip ntable
ip 
ip netconf
ifconfig
ip -v
ip link -v
ip link -s
ip link list
reboot
ip addr
sudo vim /etc/netplan/50-cloud-init.yaml 
sudo netplan apply 
sudo vim /etc/netplan/50-cloud-init.yaml 
sudo netplan apply 
ip addr
ping www.sina.com.cn
sudo apt update
ll
sudo cp source.list /etc/netplan/
sudo cp source.list /etc/apt
sudo cp source.list /etc/apt/
sudo cp sources.list /etc/apt/
sudo apt update
sudo apt upgrade -y
reboot
apt install nginx
sudo apt install nginx
sudo systemctl enable nginx
ip addr
sudo apt install mariadb-server mariadb_client
sudo apt install mariadb-server mariadb-client
sudo systemctl enable mysql
mysql_secure_installation 
sudo mysql_secure_installation 
sudo mysql -u root
mysql -umoonw -p
exit
sudo apt install php php-fpm php-common php-mysql php-gd php-cli
sudo systemctl status php7.2-fpm.service
sudo vim /etc/php/7.2/fpm/php.ini
sudo vim /etc/nginx/sites-available/default 
sudo systemctl restart php7.2-fpm
sudo systemctl restart nginx.service 
sudo systemctl status nginx.service 
sudo vim /etc/nginx/sites-available/default 
sudo systemctl status nginx.service 
sudo vim /etc/nginx/sites-available/default 
sudo systemctl restart nginx.service 
sudo vim /etc/nginx/sites-available/default 
sudo systemctl restart nginx.service 
sudo apt install phpmyadmin
sudo ln -s /usr/share/phpmyadmin/ wwwroot/www/phpmyadmin
sudo vim /etc/nginx
cd /etc/nginx/
ll
cd sites-available/
ll
sudo vim default 
sudo systemctl restart nginx.service 
sudo apt install apache2
sudo systemctl status apache2
sudo systemctl start apache2
sudo apt install libapache2-mod-php
cd /etc/httpd
cd /etc/apache2/
ll
cd sites-available/
ll
sudo vim 000-default.conf 
ll
cd ..
ll
cd conf-available/
ll
cd ..
ll
cd sites-available/
lll
ll
sudo vim 000
sudo vim 000-default.conf 
sudo systemctl restart apache2
ll
cd ..
ll
cat apache2.conf
sudo vim apache2.conf 
sudo systemctl restart apache2
sudo systemctl status apache2
cd 
ll
cd wwwroot/
ll
cd /etc
cd nginx/
ll
sudo nginx.conf
sudo vim nginx.conf
cd ..
cd php
ll
cd 7.2/
ll
cd apache2/
ll
sudo vim php.ini
sudo systemctl restart apache2
sudo systemctl restart nginx
cd /etc/nginx
ll
cd sites-available/
ll
sudo vim default 
ll
cd ..
ll
cd ..
cd apache2
ll
cd mods-available/
ll
cd ..
ll
cd mods-enabled/
ll
cd ..
ll
cd sites-available/
ll
sudo vim 000-default.conf 
ll
cd ..
ll
cd conf-available/
ll
cd ..
ll
sudo a2enmod rewrite
sudo systemctl restart apache2
ll
cd mods-enabled/
ll
cd ..
ll
cd sites-available/
ll
sudo vim 000-default.conf 
sudo systemctl restart apache2
cd /etc/nginx
ll
cd sites-available/
ll
sudo vim default 
sudo systemctl restart nginx
sudo vim default 
sudo systemctl restart nginx
cd ..
ll
sudo vim nginx.conf 
cd ..
ll
cd nginx/
ll
cd sites-available/
ll
sudo vim default 
sudo systemctl restart nginx
systemctl status nginx
sudo systemctl restart nginx
sudo vim default 
systemctl status nginx
sudo vim default 
systemctl status nginx
sudo systemctl restart nginx
reboot
cd /etc/php
ll
cd 7.2/
lls
ll
cd apache2/
ll
sudo vim php.ini 
sudo systemctl restart apache2
sudo systemctl restart nginx
cd /etc/php/7.2/fpm
ll
sudo php.ini
sudo vim php.ini
sudo systemctl restart php-fpm
ll
cd ..
ll
sudo systemctl restart php7.2-fpm
cd fpm
ll
sudo vim php.ini
sudo systemctl restart fpm7.2-php
sudo systemctl restart php7.2-fpm
sudo vim php.ini
exit
cd www
cd wwwroot
cd www
ll
cd CI
ll
cd application/
ll
cd logs/
ll
cd ..
ll
cd config/
ll
cat config.php
cd /usr/local/
ll
cd /etc/nginx/
ll
sudo vim nginx.conf 
cd /var/log/nginx/
ll
cat error.log
cp *.log ~
date
sudo tzselect
date
sudo ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime
date
cd /etc/nginx/
ll
cd ..
ll
ll php*
cd php/7.2/
ll
cd fpm
ll
sudo vim php-fpm.conf 
sudo sustemctl restart php7.2-fpm
sudo systemctl restart php7.2-fpm
cd /var
ll
cd log
ll
tail php7.2-fpm.log 
sudo tail php7.2-fpm.log 
sudo vim php7.2-fpm.log 
ll
cd nginx/
ll
sudo tail error.log
ll
cd 
cd wwwroot/
ll
cd www
ll
sudo ln -s /usr/share/phpmyadmin ./phpmyadmin
ll
cd /var
ll
cd nginx
cd lo
cd log
ll
cd nginx/
ll
sudo tail access.log
mysql -rmoonw -p
mysql -u moonw -p
mysql -umoonw -p
sudo vim /usr/share/phpmyadmin/libraries/sql.lib.php
cd
cd www
cd wwwroot/
cd www
ll
cd CI
ll
cd application/
cd logs
ll
cd /etc/
cd nginx/
ll
cd ..
cd php
cd 7.2/
ll
cd fpm
ll
sudo vim php.ini
reboot
sudo vim /etc/nginx/sites-available/default 
sudo systemctl restart nginx
sudo vim /etc/nginx/sites-available/default 
cd /etc/nginx/
ll
sudo mkdir ssl
cd ssl
openssl req -x509 -nodes -days 360 -newkey rsa:2048 -keyout nginx.key -out nginx.crt
sudo openssl req -x509 -nodes -days 360 -newkey rsa:2048 -keyout nginx.key -out nginx.crt
sudo vim /etc/nginx/sites-available/default 
sudo systemctl restart nginx
sudo systemctl status nginx
sudo vim /etc/nginx/sites-available/default 
sudo systemctl status nginx
sudo systemctl restart nginx
sudo openssl req -x509 -nodes -days 360 -newkey rsa:2048 -keyout nginx.key -out nginx.crt
sudo systemctl restart nginx
exit
mysql -umoonw -p
mysql -upcmanager -[
mysql -upcmanager -p
mysql -umoonw -p
sudo apt update
apt list
sudo apt upgrade
mysql -umoonw
mysql -umoonw -p
exit
