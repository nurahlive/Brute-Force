<?php
namespace configBrute{
    class config{
        private const  BRUTEFORCEFILENAME="testlist.txt";
        public  static function bruteforceFile(){
            return self::BRUTEFORCEFILENAME;
        }
    }
}

?>