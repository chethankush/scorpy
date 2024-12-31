## For redhat
```bash
F8 and the choose recovery  and then press 'e'
go to line linux and press 'END' button
type "rd.break console=tty0" and then Ctl+x

You will get prompt then type as below
# mount -o remount,rw /sysroot
# chroot /sysroot
#echo "root_passwd" | passwd --stdin root
#touch /.autorelabel
#exit
#exit
```

## For redhat
```bash
shift+Esc  button same time

choose last option root in recovery mode and then enter twice

# mount -o remount, rw /
# passwd root
Enter root passwd
#exit
Enter and boot normally
```
