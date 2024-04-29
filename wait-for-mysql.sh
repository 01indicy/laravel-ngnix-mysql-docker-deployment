#!/bin/bash

# Config
host=db
port=4306
username=lumen
password=secret
dbname=lumen

# Max tries
maxtries=15

echo "Waiting for MySQL to initialize..."

try=0
while [[ $try -lt $maxtries ]]
do
  result=`mysql -h$host -P$port -u$username -p$password -e "use $dbname;"`
  if [[ $result != *"ERROR"* ]]
  then
    echo "MySQL is ready"
    exit 0
  else
    echo "MySQL not ready yet...try: $try/$maxtries"
    sleep 5s
    try=`expr $try + 1`
  fi
done

echo "MySQL not ready after $try tries. Exiting with error."
exit 1
