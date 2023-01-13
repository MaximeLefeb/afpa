"post-install-cmd": [
    "@auto-scripts"
],
"post-update-cmd": [
    "@auto-scripts"
]


www:
    build: php
    container_name: www_docker_symfony
    ports:
        - "8741:80"
    volumes:
        - ./php/vhosts:/etc/apache2/sites-enabled
        - ./:/var/www
    restart: always
    networks:
        - dev