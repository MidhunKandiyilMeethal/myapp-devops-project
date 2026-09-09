# 🚀 Enterprise DevOps CI/CD Pipeline - MyApp on EKS

> Complete end-to-end DevOps implementation with Jenkins, Docker, ECR, Helm, Kubernetes (EKS v1.30.14) & Monitoring Stack

**Account:** `186067932771` | **Cluster:** EKS v1.30.14 | **Status:** ✅ LIVE & RUNNING

---

## 📸 FINAL PROOF - All Systems GO!

```bash
myapp-dd8566847-hs4zd   1/1   Running   0   173m   192.168.126.35   k8s-worker2
myapp-dd8566847-wcj52   1/1   Running   0   173m   192.168.194.103  k8s-worker1
k8s-master  Ready  control-plane  46h  v1.30.14
k8s-worker1 Ready  worker         46h  v1.30.14
k8s-worker2 Ready  worker         46h  v1.30.14
ECR: 186067932771.dkr.ecr.us-east-1.amazonaws.com/myapp:latestPart of this response isn't supported on this device yet. View the full response on your phone.
🏗️ ArchitecturejavascriptGitHub Push -> Jenkins Pipeline -> Docker Build -> AWS ECR -> Helm Deploy -> EKS Cluster
                                                                  |
                                                                  -> Prometheus + Grafana MonitoringFlow:
Developer pushes code to GitHub (f86ad40)Jenkins auto-triggers (Webhook)Jenkins builds Docker imagePushes to AWS ECR (latest tag verified)Helm upgrades deployment on EKSPods running on k8s-worker1/2Prometheus scrapes metrics, Grafana visualizes🛠️ Tech StackCategoryToolVersion / DetailsCloudAWSAccount 186067932771, Region us-east-1Container OrchestrationKubernetes / EKSv1.30.14, 3 Nodes (1 Master, 2 Workers)CI/CDJenkinsPipeline Success - Build #f86ad40IaC / PackagingHelmmyapp chart v0.1.0RegistryAWS ECRmyapp repo with latest tagMonitoringPrometheus + GrafanaTargets UP, Dashboards ReadyAppMyApp + MySQL2x Replicas Running✅ Verification Steps
1. Kubernetes Clusterbashkubectl get pods -o wide
kubectl get nodes
# Result: 2 myapp pods Running, 1 mysql Running, 3 nodes Ready v1.30.142. AWS & ECRbashaws sts get-caller-identity
# {"Account": "186067932771", "Arn": "arn:aws:iam::186067932771:root"}

aws ecr list-images --repository-name myapp --region us-east-1
# "imageTag": "latest" - Present3. Application LivejavascriptApp URL: http://3.84.192.179:9000 (Example from previous run)
Status: 200 OK4. Monitoring
Prometheus: All targets UPGrafana: Dashboards configured📂 Project Structurejavascriptmyapp/
├── Dockerfile
├── Jenkinsfile
├── helm/
│   └── myapp/
│       ├── Chart.yaml
│       ├── values.yaml
│       └── templates/
├── k8s/
│   ├── deployment.yaml
│   └── service.yaml
└── src/🚀 Deployment
Automated via Jenkins. Manual trigger:bashhelm upgrade --install myapp ./helm/myapp --namespace default
kubectl rollout status deployment/myapp👨‍💻 Author
DevOps Engineer - Enterprise CI/CD Project
AWS Certified | EKS | Jenkins | Docker | Helm | PrometheusLive Proof: Screenshots attached in /screenshots folder.
