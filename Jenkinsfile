pipeline {
    agent any
    stages {
        stage('Verify K8S') {
            steps {
                sh 'whoami'
                sh 'kubectl get nodes'
                sh 'kubectl get pods,svc -A'
            }
        }
        stage('Deploy MyApp') {
            steps {
                sh '''
                kubectl create deployment myapp --image=nginx --replicas=2 --dry-run=client -o yaml | kubectl apply -f -
                kubectl expose deployment myapp --port=80 --type=NodePort --dry-run=client -o yaml | kubectl apply -f - || true
                kubectl rollout status deployment/myapp --timeout=60s
                kubectl get pods,svc
                '''
            }
        }
    }
}
