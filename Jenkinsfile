pipeline {
    agent any
    stages {
        stage('Build') {
            steps { 
                sh 'docker build -t myapp:latest .'
                sh 'docker images | grep myapp'
            }
        }
        stage('Deploy') {
            steps { 
                sh 'kubectl apply -f deployment.yaml'
            }
        }
        stage('Verify') {
            steps { 
                sh 'kubectl get pods,svc'
                sh 'kubectl get nodes'
            }
        }
    }
}
