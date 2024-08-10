###Systemd
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
```
systemctl mask service : Mask a service unit, preventing it from starting.
