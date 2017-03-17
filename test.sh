#! /bin/bash

function usage {
  echo "Usage: $0 <PHP/PATH>" 1>&2
  exit 1
}

if [ -z "$1" ]
then
    echo -e "\e[31mPHP executable path must be defined as first argument\e[0m"
    usage
fi

STATUS=0
TEST_RES=""

PHP=$1

function test {
    TEST_RES=`$1`
    local TEST_RET=$?
    
    if [ $TEST_RET != 0 ]
    then
        echo -e "\e[31m$2 FAILED\e[0m"
        
        echo "$TEST_RES"
        
        STATUS=$((STATUS + $3))
    else
        echo -e "\e[32m$2 SUCCESS\e[0m"
    fi
}

if [ ! -d "doc" ]
then
    mkdir -p "doc"
fi

test "$PHP vendor/bin/phpunit" PHPUnit 100
echo "$TEST_RES" > doc/phpunit.txt

test "$PHP vendor/bin/phpcs --standard=PSR2 src/" PHPCS 100
echo "$TEST_RES" > doc/phpcs.txt

test "$PHP vendor/bin/phpmd src/ text ./phpmd.xml" PHPMD 100
echo "$TEST_RES" > doc/phpmd.txt

test "$PHP vendor/bin/phpcpd src/" PHPCPD 1
echo "$TEST_RES" > doc/phpcpd.txt

test "$PHP vendor/bin/sami.php update samiConfig.php" SAMI 1
echo "$TEST_RES" > doc/phpcpd.txt

if [ "$STATUS" -eq 0 ]
then
    echo -e "\n\e[42m"
    echo -e "\e[30mTHE STATUS IS STABLE\n\e[0m\n\e[49m"
elif [ "$STATUS" -lt 100 ]
then
    echo -e "\n\e[43m"
    echo -e "\e[30mTHE STATUS IS UNSTABLE\n\e[0m\n\e[49m"
else
    echo -e "\n\e[41m"
    echo -e "\e[30mTHE STATUS IS UNSTABLE\n\e[0m\n\e[49m"
fi

exit $STATUS
