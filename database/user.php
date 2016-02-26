




<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="./picture/title.png"/>

    <title>myposts Posts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="./account/csshsy/bootstrap.min.css" rel="stylesheet">
    <link href="./account/csshsy/font-awesome.css" rel="stylesheet">

    <script src="./account/jshsy/jquery.min.js"></script>
    <script src="./account/jshsy/bootstrap2.min.js"></script>

    
    

        
        <link rel="stylesheet" href="./account/csshsy/9ddfff193f12.css" type="text/css" />

<!--        <script type="text/javascript" src="./account/jshsy/acea93bb4f1b.js"></script>
-->


    
        
    

    <script type="application/javascript">
        
            USER_ID = 12459;
        
        TITLE_SEARCH_URL = "/local/search/title/"
        POST_DISPLAY_URL = "/p/"
    </script>
</head>
<body>
<?php

    $username=$_COOKIE['username'];

    date_default_timezone_set('PRC');
    $link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
    mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
    mysql_query("set names 'utf8'");

    $userid = $_GET['id'];
    $postsql=mysql_query("select * from post,user where post.postuser=user.username and user.userid='$userid' and type=0 order by posttime desc  ");
    $postnum=mysql_num_rows($postsql);
    $row=mysql_fetch_array($postsql);

    $usersql=mysql_query("select * from user where userid='$userid' ");
    $rowuser=mysql_fetch_array($usersql);
  
/*
    if(!isset($_COOKIE["php_cookie"])){
        setcookie("php_cookie",date("Y-m-d H:i:s"));
        $cookietime='this is the first time';
        //echo "欢迎你第一次访问网站";
        //echo <br/>;
    }else{
        setcookie("php_cookie",date("Y-m-d H:i:s"),time()*60);
        $cookietime=$_COOKIE["php_cookie"];
        //echo "你上次访问网站的时间为： ".$_COOKIE["php_cookie"];
        //echo <br/>;
    }*/

?>

<div class="container" id="content">

<div class="row visible-lg visible-md">
    <div class="col-md-12 text-center" id="topnav">
            
                <div class="col-md-1 ">
                    <a href="./latest.php">Latest <sup><b></b></sup></a>
                </div>
            
                <div class="col-md-1 ">
                    <a href="./Open.php">Open <sup><b></b></sup></a>
                </div>
           
            
                
        </ul>
    </div>
</div>

<div class="row visible-sm visible-xs">

    <div class="col-xs-4">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                 myposts 
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                
                    <li>
                        <a href="./latest.php">Latest</a>
                    </li>
                
                    <li>
                        <a href="./Open.php">Open</a>
                    </li>
                
                    <li>
                        <a href="./most.php">Most</a>
                    </li>
                
                    
            </ul>
        </div>
    </div>

        <div class="col-xs-4 text-center" style="margin-bottom:5px">
        <a role="button" class="btn btn-primary" href="/">
            <i class="fa fa-star fa-1x"></i> Home </a>
        </a>

    </div>

    
</div>


<div class="row visible-lg visible-md">

    <div class="col-md-12" id="navbar">

        <div class="col-lg-3 visible-lg" id="logo">
            <a href="./main.php"><img src="./picture/logo.png"></a>
        </div>

        <div class="col-md-3 visible-md text-center">
            <a href="./main.php">
                <a href="./main.php"><img style="width:200px; height: auto;" src="./picture/logo.png"></a>
            </a>
        </div>

        

            <div class="col-md-9 top ">

                <i class="fa fa-user"></i> 


<img src="./picture/user.jpg"></img>
<a href="./userinfo.php"><?php echo $_COOKIE['username']  ?></a> &bull; &nbsp;|&nbsp;
                <a href="./logout.php"><i class="fa fa-sign-out"></i> Logout </a>

                
            </div>

            <div class="col-sm-1 mid ">
                <a href="./messages.php">
                    <div><img src="./picture/messages.jpg"></img>
                    </div>
                    <div>Messages</div>
                </a>
                <span class="badge"></span>
            </div>

            <div class="col-sm-1 mid ">        
                <span class="badge"></span>
            </div>

            <div class="col-sm-1 mid ">

                <a href="./votes.php" class="navitem">
                    <div class="navitem">
                        <div><img src="./picture/votes.jpg"></img></div>
                        <div> Votes</div>
                    </div>
                </a>
                <span class="badge"></span>
            </div>
            <div class="col-sm-1 mid ">        
                <span class="badge"></span>
            </div>

            <div class="col-sm-1 mid">
                <a href="./myposts.php" class="navitem">
                    <div><img src="./picture/myposts.jpg"></img></div>
                    <div>My Posts</div>
                </a>
            </div>

            <div class="col-sm-1 mid ">        
                <span class="badge"></span>
            </div>

            <div class="col-sm-1 mid ">
                <a href="./bookmarks.php" class="navitem">
                    <div><img src="./picture/bookmarks.jpg"></img></div>
                    <div>Bookmarks</div>
                </a>
            </div>
     

            <div class="col-sm-1 mid newpost pull-right">
                <a href="./newpost.php" class="navitem">
                    <div><img src="./picture/newpost.jpg"></img></div>
                    <div>New Post</div>
                </a>
            </div>

        
    </div>
</div>
<div class="col-md-12">
    <h2 class="text-center New User">User:<?php  echo $rowuser[1];?></h2>
    <hr>
