###To install ArgoCd 

You need to create a namespace for argocd.
```bash
kubectl create ns argocd
```
and then choose one of the below options :

1. Non-HA:
```bash
a. cluster-admin privileges: https://raw.githubusercontent.com/argoproj/argo-cd/stable/manifests/install.yaml

b. namespace level privileges: https://github.com/argoproj/argo-cd/raw/stable/manifests/namespace-install.yaml
```

2. HA:
```bash
a. cluster-admin privileges: https://github.com/argoproj/argo-cd/raw/stable/manifests/ha/install.yaml

b. namespace level privileges: https://github.com/argoproj/argo-cd/raw/stable/manifests/ha/namespace-install.yaml
```

3. Light installation "Core"
```bash
https://github.com/argoproj/argo-cd/raw/stable/manifests/core-install.yaml
```

4. Helm chart:
```bash
   https://github.com/argoproj/argo-helm/tree/main/charts/argo-cd
```
