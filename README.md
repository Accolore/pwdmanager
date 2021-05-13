# PWD MANAGER

## Description

This script implement a password manager, with mutiple user access, password and data encryption and multiple 

## Installation

1. clone the repository with git
    $ git clone https://github.com/Accolore/pwdmanager.git
2. open file application/config/database.php and edit the database connection parameters

If the project is installed in a subfolder (like http://www.mywebsite.com/pwdmanager/)

3. open file application/config/config.php and edit line 27 writing the correct filder name
4. open .htaccess file and edit lines  9 to writing the correct filder name
5. launch the setup configuration page and follow the instructions

    http://www.mywebsite.com/pwdmanager/setup/

If the project is installed in the domain root (like http://www.mywebsite.com/)

3. open file application/config/config.php, comment line 26 (adding '//') and uncomment line 27 (removing '//')
4. open .htaccess file, uncomment line 6 (removing '#') and comment line 9 (adding '#')name
5. launch the setup configuration page and follow the instructions

    http://www.mywebsite.com/setup/