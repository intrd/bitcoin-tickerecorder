##
# Bitcoin ticker recorder for exchanges
#
# @package intrd/bitcoin-tickerecorder
# @version master
# @tags bot, eggdrop, bitcoin
# @link http://github.com/intrd/bitcoin-tickerecorder
# @author intrd (Danilo Salles) - http://dann.com.br
# @copyright (CC-BY-SA-4.0) 2016, intrd
# @license Creative Commons Attribution-ShareAlike 4.0 - http://creativecommons.org/licenses/by-sa/4.0
# Dependencies: 
# - php >=5.3.0
# - intrd/php-common >=1.0.x-dev <dev-master
## @docbloc 1.1

#!/bin/bash
TIMESTAMP=`date "+%Y-%m-%d_%H:%M:%S"`
LOGFILE="LOGS/bitcoin-tickerecorder.log"
touch /dev/null

while true
do
	echo "
	$TIMESTAMP STARTING.." >> /dev/null
	php start.php 2>&1 | tee -a /dev/null
	sleep 5
done






