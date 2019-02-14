# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure(2) do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "ubuntu/trusty64"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a private network, which allows host-only access to the machine using a specific IP.
  config.vm.network "private_network", ip: "192.168.33.25"

  # Share an additional folder to the guest VM. The first argument is the path on the host to the actual folder.
  # The second argument is the path on the guest to mount the folder.
  config.vm.synced_folder "./", "/var/www/html", group: "www-data", user: "vagrant"

  # CUSTOMIZATION
  config.vm.provider "virtualbox" do |vb|

    vb.name = "hris"

    # Customize the amount of memory on the VM:
    vb.memory = "1024"
    vb.cpus = 1
  end

  # Define the bootstrap file: A (shell) script that runs after first setup of your box (= provisioning)
  config.vm.provision :shell, path: "bootstrap.sh"
end
