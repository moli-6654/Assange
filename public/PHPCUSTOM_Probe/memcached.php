<?php

  //创建一个memcached对象实例，通过代码测试php是否已经可以使用memcached

    $mem=new Memcache;
    if(!$mem->connect("127.0.0.1",11211)){
        die('连接失败！');
    }else{  echo '连接成功！'; }

    //在添加数组是，根据需要. 希望序列号放入  ,
    //serialize<=>unserialize， 如果根据需要，也可以json_encode <=> json_decode
    $arr=array("bj",'tj');
    if($mem->set('key1',$arr,MEMCACHE_COMPRESSED,time()+31*3600*24)){
        echo '添加数组ok';
    }

?>