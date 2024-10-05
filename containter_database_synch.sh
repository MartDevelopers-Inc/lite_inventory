docker run -d \
  --name mysql_container \
  -e MYSQL_ROOT_PASSWORD= \
  -e MYSQL_DATABASE=lite_inventory \
  -e MYSQL_USER=lite_inventory \
  -e MYSQL_PASSWORD=20Devlan@ \
  -v mysql_data:/var/lib/mysql \
  mysql:latest
