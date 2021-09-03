# import-csv
The task for this repository is to read a cvs file that has information about the train lines of chicage and display the data as well as being able to manipulate it. The program should also be able to allow the user to update records of train lines as well as delete them and create new records. The table that is displaying the data should also follow a set of guide lines from having unique queries and sorting them by the run number column. Extra features consisted of having a paganation option and sorting thorugh other columns.

With this project I'll also explain my thought process. I made the Run Number the unique id since in certain instances you can have an operator managing multiple train lines so i thought that the Run Number was the unique attribute since it also what was being sorted. If the operator ID should have been unique that is also posiible for me to change also. In this repo you will be able to upload a csv file and it will extrat all data except for the first line since that is the header. You wil also be able to use crud methods like updating creating and deleting records. this system will also have a pagination feature that will hold 5 records per page. Finally you will also be able to sort the table through train line as an added bonus.



Also this assignment was made WITHOUT using a single framework and in the simplest of enviornments to demestrate knowledge of functions and files alone. 


#SET UP
This program should be able to run in your Local envoirnent after some steps to set it up.
The procedure I ran to set up my local envoirnment follows:

Install Xammp into your local drive 

open Xamp and make sure SQL is on your local host:8080 is on and your volume is mounted 

once its mounted you will see Xampp drive on your desktop open it on head over to your htdocs folder 

in this folder is where you will put this repo at so it could connect to the local server 

you will then go on configs.php folder and modify the setiings envoirnment based on the local host db information (I recommend leaving db name to "TestDb" for coninuity but you can change it to whichever name your prefer.

next go to http://localhost:8080/phpmyadmin/ and make sure have a databse with the name you for DB in the configs.php file if not create one After you have that created you import the Message.sql file in the database found in the sql folder so that you can have the table created. 

From ther you can go to http://localhost:8080/import-csv/index.php and the software should be able to show 


<img width="1289" alt="Screen Shot 2021-09-03 at 10 20 47 AM" src="https://user-images.githubusercontent.com/30737409/132037651-4bdceb03-761c-400e-9250-d444b87c6060.png">


