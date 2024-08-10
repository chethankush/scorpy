### searching and locating file
```bash
find /path/to/search -name "filename" : Search for a file by name in a specific directory.

locate filename : Quickly find the location of a file in the system using a pre-built database.

grep "pattern" file : Search for a specific pattern in a file.

grep -r "pattern" /path/to/search : Recursively search for a pattern in files within a directory.

cut -f 1 -d: /etc/passwd : Extract the first field (username) from the /etc/passwd file using ":" as the delimiter.

cut -f3 -d: /etc/passwd | sort -n : Extract the third field (user ID) from the /etc/passwd file using ":" as the delimiter and then sort the results numerically.

cut -f3 -d: /etc/passwd | sort | uniq : Extract the third field (user ID) from the /etc/passwd file using ":" as the delimiter, sort the results, and then remove duplicate entries.

which command : Display the full path of an executable.

whereis command : Locate the binary, source, and manual pages for a command.

updatedb : Update the database used by locate.

find /path -type f -exec grep -l "pattern" {} + : Search for files containing a specific pattern using find and grep.
```


### System commands
```bash
systemctl start service : Start a service.

systemctl stop service : Stop a service.

systemctl restart service : Restart a service.

systemctl status service : Show the status of a service.

systemctl enable service : Enable a service to start on boot.

systemctl disable service : Disable a service from starting on boot.

systemctl is-active service : Check if a service is currently active.

systemctl is-enabled service : Check if a service is enabled to start on boot.

systemctl list-units --type=service : List all active services.

systemctl --failed : Show units that failed to start.

journalctl -xe : View system logs for troubleshooting.

systemctl daemon-reload : Reload systemd manager configuration.

systemctl list-unit-files --type=service : List all service unit files.

systemctl edit service : Edit a service's configuration.

systemctl cat service : Display a service's unit file.

systemctl get-default : Retrieve the default target or run-level for system boot.

systemctl mask service : Mask a service unit, preventing it from starting.

reboot : Restart the system

shutdown -r now : Shutdown and restart the system immediately

systemctl reboot : Restart the system using systemctl

init 6 : Change the system runlevel to reboot

shutdown -h now : Shutdown the system immediately

systemctl shutdown : Shutdown the system using systemctl

init 0 : Change the system runlevel to halt

ctrl +s : Pause terminal output

ctrl+q : Resume terminal output
```

### Network Manager
```bash
nmcli connection show : Show details of all network connections.

nmcli connection up connection_name : Activate a network connection.

nmcli connection down connection_name : Deactivate a network connection.

nmcli connection add type ethernet ifname eth0 : Add a new Ethernet connection.

nmcli connection modify connection_name ipv4.method manual ipv4.addresses 'IP/Subnet' ipv4.gateway 'Gateway' : Configure a static IP address for a connection.

nmcli connection delete connection_name : Delete a network connection.
```
