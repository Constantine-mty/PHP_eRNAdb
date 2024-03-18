<?php
/*
 * 2024.3.17 Ma-tianyu
 * 封装SQL查询
 * Db类实现了SELECT、DELETE、INSERT、UPDATE
 * 返回的$result为数组对象
 */
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

    public function __construct() {
       self::connect();
       self::setAttr();
    }
    // 数据库连接方法
    public static function connect()
    {
        $DS = DIRECTORY_SEPARATOR;
        $config = require __DIR__."{$DS}..{$DS}config{$DS}database.php";
        //$config = require __DIR__."/../config/database.php";
        // $config = require __DIR__.$DS."..".$DS."config".$DS."database.php";
        $dbms = $config["dbms"];
        $host = $config["host"];
        $user = $config["user"];
        $pass = $config["pass"];
        $dbName = $config["dbName"];

        $dsn="$dbms:host=$host;dbname=$dbName;charset=utf8mb4";

        try {
            self::$pdo = new PDO($dsn, $user, $pass); //初始化一个PDO对象      
        } catch (PDOException $e) {
            throw new Exception("数据库连接错误: " . $e->getMessage());
        }
    }

    private static function setAttr()
    {
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    

    public static function table(string $tablename)
    {
        self::$tablename=$tablename;
        return new self();
    }
    
    public function where(Array|Closure $condition,$andOrNot = 'AND')
    {
      $where = '';
      if(!empty($condition)){

        if($condition instanceof Closure){
            $this->isGrouping = true;
            $this->whereAndOrNot = $andOrNot;
            $condition($this);
            $this->isGrouping = false;
            return $this;
        }
        // 拼接where
        // WHERE xxx
        $whereArray = [];
        $executeData = [];
        foreach ($condition as $key => $value) {
            

            if(strtolower($value[1]) == 'between'){
                $whereArray[] = "$value[0] $value[1] ? AND ?";
                $executeData[] = $value[2][0] ;
                $executeData[] = $value[2][1] ;
            }
            else if(strtolower($value[1]) == 'in'){
                // id in (?,?,?)
                // [1,2,3]
                $str = rtrim(str_repeat('?,',count($value[2])),',');
                $whereArray[] = "$value[0] $value[1] ($str)";
                foreach ($value[2] as $vv) {
                    $executeData[] = $vv;
                }
            }
            else{
                $whereArray[] = "$value[0] $value[1] ?";
                $executeData[] = $value[2] ;
            }
        }
        if($andOrNot !== 'NOT' && $andOrNot !== 'OR NOT'){
            $where = implode(" $andOrNot ",$whereArray);
        }
        else{
            if($andOrNot == 'OR NOT'){
                //not (条件1 OR 条件2 OR 条件3 。。。。)
                $where = implode(" OR ",$whereArray);
            }
            else{
                 //not (条件1 AND 条件2 AND 条件3 。。。。)
                $where = implode(" AND ",$whereArray);
            }
            // not的情况
            $where = 'NOT ('.$where.')';
        }

        if($this->isGrouping){
            $where = "( $where )";
        }

        // xxx AND xxx AND xxx       

        if(isset(self::$executeData)){
            self::$executeData = array_merge(self::$executeData,$executeData);
        }
        else{
            self::$executeData = $executeData;
        }
       
      }
      if($this->isGrouping === true){
        $this->buildWhere($where,$this->whereAndOrNot);
      }
      else{
        $this->buildWhere($where,$andOrNot);
      }
     
      return $this;
    }

    public function whereOr(Array|Closure $condition)
    {
        return $this->where($condition,'OR');
    }

    public function whereNot(Array|Closure $condition)
    {
        return $this->where($condition,'NOT');
    }

    public function whereOrNot(Array|Closure $condition)
    {
        return $this->where($condition,'OR NOT');
    }

    public function whereNull(string $name)
    {
        $where = "$name is null";
        $this->buildWhere($where);
        return $this;
    }

    public function whereNotNull(string $name)
    {
        $where = "$name is not null";
        $this->buildWhere($where);
        return $this;
    }

    private function buildWhere(string $where,string $andOrNot = 'AND')
    {
        $oldWhere = self::$where;
        if($where !== ''){
          if(strpos($oldWhere,'WHERE') === false){
              if($oldWhere!==''){
                  $where = 'WHERE '.$oldWhere.' '.$andOrNot.' '.$where;
              }
              else{
                  $where = 'WHERE '.$where;
              }
          }
          else {
            $where = $oldWhere.' '.$andOrNot.' '.$where;
          }
          self::$where = $where;
        }
    }
    
    /**
     * 查询排序
     *
     * @param [string] 排序方式
     * @return object
     */
    public function order(string $orderby):object
    {
      self::$order = "order by ".$orderby;
      return $this;
    }
    
    /**
     * 查询条数限制
     *
     * @param int 查询数量或者起始偏移量
     * @param int|null 查询数量或null
     * @return object
     */
    public function limit(int $num1,int $num2=null):object
    {
      self::$limit = "limit ".(is_null($num2)?$num1:"$num1,$num2");
      return $this;
    }

    // 查询条件 field
    // field('id,username')
    public function field(string $fields)
    {
      self::$field = $fields;
      return $this;
    }
    // 获取拼接的sql语句 getLastSql
    public function getLastSql()
    {
      return self::$stmt->queryString;
    }
    
    /**
     * 查询数据条数
     *
     * @return int
     */
    public function count()
    {
        // SELECT count(*) as total FROM users
        $totalArray = $this->field('count(*) as total')->find();
        return $totalArray["total"];
    }
    /**
     * 查询多条
     *
     * @return array
     */
    public function select()
    {
        try {
            // slelect id,username from users
            $sql = "SELECT ". self::$field ." FROM ". self::$tablename ." ".self::$where." ".self::$order." ".self::$limit;
            // echo $sql;
            self::$stmt = self::$pdo->prepare($sql);

            // var_dump(self::$executeData);
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
        } catch (PDOException $e) {
            // self::$errmessage = [
            //     "message"=>$e->getMessage(),
            //     "line"=>$e->getLine(),
            //     "code"=>$e->getCode(),
            // ];
            // return false;
            throw new Exception("查询异常：".$e->getMessage());
        }
        
    }
    
    /**
     * 查询一条
     *
     * @return array|boolean
     */
    public function find()
    {
        $result = $this->limit(1)->select();
        return isset($result[0])?$result[0]:false;
    }

    // 删除
    public function delete()
    {
        try {
            $sql = "DELETE FROM ". self::$tablename ." ".self::$where;
           
            self::$stmt = self::$pdo->prepare($sql);

            // var_dump(self::$executeData);
            //
            if(isset(self::$executeData)){
                self::$stmt->execute(self::$executeData);
            }
            else{
                self::$stmt->execute();
            }
            $result = self::$stmt->rowCount();
            self::$stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("删除异常：".$e->getMessage());
        }
        
    }
   
    /**
     * 插入数据
     *
     * @param array 要插入的数据数组 $datas []
     * @return int
     */
    public function insert(array $datas) : int
    {
        try {
            // $sql = "INSERT INTO user (username, password, phone) VALUES (?,?,?)";
            // $stmt = $conn->prepare($sql);
            if(empty($datas)){
                throw new Exception("插入异常：缺少要插入的数据");
            }
            $keys = array_keys($datas);
            $executeData = array_values($datas);
            $str = rtrim(str_repeat('?,',count($datas)),',');
            // // 执行插入语句
            // $stmt->execute(["test1","1234","13888888888"]);
            $sql = "INSERT INTO ". self::$tablename ." (".implode(',',$keys).") VALUES ($str) ";
           
            self::$stmt = self::$pdo->prepare($sql);

            self::$stmt->execute($executeData);
            $result = self::$stmt->rowCount();
            self::$stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("插入异常：".$e->getMessage());
        }
        
    }
    
    /**
     * 更新数据
     *
     * @param array 要更新的数据数组 $datas []
     * @return int
     */
    public function update(array $datas)
    {
        try {
        //    UPDATE user SET num = 1,username=2 WHERE id =2
            if(empty($datas)){
                throw new Exception("修改异常：缺少要修改的数据");
            }
            $insertArr = [];
            $executeData = [];
            foreach ($datas as $key => $value) {
                $insertArr[] = $key."=?";
                $executeData[] = $value;
            }
            $insertStr = implode(',',$insertArr);
            $sql = "UPDATE ". self::$tablename ." SET $insertStr ".self::$where;
           
            self::$stmt = self::$pdo->prepare($sql);
            if(isset(self::$executeData)){

                $executeData = array_merge($executeData,self::$executeData);
            }
            self::$stmt->execute($executeData);
            $result = self::$stmt->rowCount();
            
            return $result;
        } catch (PDOException $e) {
            throw new Exception("修改异常：".$e->getMessage());
        }
        
    }

    public function __destruct()
    {
        // self::$stmt->closeCursor();
        self::$pdo = null;
        self::$where = '';
        self::$executeData = null;
        self::$order='';
        self::$limit='';
        self::$field='*';
    }
}


//测试
/*
$result = Db::table('publish')->where([
    ["species","=","Human"],
    ["tissue","=","Brain"],
])->select();
*/

// $result = Db::table('publish')->order('id ASC')->limit(3,4)->select();
// $result = Db::table('publish')->field('id, tissue, species')->order('id ASC')->limit(3,4)->select();


/*
$queryObject = Db::table('publish')->field('tissue, species')->order('id DESC');
$result = $queryObject->count();
$sql = $queryObject->getLastSql();
echo $sql;
*/

//var_dump($result);
