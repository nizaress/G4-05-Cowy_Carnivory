# DSS_Proyect-G4-05-Cowy-Carnivory  

<h1>Instructions to build up the Project</h1>

<p> First, create a database ‘dss’ and a user ‘dss’ with password‘dss’ in order to access the database in an uniform way.</p>
<p> Type the following commands in the mysql console:</p>
 <p> sudo mysql </p>
 <p> mysql> CREATE DATABASE dss CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; </p>
 <p> mysql> CREATEUSER 'dss'@'localhost' IDENTIFIED BY 'dss'; </p>
 <p> mysql> GRANT ALL PRIVILEGES ON *.* TO 'dss'@'localhost'; </p>
 <p> mysql> FLUSH PRIVILEGES; </p>

<p> 1º Go to the folder "Work-Project" and open it in a terminal</p>
<p> 2º Type the command "composer install" for installing the PHP dependencies in vendor/</p>
<p> 3º Type the command "cp .env.example .env" to manually recreate production environment</p>
<p> 4º Type the command "nano .env" to open the .env file</p>
<p> 
5º Inside the .env file, change the following database requirements:
DB_DATABASE=dss
DB_USERNAME=dss
DB_PASSWORD=dss
</p>
<p> 6º Type the command "chmod +x vendor/bin/phpunit" to give permissions to access the phpunit.xml file</p>
<p> 7º Type the command "mysql -u dss -p dss -D dss" in order 
to log in to MySQL with the corresponding credentials: 
Username = "dss", Database = "dss",  Password = "dss"</p>
<p> 8º In the MySQL terminal, input the command "USE dss;" in order 
to use the database "dss". After that, input "exit" in the terminal.</p>
<p> 9º Type "php artisan migrate" to build up the migrations</p>
<p> 10º Type "php artisan db:seed" to seed the databse</p>
<p> 11º Type "php artisan test" to run the phpTests</p>
<p> 12º Search in your browser "http://localhost/adminer" in order to access to the adminer webpage and see the tables created in the database. You can
access to that tables with the given credentials</p>
<p> 13º Type "php artisan serve" to start the server</p>
<p> 14º Type "http://localhost:8000/" to view the main webpage of the Laravel Project</p>
<p> 15º Have a Lot of Fun UwU</p>

