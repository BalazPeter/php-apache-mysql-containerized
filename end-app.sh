echo "Vypinam aplikacie:"
docker stop apache
docker stop mysql
docker stop php
echo "Premazavam aplikacie:"
docker rm apache
docker rm mysql
docker rm php