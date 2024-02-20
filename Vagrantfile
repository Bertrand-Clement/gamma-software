# -*- mode: ruby -*-
# vi: set ft=ruby :

module OS
    def OS.windows?
        (/cygwin|mswin|mingw|bccwin|wince|emx/ =~ RUBY_PLATFORM) != nil
    end

    def OS.mac?
        (/darwin/ =~ RUBY_PLATFORM) != nil
    end

    def OS.unix?
        !OS.windows?
    end

    def OS.linux?
        OS.unix? and not OS.mac?
    end
end

Vagrant.configure(2) do |config|
    config.vm.box = "debian/bullseye64"
    config.vm.box_check_update = false

    config.vm.network "forwarded_port", guest: 80, host: 8098
    config.vm.network "forwarded_port", guest: 3306, host: 3398
    config.vm.network "private_network", ip: '192.168.40.98'

    if Vagrant::Util::Platform.windows? then
        config.vm.synced_folder ".", "/vagrant", type: "smb"
        config.vm.synced_folder ".", "/var/www", type: "smb"
    elsif OS.mac?
        config.vm.synced_folder ".", "/vagrant", type: "nfs", :linux__nfs_options => ["rw","no_root_squash","no_subtree_check"]
        config.vm.synced_folder ".", "/var/www", type: "nfs", :linux__nfs_options => ["rw","no_root_squash","no_subtree_check"]
    else
        config.vm.synced_folder ".", "/vagrant", type: "nfs", :linux__nfs_options => ["rw", "no_root_squash", "no_subtree_check"], nfs_version: "4", nfs_udp: false
        config.vm.synced_folder ".", "/var/www", type: "nfs", :linux__nfs_options => ["rw", "no_root_squash", "no_subtree_check"], nfs_version: "4", nfs_udp: false
    end

    config.vm.provider "virtualbox" do |vb|
        vb.gui = false
        vb.memory = "8192"
        vb.customize [ "modifyvm", :id, "--uartmode1", "disconnected" ]
    end

    config.vm.provision "ansible_local" do |ansible|
        ansible.playbook = "vagrant/playbook.yml"
        ansible.install_mode = "pip"
        ansible.pip_install_cmd = "curl https://bootstrap.pypa.io/pip/2.7/get-pip.py | sudo python"
        ansible.galaxy_role_file = "vagrant/requirements.yml"
        ansible.galaxy_roles_path = "/etc/ansible/roles"
        ansible.galaxy_command = "sudo ansible-galaxy install --role-file=%{role_file} --roles-path=%{roles_path} --force"
    end
end
