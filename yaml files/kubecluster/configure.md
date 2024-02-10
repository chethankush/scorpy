##This file will explain how to configure a kubernetes config file from remote server called as jump server, create config file and login to api-server


## Create certificate and key 
```bash
openssl x509 -in ca.crt -text -noout
```

<details>
<summary>What are the steps involved to create config file and certificates to access api-server</summary><br><b>
  1) Login to remote desktop with your client id and passwd (Optional)
  2) Login to jump server with common user called tslemerg then switch to respective application id  (optional) 
    a) To login to jump server the server the login ids are maintained by Active Directory or LDAP or cyberark  (optional )
  3) The application id can be different for developers, testers, admins, appusers. Now for these users, we have to create config to access API-server
  follow below steps to create config files and install kubectl to access API-server
</b>
</details>
