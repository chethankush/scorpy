## If image need to be copied to remote machine with register 
```bash
Below are most important commands, consider if register is not available and just need to transfer files from one serve to anotehr server below options could be used.
1) # docker commit  ----> Creates a image from, container

2) # docker export   ----> Create a tar file from container
eg: docker export container_name > nginx_chethan.tar

3) #docker import    -----> Create a image from tarfile
eg: docker import - chethan:nginx < nginx_chethan.tar

4) #docker save      ------> Create a tar file from image
eg: docker save nginx:chethan > nginx_chethan.tar

5) #docker load     ------> create a image from tarfile
eg: docker load - chethan:nginx < nginx_chethan.tar
```
