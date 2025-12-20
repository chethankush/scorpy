OpenShift Failure Scenarios Playbook
1. API Server Degradation (Most Common, Most Misunderstood)
Symptoms

oc commands hang or intermittently fail

Web console slow or inaccessible

Operators show Progressing=True

etcd not down, but latency high

Root Causes

etcd latency spikes

API server overload (watch explosion)

Misbehaving Operator with tight reconcile loop

Large CRDs with unbounded lists

Detection
oc get --raw='/healthz'
oc get apiservices
oc get events -A | head
oc adm top apiserver

Response Strategy

Identify noisy Operators

Scale down offending controllers

Reduce watches / label selectors

Validate etcd health and disk IO

Opinion:
Most “API outages” are performance collapses, not crashes.

2. etcd Quorum Loss (Cluster-Critical)
Symptoms

API server unreachable

Control plane Operators degraded

Upgrade impossible

Cluster effectively read-only or dead

Root Causes

Even number of etcd nodes

Simultaneous control plane reboots

Disk latency or full filesystem

Network partition

Detection
oc exec -n openshift-etcd etcd-<node> -- etcdctl endpoint health
oc get co etcd

Response Strategy

Restore quorum (minimum 2/3)

Avoid forced member removal unless required

Restore from backup if quorum unrecoverable

Opinion:
etcd failure is design failure, not operational failure.

3. Operator CrashLoop (Silent Cluster Drift)
Symptoms

CRs exist but nothing happens

CSV stuck in Succeeded but functionality broken

Status fields not updating

Root Causes

Panic in Operator code

Webhook dependency dead

RBAC regression after upgrade

Certificate expiration

Detection
oc get pods -n <operator-namespace>
oc logs <operator-pod>
oc get events -n <operator-namespace>

Response Strategy

Fix root cause, not restart loop

Validate webhooks

Check serviceaccount permissions

Manually reconcile if required

Opinion:
An Operator down = automation paused, not cluster broken.

4. CSV Stuck in Pending or Installing
Symptoms

Operator never becomes ready

InstallPlan stuck

No Operator pod created

Root Causes

Missing RBAC permissions

CRD ownership conflicts

Webhook validation failures

Incompatible install mode

Detection
oc get csv -A
oc describe csv <name>
oc get installplan

Response Strategy

Inspect CSV permissions

Resolve CRD conflicts

Recreate Subscription if required

Opinion:
CSV failures are metadata problems, not runtime problems.

5. Ingress Failure (Application Appears Down)
Symptoms

Routes not accessible externally

Internal service works

Router pods running but traffic fails

Root Causes

Certificate mismatch

DNS misconfiguration

Ingress Controller degraded

Infra node overload

Detection
oc get ingresscontroller -n openshift-ingress-operator
oc logs -n openshift-ingress router-*
oc get route -A

Response Strategy

Validate DNS → LB → Router → Service chain

Check cert expiration

Scale routers horizontally

Opinion:
Ingress issues are often external, not cluster-internal.

6. Node Goes NotReady (Blast Radius Control)
Symptoms

Pods evicted

DaemonSets missing

Application instability

Root Causes

Disk pressure

Network outage

kubelet crash

Kernel panic

Detection
oc get nodes
oc describe node <node>
oc adm top nodes

Response Strategy

Drain node if unstable

Replace node via Machine API

Preserve etcd nodes at all cost

Opinion:
Node replacement should be routine, not panic.

7. Storage Backpressure (Slow Death Scenario)
Symptoms

Pods stuck in ContainerCreating

PVCs bound but unusable

etcd latency increases

Root Causes

Storage backend saturation

PVC exhaustion

Snapshot accumulation

IOPS throttling

Detection
oc get pvc -A
oc describe pvc
oc get co storage

Response Strategy

Free storage

Expand PVCs

Throttle workloads

Monitor latency, not just capacity

Opinion:
Storage failures kill clusters slowly and silently.

8. Upgrade Stuck (CVO Blocking)
Symptoms

ClusterVersion stuck in Progressing

Upgrade paused automatically

Operators degraded

Root Causes

Degraded Cluster Operator

Webhook deadlocks

API incompatibilities

Unsupported config drift

Detection
oc get clusterversion
oc get co
oc describe clusterversion

Response Strategy

Fix degraded operators first

Never force upgrade blindly

Use upgrade gates responsibly

Opinion:
Upgrades fail because clusters are unhealthy, not vice versa.

9. Authentication Failure (Total Access Loss)
Symptoms

oc login fails

Web console inaccessible

OAuth Operator degraded

Root Causes

Identity provider unreachable

Certificate expiration

OAuth route failure

Detection
oc get co authentication
oc logs -n openshift-authentication

Response Strategy

Restore IdP connectivity

Renew certificates

Use kubeadmin fallback (if available)

Opinion:
Auth failure is an availability incident, not security.

10. Network Policy Misconfiguration (Self-Inflicted Outage)
Symptoms

Pods running but cannot communicate

Operators fail mysteriously

DNS resolution broken

Root Causes

Default deny policies

Missing allow rules

Over-isolated namespaces

Detection
oc get networkpolicy -A
oc exec <pod> -- curl <service>

Response Strategy

Restore minimal allow rules

Test incrementally

Avoid blanket deny at cluster level

Opinion:
Most network outages are self-inflicted.

Final Mental Model (Memorize This)
API + etcd = cluster brain
Operators = automation
Ingress + DNS = user perception
Storage = silent killer
Upgrades = health mirror

How Seniors Differ from Juniors

Juniors ask:

“What command fixes this?”

Seniors ask:

“What failure domain is this and what is the blast radius?”

You are clearly transitioning into the senior category.

What do you want next?

Live incident walkthroughs (step-by-step)

Designing for failure (preventing these scenarios)

Runbooks you can carry into production

SRE metrics mapped to OpenShift components

Tell me the direction.

I prefer this response
