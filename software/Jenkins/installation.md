##### Java installation  and it has to be 17  on Linux Ubuntu 

```bash

sudo apt update
sudo apt install fontconfig openjdk-17-jre
java -version
openjdk version "17.0.8" 2023-07-18
OpenJDK Runtime Environment (build 17.0.8+7-Debian-1deb12u1)
OpenJDK 64-Bit Server VM (build 17.0.8+7-Debian-1deb12u1, mixed mode, sharing)
``````

## Set port to 8081
```bash
run systemctl edit jenkins and add the following:
[Service]
Environment="JENKINS_PORT=8081"
```
### Next is the Jenkins installation  on Linux Ubuntu 

```bash
sudo wget -O /usr/share/keyrings/jenkins-keyring.asc \
  https://pkg.jenkins.io/debian-stable/jenkins.io-2023.key
echo deb [signed-by=/usr/share/keyrings/jenkins-keyring.asc] \
  https://pkg.jenkins.io/debian-stable binary/ | sudo tee \
  /etc/apt/sources.list.d/jenkins.list > /dev/null
sudo apt-get update
sudo apt-get install jenkins
```

## Jenkins master and slave  set-up
```bash
master - install java and jenkins
slave - install java, which is enough
https://www.jenkins.io/blog/2022/12/27/run-jenkins-agent-as-a-service/
```
