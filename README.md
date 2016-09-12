# PHPAzureStorage
Sample Application for PHP and Azure Storage
  
    
1. Create your Azure Web App
2. Change the Azure Storage settings "connectionString" in AzureController.php in app\Http\Controllers to your storage settings.
3. Change the database config info in config/database.php and root/.env to match your database details.
4. Upload source code via FTP
5. Install Composer for Laravel App  
  a) Under the Web App Options click Extensions > ADD (to add an Extension)  
  b) Select Composer in the Choose Extension Blade (blade: a portal page that opens horizontally).  
  c) Click OK in the Accept legal terms blade.  
  d) Click OK in the Add extension blade.  
6. Setup Application Settings  
  a) Click Settings > Application Settings  
  b) setup PHP Version 5.6
  c) Scroll to the bottom of the blade and change the root virtual directory to point to site\wwwroot\public instead of site\wwwroot.
7. Under Options click "Console". and run the following commands:
  php artisan key:generate
  composer install
8. Navigate to the URL of your application to see it work.
