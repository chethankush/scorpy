## This document provide overview on ansible

### ansible princibles
```bash
As automation technology, Ansible is designed around the following principles:

1) Agent-less architecture
Low maintenance overhead by avoiding the installation of additional software across IT infrastructure.

2) Simplicity
Automation playbooks use straightforward YAML syntax for code that reads like documentation. Ansible is also decentralized, using SSH existing OS credentials to access to remote machines.

3) Scalability and flexibility
Easily and quickly scale the systems you automate through a modular design that supports a large range of operating systems, cloud platforms, and network devices.

4) Idempotence and predictability
When the system is in the state your playbook describes Ansible does not change anything, even if the playbook runs multiple times.

```
```bash
Playbook: A single yaml file
play: Defines a set of activities(tasks) to be run on hosts
task: An actions to be performed on the host e.q- script, command, install a package
```
## Ansible Configuration files
```bash
/etc/ansible/ansible.cfg   ----> ansible configuration file
/etc/ansible/hosts         ----> ansible inventory where groups and servers are declared
/etc/ansible/roles
```


## commands
```bash

# ansible-playbook --syntax-check playbook.yaml  ----> Check the syntax

# anible-playbook --check/-C playbook.yaml  ---> performs dry run doesnt execute

# anible-playbook /path/playbook.yaml   ---> executing playbook in a given path

# ansible -m ping localhost  ---> executing without playbook (Ad-joc command)

# ansible-inventory --list  ----> to list all hosts

# ansible remote_host/group_name =m ping 

```
## To connect remote server without password authentication 
```bash
SSH keys from control to client for password connection 

#ssh-keygen
#Leave everything and then enter
#ssh-copy-id destination_ipaddress
#provide passwd for destination _ipaddress
```

## Handlers
```bash
Handlers are the executed at the end of the play once all tasks are finished. In Ansible, handlers are typically used to start, reload, restart and stio services.
Note: Handlers are tasks  that only run when notified
```

## Most important are modules. 
### Commonly used modules are 
```bash
1) copy
2) File
3) shell
4) package Mgt
5) service
6) debug
7) lineinfile
8) git
9) archive
10) cli_command
