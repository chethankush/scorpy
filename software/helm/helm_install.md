### To download using wget

```bash
wget https://get.helm.sh/helm-v3.9.3-linux-amd64.tar.gz
```
### To unzip and untar it 
```bash
gunzip helm-v3.9.3-linux-amd64.tar.gz
tar -xvf  helm-v3.9.3-linux-amd64.tar

### Move the helm file from linux-amd64/ to /usr/local/bin
```bash
cd linux-amd64/
mv helm /usr/local/bin/
```
### Check for the helm version
```bash
helm version
version.BuildInfo{Version:"v3.9.3", GitCommit:"414ff28d4029ae8c8b05d62aa06c7fe3dee2bc58", GitTreeState:"clean", GoVersion:"go1.17.13"}
```
