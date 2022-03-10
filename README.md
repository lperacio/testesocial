
    ## HOW TO DEPLOY
   
        
    
    * Clone the project
        git clone https://github.com/lperacio/testesocial.git
    
    * Go to inside directory of project  
         cd testesocial
    
    * Install all dependencies
        composer install
        npm install
        npm run dev
        
    * Copy file .env
        cp .env.example .env
    
    *Generate key
        php artisan key:generate 
    
    *To send e-mail configure inside file .env with your email data 
        MAIL_MAILER=smtp
        MAIL_HOST=HOST
        MAIL_PORT=587
        MAIL_USERNAME=
        MAIL_PASSWORD=
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS=
        MAIL_FROM_NAME=
        DESTINATION_MAIL=
        
    *To Database configure inside file .env with your server database data
    *First, create database with name dbcontato.   
        DB_CONNECTION=mysql
        DB_HOST=
        DB_PORT=
        DB_DATABASE=dbcontato
        DB_USERNAME=
        DB_PASSWORD=
        
     *Create table in database
        php artisan:migrate
       
     *Excute application
        php artisan serve
        
        
  I hope it worked!!!😄
        
        
