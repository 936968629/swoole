echo "loading"
pid=`pidof live_master`
echo $pid
sudo kill -USR1 $pid
echo "loading success"