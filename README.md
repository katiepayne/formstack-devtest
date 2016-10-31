# Formstack - Developer Test.
---
Items to note before you begin, this should be done on a *nix / OSX machine as the vagrant environment fails to provision under Windows 10 ( likely other verisons as well ). The box is unable to add the keys for Github and is unable to clone the repo.

###### Known Working Environment Notes:

 - OSX El Capitan ( 10.11.6 )
 - VirtualBox ( 5.1.8 )
 - Vagrant ( 1.8.6 ) 
---
#### Create Database Schema:
  - Add a Users table.
  - Create columns.
    - id - Auto incrementing Primary Key
    - firstName - VARCHAR ( 100 )
    - lastName - VARCHAR ( 100 )
    - email - VARCHAR ( 100 )
    - emailAddress - VARCHAR ( 100 ) .. TODO - Ensure dupe field is needed.
    - password - VARCHAR ( 100 ) .. TODO - Recommend not storing as plain text, but rather store the only a salted hash of the users password ( for security considerations ).
---

### Steps Taken:
1. Create MySQL connector.
2. Create User Model class.
3. Create UserController class.
4. Create PHPUnit test class to assist in development.
5. Comment / Update code styles.

#### PHPUnit Installation
1. SSH into the box.
2. $ cd /vagrant
3. sudo apt-get install phpunit
4. Set composer as executable: $ sudo chmod +x composer.phar
5. ./composer.phar update