</div>  
<div class="col-md-3">

                <div class="text-center">
                   
                </div>


            </div>
    <div class="col-md-6">
    
                <dl class="dl-horizontal">


                    <dt>Status:</dt>
                    <dd>New User</dd>

                    <dt>Location:</dt>
                    <dd>China</dd>

                <!--    <dt>Last seen:</dt>
                    <dd><?php echo $cookietime;?></dd>-->

                    <dt>Joined:</dt>
                    <dd><?php echo $rowuser[4]?></dd>

                    <dt>Email:</dt>
                    
                    <dd><?php echo $rowuser[2]?></dd>

                    
                </dl>
    </div>
    
    <div class="col-md-5">
                
            </div>
<?php
    if ($postnum>0) {

    ?>
    <div class="col-md-12">
    <hr>
            
        <h4 class="text-center">Posts by <?php  echo $rowuser[1];?></h4>
    </div>


<div class="row">
        <div class="col-md-12">


<div id="post-list">

                
<?php


do {
    
?>                    


<div class="post-row Comment Open">

    <div class="count-box visible-lg visible-md">

        <div class="box vote">

            <?php
                #$votenum=mysql_query("select votenum from votes where voteid=1 ");

               $postid=$row[0];
                $result=mysql_query("select votenum from post where postid='$postid' and type=0");
                if ($result)
                {
                     $row2=mysql_fetch_array($result);
                     $votenum=$row2["votenum"];
                }
                                //$votenum=mysql_query("select votenum from votes where votetitle==$row[2] ");
                                //echo "<script> alert ($row[2]) </script>";
                $rowt=$row[2];
                $result=mysql_query("select count(comment.comtitle) from comment,post where comment.comtitle=post.title and post.postuser!=comment.commentuser and post.title='$rowt'" );
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $answernum=$row1["count(comment.comtitle)"];
                }

                $result=mysql_query("select commentuser,createtime from comment where comtitle='$rowt'");
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $commentuser=$row1["commentuser"];
                    $createtime=$row1["createtime"];
                }  

                $rowu=$row[5];
                $result=mysql_query("select userid from user where username='$rowu'")  ;
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $userid=$row1["userid"];
                } 

                $result=mysql_query("select userid from user where username='$commentuser'")  ;
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $commentuserid=$row1["userid"];
                }                       
            ?>

            <div class="c"><?php echo $votenum; ?></div>
            <div class="t">votes</div>
        </div>
        <?php
        if ($answernum==0) {
        ?>
            <div class="box unanswered">
            <div class="c"><?php echo $answernum; ?></div>
            <div class="t">answers</div>
            </div>
        <?php
        }
        else{
        ?>
        <div class="box answered">
            <div class="c"><?php echo $answernum; ?></div>
            <div class="t">answers</div>
        </div>
        <?php
        }
        ?>
        <div class="box view">
            <div class="c"><?php echo $row[1]; ?></div>
            <div class="t">views</div>
        </div>

        

    </div>

    
    <div class="count-box-sm visible-sm visible-xs">
        <div class="box answered">
            <div class="c"><?php echo $answernum; ?></div>
            <div class="t">answers</div>
        </div>
    </div>
    <div class="title-box clearfix">
        <div class="post-title">
            <a href="content.php?id=<?php echo $row[0]; ?>"><?php echo $row[2] ?></a>
        </div>
        <div class="clearfix">

            <span class="userlink text-right muted">
            written  <?php echo $row[4]?> by 
                <a href="user.php?id=<?php echo $userid;?>"><?php echo $row[5]?></a> &bull;
            </span>
            <?php 
                if($answernum!=0){                
            ?>
            <span class="userlink text-right muted">
            answered  <?php echo $createtime;?> by 
                <a href="user.php?id=<?php echo $commentuserid;?>"><?php echo $commentuser?></a> &bull;
            </span>
            <?php
                }
            ?>
        </div>
    </div>
    
</div>
<?php
}while($row=mysql_fetch_row($postsql));
    
?>
                
</div>

            <br>


        </div>
    </div>
<?php

}
else{
?>
    <div class="col-md-12">
    <hr>    
        <h4 class="text-center">User <?php  echo $row[8];?> didn't post any question!</h4>
    </div>
<?php

}
?>




    
    
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <hr>
            </div>
        </div>

        <div class="row toc">

            <div class="col-xs-3 col-xs-offset-1 col-md-3 col-md-offset-3">
                <div class="title">Content</div>
                <ul class="flat">
                    <li><a href="./searchpage.php">Search</a></li>
                    <li><a href="./userinfo.php">Users</a></li>
                    <li><a href="./open.php">Open</a></li>
                </ul>
            </div>

            <div class="col-xs-3 col-md-3">
                <div class="title">Help</div>
                <ul class="flat">
                    <li><a href="http://php.net/">PHP</a></li>
                    <li><a href="http://www.mysql.com/">MySql</a></li>
                    <li><a href="http://httpd.apache.org/">Apache</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                Established 2014.7 in <a href="http://www.tongji.edu.cn/" title="Welcome to tongji!">tju</a> by TOAST STUDIO.
            </div>
            <div class="col-md-12 text-center">
                <br>
            </div>
        </div>
    

</div>



    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-101522-12']);
        _gaq.push(['_setDomainName', 'biostars.org']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>


</body>
</html>