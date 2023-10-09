pipeline {
    agent any
    tools{
        jdk 'jdk17'
    }
   
    stages {
        stage('git checkout') {
            steps {
                git 'https://github.com/orewa-snk01/php_application.git'
            }
        }
        
        stage('trivy fs') {
            steps {
               sh "trivy fs ."
            }
        }
        

        
        
        stage('docker image') {
            steps {
                script{
                    withDockerRegistry(credentialsId: 'docker-1', toolName: 'docker') {
                        sh "docker build -t php_app ."
                        sh "docker tag php_app naveenkumar06/php_app"
                    }
                }

            }
        }
       
        stage('docker image push') {
            steps {
                script{
                    withDockerRegistry(credentialsId: 'docker-1', toolName: 'docker') {
                        sh "docker tag php_app naveenkumar06/php_app"
                        sh "docker push naveenkumar06/php_app"
                   }
                }
               
               
            }
        }
        
        stage('docker deploy') {
            steps {
                script{
                    withDockerRegistry(credentialsId: 'docker-1', toolName: 'docker'){
                        sh "docker run -d -p 8090:80 php_app"
                    }
                }
            }
        }
    }
}
