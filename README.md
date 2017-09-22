PathfinderCasterCompanion


Project that aims to help players of the roleplaying game Pathfinder  with spellcasting. The goal was also for me to be more familiar with the Laravel framework. This project is still in it's early stage. It uses this database as a source for spells : http://www.d20pfsrd.com/magic/tools/spells-db/.

I have modified it to extract some columns into tables to improve this database. To install the database use the database.sql script. I will eventually create a script to update the database as new spells are published.

To run this website locally I use the laravel/homestead vagrant box. See https://laravel.com/docs/5.4/homestead for more informations. It is an Nginx server. The site's url is castercompanion.app. Don't forget to add it with the appropriate ip(probably 192.168.10.10 with homestead) on your hosts file.  

You should also generate a .env file or ask me one. 

Homestead.yaml example :

---
ip: "192.168.10.10"
memory: 2048
cpus: 2
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: /home/user/Projects/Laravel
      to: /home/vagrant/Code/
      type: "nfs"


sites:
    - map: castercompanion.app
      to: /home/vagrant/Code/CasterCompanion/public
    - map: phpmyadmin.app
      to: /home/vagrant/Code/phpmyadmin

databases:
    - homestead
