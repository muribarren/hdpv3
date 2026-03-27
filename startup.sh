  #!/bin/bash

  # Apuntar Apache al directorio public de Laravel
  echo "<VirtualHost *:80>
      DocumentRoot /home/site/wwwroot/public
      <Directory /home/site/wwwroot/public>
          AllowOverride All
          Require all granted
      </Directory>
  </VirtualHost>" > /etc/apache2/sites-available/000-default.conf

  service apache2 restart
