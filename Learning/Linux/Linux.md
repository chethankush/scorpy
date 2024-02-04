- [Performance Analysis](#performance-analysis)
### Performance Analysis
<details>
<summary>How to check process usage?</summary><br><b>

pidstat
</b></details>

<details>
<summary>How to check disk usage?</summary><br><b>

  `iostat -xz 1`
</b></details>

<details>
<summary>How to check CPU activity, memory paging, network issues, process and thread allocation?</summary><br><b>

` 
  1) Check under /var/log/sysstat if the data is collected or not
  2) If not collecting then check if the system stat is installed you can install by  $sudo apt  install sysstat
  3) Edit the file /etc/default/sysstat file  and change ENABLED="true"
  4) restat the sysstat using $systemctl restat sysstat
  5) Check the files under  /var/log/sysstat/ where data will be collected. (Note: This may consume disk space regular monitoring is required)
  6) Use the command $sar -n TCP.ETCP  1 to check tcp.ETCP live data. playaround with $sar for command for multiple uses.
`
</b></details>

