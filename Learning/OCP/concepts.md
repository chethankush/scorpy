1. Core Kubernetes Concepts (Foundation in OCP)

Cluster

Control Plane

Worker Nodes

kube-apiserver

kube-scheduler

kube-controller-manager

kubelet

etcd

Pods

Containers

Namespaces

Labels

Annotations

Selectors

ReplicaSets

Deployments

StatefulSets

DaemonSets

Jobs

CronJobs

Services

Endpoints

ConfigMaps

Secrets

Resource Requests

Resource Limits

Liveness Probes

Readiness Probes

Startup Probes

Horizontal Pod Autoscaler (HPA)

Vertical Pod Autoscaler (VPA)

Node Affinity

Pod Affinity / Anti-Affinity

Taints and Tolerations

PriorityClasses

API Aggregation

Admission Controllers

Mutating Webhooks

Validating Webhooks

2. OpenShift-Specific Core Concepts

Projects (Extended Namespaces)

Routes

BuildConfigs

ImageStreams

DeploymentConfigs

Source-to-Image (S2I)

Binary Builds

Web Console

oc CLI

OpenShift REST APIs

OAuth Server

Integrated Authentication

Integrated Authorization

Cluster Settings

Infrastructure Nodes

Control Plane Nodes

Worker Nodes

Machine API

MachineSets

Machines

Cluster Autoscaler

Machine Autoscaler

3. Networking Concepts (OpenShift Networking)

Cluster Network

Service Network

Pod Network

Software Defined Networking (SDN)

OVN-Kubernetes

Multus

CNI Plugins

NetworkAttachmentDefinitions

Egress IP

Egress Firewall

Egress Router

Network Policies

Default Deny Policy

Ingress Controller

Router Pods

HAProxy Router

Routes (Edge / Passthrough / Re-encrypt)

Internal Services

External Services

Load Balancer Services

DNS Operator

CoreDNS

Service Discovery

Network Isolation

Namespace Network Segmentation

4. Storage Concepts

Persistent Volumes (PV)

Persistent Volume Claims (PVC)

StorageClasses

Dynamic Provisioning

CSI Drivers

VolumeSnapshots

VolumeSnapshotClasses

RWX / RWO / ROX

Block Storage

File Storage

Object Storage (via Operators)

Local Storage Operator

OpenShift Data Foundation (ODF)

Ceph (RBD, CephFS, RGW)

Storage Encryption

PVC Expansion

Storage Quotas

5. Security Concepts (Critical in OpenShift)

Security Context Constraints (SCC)

Pod Security Admission

Service Accounts

RBAC

Roles

RoleBindings

ClusterRoles

ClusterRoleBindings

OAuth Providers

Identity Providers (LDAP, GitHub, OIDC)

TLS Certificates

Certificate Authority (CA)

etcd Encryption

Secrets Encryption

Image Signing

Image Vulnerability Scanning

Compliance Operator

Audit Logs

FIPS Mode

SELinux

seccomp

Capabilities

Privileged Containers

Node Security

6. Image and Registry Concepts

Integrated Image Registry

ImageStreams

ImageStreamTags

ImageStreamImports

Image Pruning

Registry Operator

External Registries

Image Pull Secrets

Image Push Secrets

Digest-based Images

Tag-based Images

Build Triggers

Webhooks

Quay Integration

Mirror Registries

7. Build and CI/CD Concepts

Builds

BuildConfigs

S2I Builds

Dockerfile Builds

Jenkins Integration

Pipelines (Tekton)

PipelineRuns

TaskRuns

Triggers

GitOps

Argo CD

ApplicationSets

Webhooks

Build Strategies

Binary Input Builds

8. Operator Framework Concepts

Operators

Operator Lifecycle Manager (OLM)

ClusterServiceVersion (CSV)

CustomResourceDefinitions (CRDs)

Custom Resources (CRs)

Subscriptions

InstallPlans

CatalogSource

OperatorHub

Bundle Images

Channels

Install Modes

Leader Election

Reconciliation Loop

Controller Runtime

Operator SDK

9. Cluster Version Operator (CVO) and Upgrade Concepts

Cluster Version Operator (CVO)

ClusterVersion CR

Payload Image

Release Image

Update Graph

Upgrade Channels

Minor Version Upgrade

Z-stream Upgrade

Rolling Upgrade

Control Plane Upgrade

Worker Node Upgrade

Upgrade Gates

Upgrade Conditions

Upgrade Pausing

Version Skew

Cluster Operators

Cluster Operator Status

Degraded State

Progressing State

Available State

10. Monitoring, Logging, and Observability

Cluster Monitoring Operator

Prometheus

Alertmanager

Grafana

User Workload Monitoring

Metrics Server

ServiceMonitors

PodMonitors

Loki

Vector

Fluentd

Log Forwarding

Audit Logging

Metrics Retention

Alert Rules

Recording Rules

Health Checks

11. Scheduling and Resource Management

Scheduler Profiles

Pod Priority

Preemption

Resource Quotas

LimitRanges

Node Selectors

Topology Spread Constraints

CPU Manager

HugePages

NUMA Awareness

Overcommitment

QoS Classes

12. Multi-Tenancy and Isolation

Namespace Isolation

Project Isolation

Network Policies

SCC Isolation

RBAC Isolation

Resource Quotas per Project

Multi-Cluster Management

ACM (Advanced Cluster Management)

Cluster Federation

Managed Clusters

13. Backup, Restore, and Disaster Recovery

etcd Backup

etcd Restore

Application Backup

Velero

OADP Operator

Volume Backups

Snapshot Restore

Cluster Recovery

Control Plane Recovery

14. Platform Operations and Administration

Cluster Installation (IPI / UPI)

Bootstrap Node

Ignition

DNS Configuration

Load Balancers

API Load Balancer

Ingress Load Balancer

Certificates Rotation

Node Draining

Node Cordoning

Cluster Scaling

Node Replacement

Infrastructure Monitoring

Troubleshooting

Must-Gather

Diagnostics

15. Access and User Experience

Web Console UI

Developer Perspective

Administrator Perspective

oc CLI

kubectl Compatibility

REST API Access

OAuth Tokens

Kubeconfig

Contexts

16. Advanced and Enterprise Features

FIPS Compliance

Disconnected Installation

Air-Gapped Clusters

Mirror Registries

Proxy Configuration

Multi-Architecture Clusters

GPU Support

SR-IOV

DPDK

Real-Time Kernel

Bare Metal Provisioning
