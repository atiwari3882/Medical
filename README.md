Medical
=======

This small test project is regarding to create medical conditions & symtoms and list all conditions with symptoms on homepage /. so what I have done to create user, I have used some third party bundle like FOSUserBundle, DoctrineFixture, KnpPaginator. Rest everthing in detail description in pdf which I gotted by email

Few basic step need to do for setup project

STEP 1=> Take clone of this project
    
        $ git clone https://github.com/atiwari3882/Medical.git
        
STEP 2=> Move inside project directory 
    
        $ cd Medical/
STEP 3=> For configure project in local, you you need to have composer.phar
        
        $ curl -sS https://getcomposer.org/installer | php
        
STEP 4=> Install project in local by using composer.phar

        $ php composer.phar update
STEP 5=> Give some permission on cache & logs file
    
        $ sudo chmod 0777 -R app/cache/
        $ sudo chmod 0777 -R app/logs/
        
STEP 6=> Create database for the project

        $ php app/console doctrine:database:create
STEP 7=> Create entities, schema & assets 

        $ php app/console generate:doctrine:entities Medical && php app/console doctrine:schema:update --force && php app/console assets:install web
STEP 8 => Final execute fixture command for have some default data 

        $ php app/console doctrine:fixtures:load
        
        Fixture will load 1 user & 2 conditions & 4 symptoms, each conditions have 2 symptoms as in pdf.

A Symfony project created on April 4, 2015, 5:54 am.
