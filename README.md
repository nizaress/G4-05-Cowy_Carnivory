# DSS_Proyect-G4-05-Cowy-Carnivory  

<h1>Instructions to build up the Project</h1>
<p> 1º Go to folder "Work-Project" and open it in a terminal</p>
<p> 2º Type the command "chmod +x vendor/bin/phpunit" to give permissions   to access the phpunit.xml file</p>
<p> 3º Type the command "mysql -u dss -p dss -D dss" in order 
to log in to MySQL with the corresponding credentials: 
Username = "dss", Database = "dss",  Password = "dss"</p>
<p> 4º In the MySQL terminal, input the command "USE dss;" in order 
to use the database "dss". After that, input "exit" in the terminal.</p>
<p> 5º Type "php artisan migrate" to build up the migrations</p>
<p> 6º Type "php artisan db:seed" to seed the databse</p>
<p> 7º Type "php artisan test" to run the phpTests</p>
<p> 8º Search in your browser "http://localhost/adminer" in order to access to the adminer webpage and see the tables created in the database. You can
access to that tables with the given credentials</p>
<p> 9º Type "php artisan serve" to start the server</p>
<p> 10º Type "http://localhost:8000/" to start the server</p>

