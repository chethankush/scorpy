when you face below errors

INFO Starting CRC VM for openshift 5.0.0...
ERRO failed to expose port /home/chethan/.crc/machines/crc/docker.sock -> ssh-tunnel://core@192.168.127.2:22/run/podman/podman.sock?key=%2Fhome%2Fchethan%2F.crc%2Fmachines%2Fcrc%2Fid_ed25519: listen unix 

The error occurs because a stale docker.sock file or an orphaned background CRC process is still occupying the Unix socket at /home/chethan/.crc/machines/crc/docker.sock


Step-by-Step Fix

1. Stop CRC and clean up stale processes:
Run crc stop first, then ensure no leftover crc or gvproxy processes are still running in the background:bash
$crc stop
$pkill -f "crc|gvproxy"

2. Remove the stale socket file:
Delete the leftover docker.sock file so crc start can recreate it cleanly:bash
$rm -f /home/chethan/.crc/machines/crc/docker.sock
3. Restart the CRC daemon service (if using systemd):
If the background daemon is stuck holding the socket, restart it:bash
$systemctl --user restart crc-daemon.service

(Note: If you get a "Unit crc-daemon.service not found" message, you can safely skip this step.)
4. Start CRC again:bash
$crc start
