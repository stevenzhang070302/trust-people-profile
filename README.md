# Trust People Profile Page Prototype
Project under Vdart Digital

Project using pgSQL, php, Vue.js

# Instructions
Download and install xampp and pgSQL. Open xammp control and start apache and mySQL. Open pgAdmin and create a database/tables or import the excel spreadsheets into pgAdmin. You may have to change code in db.php to connect with your own pgAdmin. Install this folder. put all the contents inside of htdocs in the xammp folder. To access the website, open a browser and type in localhost/[folder-name]/profile.php.

# Demo images
![home](https://github.com/stevenzhang070302/trust-people-profile/blob/master/homepage.PNG?raw=true)
![profile](https://github.com/stevenzhang070302/trust-people-profile/blob/master/profile.PNG?raw=true)
![profile2](https://github.com/stevenzhang070302/trust-people-profile/blob/master/profile2.PNG?raw=true)
![profile3](https://github.com/stevenzhang070302/trust-people-profile/blob/master/profile3.PNG?raw=true)



# Project Issues
* The upload profile picture function does not connect to a backend database(working)
* There is no way to display a profile picture after a user uploads a new profile picture(Vue.js function to display images)
* The searchbar is static and does not have any working functionalities to search through posts and profiles
* The page is somewhat responsive, but more work is needed with using media queries and making the page scale correctly to all screen sizes
* The follow and message buttons are static and do not work in terms of functionality
* Password validation has some issues where the confirm password does not verify one's password yet(See the register page code to fix this feature) and creating a new password may have pgSQl/table connectivity issues
