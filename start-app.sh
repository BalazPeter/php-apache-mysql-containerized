echo "Prepinam sa do suboru s aplikaciou"
cd php-apache-mysql-containerized
echo "Zostavovanie aplikacie"
docker-compose build
echo "Spustenie sluzieb a aplikacie"
docker-compose up