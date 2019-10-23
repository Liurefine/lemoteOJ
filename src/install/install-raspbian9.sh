#!/bin/bash
apt-get update
apt-get install -y subversion
/usr/sbin/useradd -m -u 1536 judge
cd /home/judge/
svn co https://github.com/zhblue/hustoj/trunk/trunk  src
for PKG in make flex g++ clang libmysqlclient-dev libmysql++-dev php7.0-fpm php7.0-memcache php-zip php-xml php-mbstring memcached nginx mysql-server php7.0-mysql php7.0-gd fp-compiler openjdk-7-jdk
do
	apt-get install -y $PKG
done

USER=`cat /etc/mysql/debian.cnf |grep user|head -1|awk  '{print $3}'`
PASSWORD=`cat /etc/mysql/debian.cnf |grep password|head -1|awk  '{print $3}'`
mkdir etc data log

cp src/install/java0.policy  /home/judge/etc
cp src/install/judge.conf  /home/judge/etc

if grep "OJ_SHM_RUN=0" etc/judge.conf ; then
	mkdir run0 run1 run2 run3
	chown judge run0 run1 run2 run3
fi

sed -i "s/OJ_USER_NAME=root/OJ_USER_NAME=$USER/g" etc/judge.conf
sed -i "s/OJ_PASSWORD=root/OJ_PASSWORD=$PASSWORD/g" etc/judge.conf

sed -i "s/DB_USER=\"root\"/DB_USER=\"$USER\"/g" src/web/include/db_info.inc.php
sed -i "s/DB_PASS=\"root\"/DB_PASS=\"$PASSWORD\"/g" src/web/include/db_info.inc.php

chown www-data src/web/upload data
if grep "client_max_body_size" /etc/nginx/nginx.conf ; then 
	echo "client_max_body_size already added" ;
else
	sed -i "s:include /etc/nginx/mime.types;:client_max_body_size    80m;\n\tinclude /etc/nginx/mime.types;:g" /etc/nginx/nginx.conf
fi

mysql -h localhost -u$USER -p$PASSWORD < src/install/db.sql
echo "insert into jol.privilege values('admin','administrator','N');"|mysql -h localhost -u$USER -p$PASSWORD 

cp src/install/nginx.default /etc/nginx/sites-available/default
/etc/init.d/nginx restart
sed -i "s/post_max_size = 8M/post_max_size = 80M/g" /etc/php7.0/fpm/php.ini
sed -i "s/upload_max_filesize = 2M/upload_max_filesize = 80M/g" /etc/php7.0/fpm/php.ini
sed -i 's/;request_terminate_timeout = 0/request_terminate_timeout = 128/g' `find /etc/php -name www.conf`
 
/etc/init.d/php7.0-fpm restart
service php7.0-fpm restart
cd src/core
bash ./make.sh
if grep "/usr/bin/judged" /etc/rc.local ; then
	echo "auto start judged added!"
else
	sed -i "s/exit 0//g" /etc/rc.local
	echo "/usr/bin/judged" >> /etc/rc.local
	echo "exit 0" >> /etc/rc.local
	
fi
/usr/bin/judged

