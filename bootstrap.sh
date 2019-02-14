#!/bin/bash

# Use single quotes instead of double quotes to make it work with special-character passwords
echo "Provisioning HRIS virtual machine..."
echo "==================================================="
echo "Updating Ubuntu"
sudo apt-get update 
sudo apt-get upgrade

# Apache
echo "Installing Apache"
sudo apt-get install apache2 -y 

# Apache Configuration
echo "Configuring Apache"

# Setup virtual host file
VHOST=$(cat <<EOF
ServerName hris
<VirtualHost *:80>
	ServerName hris
    DocumentRoot "/var/www/html/public/"
    <Directory "/var/www/html/public/">
    	Options Indexes FollowSymLinks
      	AllowOverride All
      	Require all granted
    </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

# GIT
echo "Installing GIT"
sudo apt-get install git-core -y

# MYSQL
echo "Preparing MySQL"
sudo apt-get install debconf-utils -y 
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password root"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password root"

echo "Installing MySQL"
sudo apt-get install mysql-server-5.5 -y 
sudo apt-get install mysql-server -y -f 
sudo apt-get install -y mysql-client 

echo "Installing Project dependencies"
echo "Creating databases"
mysqladmin --password=root create dev

# Phpmyadmin
echo "Installing PHPMyAdmin"
# Install phpmyadmin and give password(s) to installer
# for simplicity I'm using the same password for mysql and phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password root"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password root"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password root"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get -y install phpmyadmin

# PHP
echo "Installing PHP"
sudo apt-get update
sudo apt-get install python-software-properties -y 
sudo add-apt-repository -y ppa:ondrej/php5
sudo apt-get update
sudo apt-get -y install php5-common php5-dev php5-cli php5-fpm
sudo apt-get -y install curl mcrypt php5-curl php5-gd php5-mcrypt php5-mysql php5-xdebug php5-json php5-xmlrpc
sudo php5enmod mcrypt

# enable mod_rewrite
sudo a2enmod rewrite

# Restart Apache
sudo service apache2 restart

# Composer
echo "Installing Composer"
sudo curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Installing Node
echo "Installing Node"
sudo curl -sL https://deb.nodesource.com/setup | sudo bash - 
sudo apt-get install -y nodejs
sudo npm install -g npm

# Laravel
echo "Installing Laravel"
composer global require "laravel/installer=~1.1"

# proc_open(): fork failed errors
sudo dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
sudo mkswap /var/swap.1
sudo swapon /var/swap.1

echo "Enable write permission to /storage and /bootstrap"
chmod -R 777 /var/www/html/storage
chmod -R 777 /var/www/html/bootstrap

cd /var/www/html

echo "Installing Vendor plugin"
composer update

cp .env.example .env
php artisan key:generate

# Installing node modules
sudo npm install

# echo "Migrate Databases"
# php artisan migrate

echo "Finished provisioning."