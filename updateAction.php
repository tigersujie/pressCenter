<?php

$url= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
//1 用parse_url解析URL,此处是$str
$arr = parse_url($url);


//2 将URL中的参数取出来放到数组里
$arr_query = convertUrlQuery($arr['query']);
var_dump(getUrlQuery($arr_query));


/**
  * Returns the url query as associative array
  * @param     string     query
  * @return     array     params
  */
function convertUrlQuery($query)
{
    $queryParts = explode('&', $query);
    $params = array();
    foreach ($queryParts as $param)
    {
        $item = explode('=', $param);
        $params[$item[0]] = $item[1];
    }
    return $params;
}

function getUrlQuery($array_query)
{
    $tmp = array();
    foreach($array_query as $k=>$param)
    {
        $tmp[] = $k.'='.$param;
    }
    $params = implode('&',$tmp);
    return $params;
}
 ?>
<?php
$id= $arr_query['id'];
			$title=$_POST['title'];
			$connect = mysqli_connect('10.18.33.86','H_Z09415124','sujie1997','h_z09415124') or die('Unale to connect');
      mysqli_query($connect,"set names utf8");
			if (!$connect)
			{
				die('Could not connect: ' . mysql_error());
			}
      $content=$_POST['content'];
      $sql = "select context from news where id=$id;";
     // 执行sql语句返回结果集
     $result = mysqli_query($connect,$sql);
     while($row = mysqli_fetch_array($result))
     {
       $context_name=$row['context'];
       $myfile = fopen($context_name, "w") or die("Unable to open file!");
       fwrite($myfile, $content);
       fclose($myfile);
     }
			$date=date("Y-m-d h:i:sa",time());
      $sql="UPDATE news set  title='$title' ,date='$date' where ID=$id";
      echo $sql;
      echo "test";
			$result=mysqli_query($connect,$sql);
         if(!$result){
            die("Could not enter data:".mysql_error());
         }mysqli_close($connect);
         echo "Entered data successfully!";
			echo "<script>alert('更新成功');history.go('-1');location.reload('index.php');</script>";
?>
