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
### Process management
```bash
ps : Display information about active processes.

ps aux : Display detailed information about all processes.

top : Display a dynamic, real-time overview of system processes.

kill PID : Terminate a process by its process ID.

killall process_name : Terminate all processes with a specific name.

pkill process_name : Send a signal to processes based on their name.

pgrep process_name : Display process IDs based on their name.

kill -9 PID : Forcefully terminate a process by its process ID.

htop : An interactive process viewer with a user-friendly interface.

nice command : Execute a command with a modified scheduling priority.

renice priority PID : Change the priority of an already running process.

nohup command & : Run a command that keeps running even after the terminal is closed.

kill -STOP PID : Pause (stop) a process by sending the SIGSTOP signal.

kill -CONT PID : Resume a paused (stopped) process by sending the SIGCONT signal.

```


### User and group command
```bash
useradd : Create a new user account

passwd : Set or change a user's password

groupadd : Create a new group

cat /etc/passwd : Display the contents of the password file

cat /etc/group : Display the contents of the group file

useradd -g groupname username : Create a user and assign them to a specific primary group

usermod -G : Modify a user's supplementary groups

usermod -a -G : Add a user to additional groups without removing them from their current groups

userdel : Delete a user account

userdel -r user : Delete a user account along with their home directory and mail spool

groupdel : Delete a group

useradd -g : Create a user and assign them to a specific primary group
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
