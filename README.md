
# Club Monitoring Web Application

A web-based Club Monitoring system which can be used by different universities to monitor their clubs. There are four types of users available: Admin, Director, Executives and General Memvbers. 

Admin create initial accounts of Directors and Members. Also this account can block or unblock any kind of Members from accessing the system.

Director monitor all the activitities of clubs. In the Application Management of this system, This account can approve or reject an Application. This account also used to Assign or Remove executives of clubs.

Executives can create, block or unblock their own members account, Send Application to Directors, Send notice to all their club members.

Members can see the notices. 



## Installation

This Project is made by Laravel Framework, React and MySQL for Database.

Before use this project, Please do the followings. 

```bash
  Install Laravel Version 8X or higher.
  install MySQL Ver 15.1 Distrib 10.4.24-MariaDB.
  Install React (Not mandatory if you do not want to run React, Because Laravel Blade engine is used to develop frontend also)
```
Clone the project

```bash
  git clone https://github.com/mahimtalukder/ClubMonitoringWebPortal.git
```  
For Laravel: (Go to Project Directory and run the following commands by GitBash)
```bash
1. cp  .env.example .env
2. composer install 
3. composer require doctrine/dbal:2.*
4. php artisan key:generate
5. php artisan migrate:fresh --seed
6. php artisan serve
```

For React: (Go to "club-monitoring-web-portal-react-app" folder inside project directory and run the following commands by GitBash)
```bash
5:  npm install
6: npm start
```  

## Screenshots

![App Screenshot](https://raw.githubusercontent.com/mahimtalukder/ClubMonitoringWebPortal/main/screenshots/applications.png)

![App Screenshot](https://raw.githubusercontent.com/mahimtalukder/ClubMonitoringWebPortal/main/screenshots/compose_applications.png)

![App Screenshot](https://raw.githubusercontent.com/mahimtalukder/ClubMonitoringWebPortal/main/screenshots/read_approve_application.png)

![App Screenshot](https://raw.githubusercontent.com/mahimtalukder/ClubMonitoringWebPortal/main/screenshots/assign_executives.png)

![App Screenshot](https://raw.githubusercontent.com/mahimtalukder/ClubMonitoringWebPortal/main/screenshots/notices.png)

![App Screenshot](https://raw.githubusercontent.com/mahimtalukder/ClubMonitoringWebPortal/main/screenshots/email.png)
