###Save this file as logrotation.py and execute as $python logrotation.py <br>
##This program will perform rotation of logs but only thing is files test1/2/3/4/5.log.gz should be present in the folder
```bash
#!/usr/bin/env python2.7.17
import os
import shutil
import gzip

a = 100 * 1024

file_size = os.path.getsize('/var/log/test.log')


if file_size > a:
    os.rename('/var/log/test5.log.gz','/var/log/test6.log.gz')
    os.rename('/var/log/test4.log.gz','/var/log/test5.log.gz')
    os.rename('/var/log/test3.log.gz','/var/log/test4.log.gz')
    os.rename('/var/log/test2.log.gz','/var/log/test3.log.gz')
    os.rename('/var/log/test1.log.gz','/var/log/test2.log.gz')

    os.remove('/var/log/test6.log.gz')

    shutil.copyfile('/var/log/test.log','/var/log/test1.log')
    f = open("/var/log/test.log",'w')
    f.close()
    f_in = open('/var/log/test1.log')
    f_out = gzip.open('/var/log/test1.log.gz','wb')
    f_out.writelines(f_in)
    f_out.close()
    f_in.close()
    os.remove('/var/log/test1.log')
    # This code will rotate the files

```
