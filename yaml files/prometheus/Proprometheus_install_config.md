### To Install Prometheus on Linux server (borrowed from https://medium.com/cloud-native-daily/install-and-configure-prometheus-on-a-linux-server-and-securing-prometheus-api-and-ui-endpoints-ec0439228a26)

Set up Prometheus Binaries

Step 1:  Down load prometheus from link below 
```bash
wget https://github.com/prometheus/prometheus/releases/download/v2.32.1/prometheus-2.32.1.linux-amd64.tar.gz
tar -xvf prometheus-*.linux-amd64.tar.gz
mv prometheus-*.linux-amd64 prometheus-package
```

Step 2: Create user and required directories  and make user as owner
```bash
sudo useradd --no-create-home --shell /bin/false prometheus
sudo mkdir /etc/prometheus
sudo mkdir /var/lib/prometheus
sudo chown prometheus:prometheus /etc/prometheus
sudo chown prometheus:prometheus /var/lib/prometheus
```

Step 3 : Copy Prometheus and protocol binary from the Prometheus-package folder to /usr/local/bin and change the ownership to Prometheus user.
```bash
sudo cp prometheus-package/prometheus /usr/local/bin/
sudo cp prometheus-package/promtool /usr/local/bin/
sudo chown prometheus:prometheus /usr/local/bin/prometheus
sudo chown prometheus:prometheus /usr/local/bin/promtool
```

Step 4: Move the consoles and console_libraries directories from Prometheus-package to /etc/prometheus folder and change the ownership to Prometheus user.
```bash
sudo cp -r prometheus-package/consoles /etc/prometheus
sudo cp -r prometheus-package/console_libraries /etc/prometheus
sudo chown -R prometheus:prometheus /etc/prometheus/consoles
sudo chown -R prometheus:prometheus /etc/prometheus/console_libraries
```
### Set-up Prometheus Configuration :
Create prometheus.yml  and copy below details \
```bash
vi /etc/prometheus/prometheus.yml and ownership change $chown prometheus:prometheus /etc/prometheus/prometheus.yml

global:
  scrape_interval: 10s

scrape_configs:
  - job_name: 'prometheus'
    scrape_interval: 5s
    static_configs:
      - targets: ['localhost:9090']
```
### Set-up prometheus servier File
Create prometheus servcie file and  reload the service
```bash
Vim  /etc/systemd/system/prometheus.service

[Unit]
Description=Prometheus
Wants=network-online.target
After=network-online.target

[Service]
User=prometheus
Group=prometheus
Type=simple
ExecStart=/usr/local/bin/prometheus \
    --config.file /etc/prometheus/prometheus.yml \
    --storage.tsdb.path /var/lib/prometheus/ \
    --web.console.templates=/etc/prometheus/consoles \
    --web.console.libraries=/etc/prometheus/console_libraries

[Install]
WantedBy=multi-user.target
```
reload the services to register
```bash
sudo systemctl daemon-reload
sudo systemctl start prometheus.service
sudo systemctl status prometheus -l
```

### To secure prometheus API and UI endpoints using Basic Auth: (id: admin & passwd: test)

Step 1: Create python script to generate encrypted passwd 
```bash
Vi gen-pass.py

import getpass
import bcrypt

password = getpass.getpass("password: ")
hashed_password = bcrypt.hashpw(password.encode("utf-8"), bcrypt.gensalt())
print(hashed_password.decode())
```
```bash
python3 gen-pass.py
It will prompt for passwd (using test as passwd)
password:
$2b$12$hNf2lSsxfm0.i4a.1kVpSOVyBCfIB51VRjgBUyv6kdnyTlgWj81Ay
```
Step 2: Creating we.yml
```bash
Vi /etc/prometheus/web.yml
basic_auth_users:
  admin: $2b$12$hNf2lSsxfm0.i4a.1kVpSOVyBCfIB51VgBUyv6kdnyTlgWj81Ay
```
```bash
chown prometheus:prometheus /etc/prometheus/web.yml
$ promtool check web-config /etc/prometheus/web.yml
web.yml SUCCESS
```
Step 3: Edit prometheus.yml file
```bash
vi /etc/prometheus/prometheus.yml
global:
  scrape_interval: 10s

scrape_configs:
  - job_name: 'prometheus'
    scrape_interval: 5s
    static_configs:
      - targets: ['localhost:9090']
```
Step 4: Edit prometheus service
```bash
vi /etc/systemd/system/prometheus.service
[Unit]
Description=Prometheus
Wants=network-online.target
After=network-online.target

[Service]
User=prometheus
Group=prometheus
Type=simple
ExecStart=/usr/local/bin/prometheus \
    --config.file /etc/prometheus/prometheus.yml \  
    --web.config.file /etc/prometheus/web.yml \
    --storage.tsdb.path /var/lib/prometheus/ \
    --web.console.templates=/etc/prometheus/consoles \
    --web.console.libraries=/etc/prometheus/console_libraries

[Install]
WantedBy=multi-user.target
```
Step 5: Restart prometheus services
```bash
sudo systemctl daemon-reload
sudo systemctl restart prometheus.service
sudo systemctl status prometheus -l
```

Step 6: Test logging in with below credentials 
```bash
http://<prometheus-ip>:9090/graph

Username: admin

Password: test
```

