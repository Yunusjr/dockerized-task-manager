Dockerized Task Manager



A simple task management web application built with PHP and MySQL, containerized using Docker and orchestrated with Docker Compose.



Project Overview



The Dockerized Task Manager allows users to create tasks, view their task list, and mark tasks as completed.



The project demonstrates how a web application and its database can run in separate containers and communicate through a Docker Compose network.



Features



\* Add new tasks

\* View existing tasks

\* Mark tasks as completed

\* Store tasks in a MySQL database

\* Run the application and database using Docker Compose

\* Persist database records using a Docker named volume



Technologies Used



\* PHP

\* MySQL 8

\* HTML

\* CSS

\* Docker

\* Docker Compose



Architecture



The application consists of two main services:



1\. Web service: Runs the PHP application and serves it through the web server.

2\. Database service: Runs MySQL and stores task records.



Docker Compose manages both services and their communication.



A named Docker volume is used to persist database data beyond the lifetime of an individual database container.



Project Structure



dockerized-task-manager/

├── src/

│   ├── index.php

│   └── styles.css

├── database/

│   └── init.sql

├── Dockerfile

├── compose.yaml

├── .env.example

├── .gitignore

└── README.md



Getting Started



Prerequisites



\* Docker Desktop

\* Git



Installation



1\. Clone the repository:



git clone https://github.com/Yunusjr/dockerized-task-manager.git



2\. Navigate into the project directory:



cd dockerized-task-manager



3\. Create a .env file using .env.example as a reference. Configure the required database credentials.

4\. Start the application:



docker compose up -d --build



5\. Open the application in your browser:



http://localhost:8085



Stopping the Application



docker compose down



To stop the containers while preserving database data, do not remove the named volume.



Learning Objectives



This project was developed to practise:



\* Building Docker images with a Dockerfile

\* Running multi-container applications

\* Managing services with Docker Compose

\* Connecting a PHP application to MySQL

\* Configuring environment variables

\* Persisting database data with Docker volumes

\* Using Git and GitHub for version control



Future Improvements



\* Add task editing and deletion

\* Implement user authentication

\* Add automated testing

\* Deploy the application to a cloud environment



Author



Yunus Junior Usman



GitHub: https://github.com/Yunusjr

