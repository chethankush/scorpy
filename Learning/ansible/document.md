### This document provide overview on ansible

## ansible princibles
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


## commands
```bash
# ansible all --list-hosts
# ansible all -m ping
# ansible-playbook file.yaml --syntax-check
# ansible-playbook file.yaml
``` 
