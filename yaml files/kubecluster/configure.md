**This file will explain how to configure a kubernetes config file from remote server called as jump server, create config file and login to api-server

### install kubectl on jump server (note: In real time, already kubectl would have been already installed and if you want to install need to switch to admin or root)
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

### Generate private key  and create certificate signing request for user. 
```bash
# use openssl command to generate key 
openssl genrsa -out (user) 2048
# user.key will be generated and now create csr file
openssl req -new -key  user.key -out (user.csr)  -subj "/CN=user/O=development"
```

### Now these certificates need to be authorized by Certificate Authority
```bash
#In this case, CA is API server  with ca.crt and ca.key  under path /etc/kubernetes/pki/
#There is two options
a) you can send you user.csr file to admin so that hey will authorize  and give authorized certificate
b) You can get api ca.crt and ca.key  and you authorize yourself using these files. (Lets do this)
# copy the files from APIserver to jump server, login to master(APIserver) as admin 
scp ca.crt user@jumpserver:/home/user/
scp ca.key user@jumpserver:/home/user/
#login backto jump server and authorize user.csr file
openssl x509 -req -in user.csr -CA ca.crt -CAkey ca.key -CAcreateserial -out user.crt -days 365
```
### Now set-up config file under user home directory
```bash
#create a directory
cd home-directory
mkdir .kube
cd  .kube
#Now edit a file config using vim
vim config
---content---
apiVersion: v1
clusters:
- cluster:
    certificate-authority-data: {base64 coded certificate using command #base64 ca.crt -w 0 > encoded_file.crt}
                OR
    certificate-authority: path of the ca.crt
    server: https://IP-address:6443
  name: kubernetes
contexts:
# Now add user to config file using kubectl
kubectl config set-credentials {nickname or actual_name} --client-certifcate=user.crt --client-key=user.key
##With the above command an entry on config would be added, please check with
cat ~/.kube/config

###Now set the context with  the user and cluster. 
kubectl config set-context {meaningful_context_name} --cluster=kubernetes (check in config file what are list of cluster we have)  --user={nickname or user}
#eg kubectl config set-config dev-context --cluster=kubenetes --user=user
##Check config file now and map context for present use
kubectl config use-context dev-context
kubectl config get-contexts
```

<details>
<summary>What are the steps involved to create config file and certificates to access api-server</summary><br><b>
  1) Login to remote desktop with your client id and passwd (Optional)
  2) Login to jump server with common user called tslemerg then switch to respective application id  (optional) 
    a) To login to jump server the server the login ids are maintained by Active Directory or LDAP or cyberark  (optional )
  3) The application id can be different for developers, testers, admins, appusers. Now follow above steps to create. 
</b>
</details>
