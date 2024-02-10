**This file will explain how to configure a kubernetes config file from remote server called as jump server, create config file and login to api-server

## install kubectl on jump server (note: In real time, already kubectl would have been already installed and if you want to install need to switch to admin or root)
```bash
# Update the apt package index and install packages needed to use the Kubernetes apt repository:
sudo apt-get update
sudo apt-get install -y apt-transport-https ca-certificates curl

# Download the Google Cloud public signing key:
sudo curl -fsSLo /usr/share/keyrings/kubernetes-archive-keyring.gpg https://packages.cloud.google.com/apt/doc/apt-key.gpg

# Add the Kubernetes apt repository:
#echo "deb [signed-by=/usr/share/keyrings/kubernetes-archive-keyring.gpg] https://apt.kubernetes.io/ kubernetes-xenial main" | sudo tee /etc/apt/sources.list.d/kubernetes.list
echo "deb http://apt.kubernetes.io/ kubernetes-xenial main" | sudo tee -a /etc/apt/sources.list.d/kubernetes.list

# If we get errors like GPG error, execute the following command
# curl https://packages.cloud.google.com/apt/doc/apt-key.gpg | sudo apt-key --keyring /usr/share/keyrings/cloud.google.gpg add -
curl https://packages.cloud.google.com/apt/doc/apt-key.gpg | apt-key add -

# Update apt package index, install kubelet, kubeadm and kubectl with a specific version, and pin their version:
sudo apt-get update
sudo apt-get install -y kubectl=1.27.1-00

```

<details>
<summary>What are the steps involved to create config file and certificates to access api-server</summary><br><b>
  1) Login to remote desktop with your client id and passwd (Optional)
  2) Login to jump server with common user called tslemerg then switch to respective application id  (optional) 
    a) To login to jump server the server the login ids are maintained by Active Directory or LDAP or cyberark  (optional )
  3) The application id can be different for developers, testers, admins, appusers. Now follow above steps to create. 
</b>
</details>
