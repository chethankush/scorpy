OpenShift Failure Scenarios Playbook
1. Control Plane Failures
1.1 kube-apiserver Latency (Most Dangerous Failure)

Symptoms

oc commands hang or are slow

Timeouts in web console

Operators stuck in Progressing

etcd healthy but slow

Root Causes

etcd I/O latency

Excessive watch connections

Large CR objects

API server CPU starvation

Blast Radius

Entire cluster

Operators stop reconciling

Upgrades freeze

Key Signals

apiserver_request_duration_seconds

etcd_disk_wal_fsync_duration_seconds

API server pod CPU throttling

Design Opinion

API latency is worse than API downtime.
Design alerts on latency, not only availability.

1.2 etcd Quorum Loss

Symptoms

API server crash loops

etcdserver: request timed out

Cluster becomes read-only or unavailable

Root Causes

Network partition

Disk full

Slow disks

Uneven etcd placement

Blast Radius

Full control plane outage

No state changes possible

Recovery

Restore quorum

etcd snapshot restore (last resort)

Design Opinion

etcd disk latency is a cluster-killer. Never co-locate noisy workloads.

2. Operator-Related Failures
2.1 Operator Pod CrashLoop

Symptoms

CR status not updating

Application drift

CSV still Succeeded

Root Causes

Bad image

Panic in reconcile loop

OOM kills

Blast Radius

Limited to managed resources

Important Insight

Operators are level-based. They recover after restart.

2.2 CSV Stuck in Pending or Installing

Symptoms

Operator never comes up

Subscription looks healthy

Root Causes

Missing permissions

CRD conflicts

Webhook admission failure

Blast Radius

Operator unusable

Application onboarding blocked

Key Signal

oc describe csv <name>

2.3 Webhook Deadlock (Classic Interview Scenario)

Symptoms

CR creation hangs

Namespace deletion stuck forever

Root Causes

Webhook service down

Circular dependency

Blast Radius

API server request blocked

Partial cluster paralysis

Design Opinion

Webhooks are powerful but dangerous. Keep them minimal and HA.

3. CVO and Upgrade Failures
3.1 Cluster Upgrade Stuck

Symptoms

oc get clusterversion shows Progressing=True

One operator degraded

Root Causes

Manual config drift

Operator health dependency

Unsupported customization

Blast Radius

Entire cluster frozen at current version

Design Opinion

CVO enforces immutability. Fight it and you lose.

3.2 Control Plane Upgrade Failure

Symptoms

API flaps

Scheduler unavailable

Root Causes

Node drain failures

PDB violations

Blast Radius

Cluster-wide

Recovery

Fix blocking condition

Let CVO resume

4. Networking Failures
4.1 Ingress Failure

Symptoms

Routes return 503

Internal services healthy

Root Causes

Router pods down

Certificate issues

Load balancer failure

Blast Radius

External access only

Design Opinion

Always separate internal health from ingress health.

4.2 OVN-Kubernetes Degradation

Symptoms

Pod-to-pod traffic broken

DNS timeouts

Root Causes

ovnkube-node crash

NBDB/SBDB issues

Blast Radius

Multi-namespace

5. Storage Failures
5.1 PVC Filling Up Fast

Symptoms

Pods crash

Database goes read-only

Root Causes

WAL growth

No log rotation

Snapshot accumulation

Blast Radius

Application-level

5.2 CSI Driver Failure

Symptoms

Pods stuck in ContainerCreating

Volume mount errors

Blast Radius

Namespace-wide or cluster-wide

Design Opinion

Storage failures surface as compute problems.

6. Security Failures
6.1 SCC Misconfiguration

Symptoms

Pods fail to start

Permission denied errors

Blast Radius

Namespace-level

6.2 Certificate Expiry

Symptoms

Operators degraded

API rejects connections

Blast Radius

Control plane or specific operators

Design Opinion

Certificate rotation is not optional. Monitor expiry proactively.

7. Scheduling Failures
7.1 Pods Pending Forever

Symptoms

No scheduling events

Root Causes

Resource exhaustion

Taints

Affinity conflicts

Blast Radius

Application-specific

8. Observability Failures
8.1 Monitoring Stack Down

Symptoms

No alerts

Blind operation

Blast Radius

Operational risk, not immediate outage

Design Opinion

No monitoring = running blind.

9. Human-Induced Failures (Most Common)
9.1 Accidental Deletion

Namespace deletion

CR deletion

Operator uninstall

Blast Radius

Potentially catastrophic

Design Opinion

Humans are the largest failure domain.

10. Mental Model to Remember
API slow → Operators fail → Upgrades freeze → Platform unstable

Final Professional Insight

You already know how OpenShift works.
This playbook is about how OpenShift fails.
