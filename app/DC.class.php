<?php
    class Db{
        public static $tablename;
        public static $where = '';
        public static $executeData;
        public static $pdo;
        public static $stmt;
        public static $order='';
        public static $limit='';
        public static $field='*';

        // 判断是否在where组内 ()
        private $isGrouping = false;
        private $whereAndOrNot = 'AND';

        public function __construct(){
            self::connect();
            self::setAttr();
        }

    // 数据库连接方法
        /**
         * @throws Exception
         */
        public static function connect()
        {
            $DS = DIRECTORY_SEPARATOR;
            $config = require __DIR__."/../config/database.php";
            //$config = require __DIR__."{$DS}..{$DS}config{$DS}database.php";
            $dbms = $config["dbms"];
            $servername = $config["servername"];
            $dbName = $config["dbName"];
            $username = $config["username"];
            $password = $config["password"];

            $dsn = "$dbms:host=$servername; dbname=$dbName; charset=utf8mb4";

            try {
                self::$pdo = new PDO($dsn, $username, $password); //初始化一个PDO对象
            }
            catch(PDOException $e)
            {
                throw new Exception("错误！:" . $e->getMessage());
            }
        }

        /**
         * @return void
         */
        private static function setAttr()
        {
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }


        /**
         * @param $tablename
         * @return Db
         */
        public static function table(string $tablename)
        {
            self::$tablename = $tablename;
            return new self();
        }


        /**
         * @param array $condition
         * @return $this
         */
        public function where(Array $condition){
            $where = '';
            if(!empty($condition)){
                //拼接where
                // WHERE xxx
                $whereArray = [];
                $executeData = [];
                foreach ($condition as $key => $value){
                    $whereArray[] = "$value[0] $value[1] ?";
                    $executeData[] = $value[2];
                }

                $where = implode(' AND ',$executeData);

                self::$executeData = $executeData;

                if(strpos($where,'WHERE') === false){
                    $where = 'WHERE '.$where;
                }
                else{
                    $where = 'AND '.$where;
                }
            }
            self::$where = $where;
            return $this;
        }


        /**
         * @return mixed
         */
        public function select()
        {
            $sql = "SELECT * FROM ". self::$tablename ." ".self::$where."";
                echo $sql;
            self::$stmt = self::$pdo->prepare($sql);

            //
            if(isset(self::$executeData)){
                self::$stmt->execute(self::$executeData);
            }
            else{
                self::$stmt->execute();
            }

            $result = self::$stmt->fetchAll(PDO::FETCH_ASSOC);

            self::$stmt->closeCursor();
            return $result;
        }

    }



    //测试SQL语句拼装
    /*Db::table('publish')->where([
        ["id","=","22"]
    ])->select();
    */

    //测试查询运行
    $result = Db::table('publish')->where([
        ["id","=","23"],
        ["tissue","=","Brain"],
    ])->select();

    var_dump($result);



    // Db::table('表格名称')->where([])->select(); //取所有结果；where后[]中是查询条件
    // Db::table('表格名称')->where([])->limit(20,10)->select(); //第二十条结果开始，取十条
    // Db::table('表格名称')->where([])->find(); //取一条结果
    // Db::table('表格名称')->where([])->insert([]); //取所有结果
    // Db::table('表格名称')->where([])->delete(); //取所有结果
    // Db::table('表格名称')->where([])->update([]); //取所有结果



    // Db::connect();
    // $config = require __DIR__."../config/database.php";
    // var_dump($config);
    ?>
