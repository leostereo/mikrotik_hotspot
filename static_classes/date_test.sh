a=$(date -u "+%F %T")
b="${a/ /T}.000Z"

echo $b;
