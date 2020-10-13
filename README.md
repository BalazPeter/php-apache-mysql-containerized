

Pre každú službu webovej aplikácie by malo platiť:
-   počúva na svojom porte,
-   beží vo vlastnom Docker kontajneri,
-   dokáže komunikovať s ostatnými službami ktoré potrebuje.


-   skript pre štart nazvaný  `start-app.sh`
-   skript pre koniec nazvaný  `end-app.sh`
-   ak je to potrebné, pridajte aj skript pre zostavenie aplikácie nazvaný  `prepare-app.sh`
-   Súbor s dokumentáciou  `README.md`  

Vytvorenie webovej aplikácie pozostávajúcej zo servera apache, databázového systému MySQL a webovej reprezentácie za použitia jazyka PHP. Cez webovú aplikáciu je možné prehľadávať, vytvárať, meniť či mazať záznamy v databáze.

Zložka obsahuje:
 - `php-apache-mysql-containerized` - v tejto zložke sa nachádzajú súbory inštrukcií pre automatické stiahnutie a vytvorenie jednotlivých obrazov
		 - `apache` - Dockerfile pre špecifikáciu služby apache
		 - `php ` - Dockerfile pre špecifikáciu služby php 
		 - `public_html` - Zloška so stránkami ktoré uvidíme cez prehliadač  
- `.env` - súbor obsahujúci premenné použité pri compose
- `docker-compose.yml` - súbor slúžiaci na spustenie viac-kontajnerovej aplikácie 
- `start-app.sh` - script slúžiaci na spustenie a prípravu aplikácie 
- `end-app.sh` - script slúžiaci na vypnutie a odstránenie kontajnerov 

### Postup spustenia a pripojenia
Otvoríme konzolu (napr. GIT bash)  a v nej sa presunieme do zložky `zadanie`. Po zadaní príkazu `ls`, by sme mali vidieť súbory, nachádzajúce sa v zložke, medzi ktorými je aj súbor `start-app.sh`. 
Ten spustíme príkazom  `sh start-app.sh`. Ak všetko prebehlo úspešne, presunieme sa do webového prehliadača (Ideálne Chrome alebo Firefox) a do vyhľadávania zadáme adresu `192.168.99.100:80`. Tá nás privedie na inicializačnú stránku aplikácie, ktorá nás po úspešných operáciach prevedie na stránku slúžiacu na komunikáciu s databázou. 
### Postup ukončenia
Pre ukončenie aplikácie v konzolovom prostredí stlačíme kombináciu `ctrl+c` a následne spustíme script príkazom `sh end-app.sh` ktorý nám dodatočne zastaví bežiace služby a zmaže ich kontajnere.
### Inštalácia služieb
Pri vytváraní služieb sme použili štruktúru  poskytujúcu rýchle získanie služieb, ktorú sme upravili podľa vlastných potrieb. Služby dostupné na:
[Containerize This: PHP/Apache/MySQL](https://github.com/mzazon/php-apache-mysql-containerized)
