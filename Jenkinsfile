#!groovy
pipeline {
    agent any
    triggers {
        githubPush()
      }
    stages {
      environment {
        IP_ADD =  sh(returnStdout: true, script: "cat /home/ubuntu/iptest")
        IP_PROD =  sh(returnStdout: true, script: "cat /home/ubuntu/ipprod")
      }
        stage('sending files') {

            steps {

                sh ''' #!/bin/bash
                scp -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa $PWD/pages ubuntu@$IP_ADD:/home/ubuntu
                scp -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa $PWD/pages ubuntu@$IP_PROD:/home/ubuntu
                '''
                echo "file transfer done"

            }
        }

        stage('updating website_on_test') {

            steps {
              sh ''' #!/bin
                ssh -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa  ubuntu@$IP_ADD sudo docker cp /home/ubuntu/pages servs:/var/www/html/pages


               '''

          }
        }
        stage('updating website_on_prod') {
          environment {
            IP_ADD =  sh(returnStdout: true, script: "cat /home/ubuntu/iptest")
            IP_PROD =  sh(returnStdout: true, script: "cat /home/ubuntu/ipprod")
          }
            steps {
              sh '''#!/bin
               ssh -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa  ubuntu@$IP_PROD sudo docker cp /home/ubuntu/pages servs:/var/www/html/
cludes/
          '''
          }
        }

        }
    }
}
