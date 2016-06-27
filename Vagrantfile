# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = "https://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"
  # config.vm.box_check_update = false
  # config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "private_network", ip: "192.168.34.10"
  # config.vm.network "public_network"

  config.vm.synced_folder ".", "/var/www/html/Behoma"
  # config.vm.provider "virtualbox" do |vb|
  #   # Display the VirtualBox GUI when booting the machine
  #   vb.gui = true
  #
  #   # Customize the amount of memory on the VM:
  #   vb.memory = "1024"
  # end

  config.vm.provision "shell", inline: <<-SHELL
    echo "mysql-server mysql-server/root_password password password" | debconf-set-selections
    echo "mysql-server mysql-server/root_password_again password password" | debconf-set-selections
    sudo apt-get update
    sudo apt-get -y install nginx
    sudo apt-get -y install mysql-server
    sudo apt-get -y install memcached
    sudo apt-get -y install imagemagick
    sudo apt-get -y install php5-fpm
    sudo apt-get -y install php5-cli
    sudo apt-get -y install php5-mysql
    sudo apt-get -y install php5-mysqlnd
    sudo apt-get -y install php5-imagick
    sudo apt-get -y install php5-mcrypt
    sudo apt-get -y install php5-memcached
    sudo apt-get -y install php5-xdebug
    sudo apt-get -y install php5-curl
    sudo ln -s /etc/php5/mods-available/mcrypt.ini  /etc/php5/cli/conf.d/20-mcrypt.ini
    echo "CREATE DATABASE message_board;" | mysql -u root -ppassword;
    echo "GRANT ALL PRIVILEGES ON *.* TO 'root'@'192.168.%' IDENTIFIED BY PASSWORD '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19' WITH GRANT OPTION;" | mysql -u root -ppassword;
    mysql -u root -ppassword message_board < /var/www/html/Behoma/data/create_table.sql
    sudo sed -i -e 's/bind-address/#bind-address/g' /etc/mysql/my.cnf
    sudo echo "server {
    listen 80 ;

    root /var/www/html/Behoma/public;
    index index.html index.htm;
    server_name behoma.org;
    location / {
           try_files \\$uri /index.php?\\$args;
    }
    location ~ \.php\\$ {
          include        /etc/nginx/fastcgi_params;
          fastcgi_pass   unix:/var/run/php5-fpm.sock;
          fastcgi_index  index.php;
          fastcgi_param  SCRIPT_FILENAME  \\$document_root\\$fastcgi_script_name;
          fastcgi_read_timeout 600;
    }
}" > /etc/nginx/sites-available/behoma.org
    sudo ln /etc/nginx/sites-available/behoma.org /etc/nginx/sites-enabled/behoma.org
    sudo service mysql restart
    sudo service nginx restart
    php /var/www/html/Behoma/scruit load
  SHELL
end
