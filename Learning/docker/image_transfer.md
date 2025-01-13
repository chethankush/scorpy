## If image need to be copied to remote machine with register 
```bash
Use this link for all the command and options - https://docs.docker.com/reference/cli/docker/container/commit/

Below are most important commands, consider if register is not available and just need to transfer files from one serve to anotehr server below options could be used.
1) # docker commit  ----> Creates a image from, container

2) # docker export   ----> Create a tar file from container
eg: docker export container_name > nginx_chethan.tar

3) #docker import    -----> Create a image from tarfile
eg: docker import - chethan:nginx < nginx_chethan.tar

4) #docker save      ------> Create a tar file from image
eg: docker save nginx:chethan > nginx_chethan.tar

5) #docker load     ------> create a image from tarfile
eg: docker load < nginx_chethan.tar
```

##docker useful commands
```bash
# docker build -t image_name Dockerfile_path   --> to build an image from docker file

# docker images  --> to list present images locally

# docker commit container_id image_name    --> to commit/create image out of running container

#docker volume create my_vol     ---> to create volume

#docker network create my_networl --profile=bridge
```
