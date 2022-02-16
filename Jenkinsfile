#!groovy
pipeline {
    agent any
    triggers {
        githubPush()
      }
    stages {

        stage('sending files') {
          environment {
            IP_ADD =  sh(returnStdout: true, script: "cat /home/ubuntu/iptest")
            IP_PROD =  sh(returnStdout: true, script: "cat /home/ubuntu/ipprod")
          }
            steps {

                sh ''' #!/bin/bash
                sudo chmod 777 pages/*
                scp -r -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa $PWD/pages ubuntu@$IP_ADD:/home/ubuntu
                scp -r -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa $PWD/pages ubuntu@$IP_PROD:/home/ubuntu
                scp -r -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa $PWD/default.catalog ubuntu@$IP_ADD:/home/ubuntu
                scp -r -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa $PWD/default.catalog ubuntu@$IP_PROD:/home/ubuntu

                '''
                echo "transfer done"

            }
        }

        stage('updating website_on_test') {
          environment {
            IP_ADD =  sh(returnStdout: true, script: "cat /home/ubuntu/iptest")
            IP_PROD =  sh(returnStdout: true, script: "cat /home/ubuntu/ipprod")
          }
            steps {
              sh ''' #!/bin
                ssh -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa  ubuntu@$IP_ADD sudo docker cp /home/ubuntu/pages servs:/var/www/html
                ssh -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa  ubuntu@$IP_ADD sudo docker cp /home/ubuntu/default.catalog servs:/var/www/html/includes/templates/

               '''
               sh '''
                              export status=$(curl -o /dev/null -s -w "%{http_code}\n" http://$IP_ADD/index.php)
                              if [ $status -eq 301 ]
                              then
                              exit 0
                              else
                              exit 1
                              fi
                              '''
          }
        }
        stage('updating website_on_prod') {
          environment {
            IP_ADD =  sh(returnStdout: true, script: "cat /home/ubuntu/iptest")
            IP_PROD =  sh(returnStdout: true, script: "cat /home/ubuntu/ipprod")
          }
            steps {
              sh '''  #!/bin
              ssh  -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa  ubuntu@$IP_PROD sudo docker cp /home/ubuntu/default.catalog servs:/var/www/html/includes/templates/
              ssh  -o StrictHostKeyChecking=no -i /home/ubuntu/id_rsa  ubuntu@$IP_PROD sudo docker cp /home/ubuntu/pages servs:/var/www/html



          '''
          }
        }
        }
}
