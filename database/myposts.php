




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
if(isset($_COOKIE['username']))
{
    $username=$_COOKIE['username'];
    date_default_timezone_set('PRC');
    $link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
    mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
    mysql_query("set names 'utf8'");
    $postsql=mysql_query("select * from post where postuser='$username' and type=0 order by posttime desc  ");
    $postnum=mysql_num_rows($postsql);
    $row=mysql_fetch_array($postsql);

    $votesql=mysql_query("select distinct votetitle,postid from votes,post where votes.votetitle=post.title and type=0 order by votes.votenum desc ");
    $voterow=mysql_fetch_array($votesql);

    $awardssql = mysql_query("select postuser,sumsum from
                (select postuser,sum(votenum) as sumsum 
                from post where type=0 and votenum!=0 group by postuser) as a
                order by sumsum desc ");
    $awardrow=mysql_fetch_array($awardssql);

    //$answersql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=2 order by posttime desc  ");
    $answersql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=0 order by posttime desc  ");
    $tolanswernum=mysql_num_rows($answersql);
    $answerrow=mysql_fetch_array($answersql);
    
    //$commentsql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=1 order by posttime desc  ");
    $commentsql=mysql_query("select * from post,comment where post.postuser=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=0 order by posttime desc  ");
    $tolcommentnum=mysql_num_rows($commentsql);
    $commentrow=mysql_fetch_array($commentsql);

    $totalnum=$postnum+$tolanswernum+$tolcommentnum;



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

    <div class="col-xs-4 ">
        <div class="btn-group pull-right">

            
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i> You <span class="badge"></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="./myposts.php"><i class="fa fa-comments"></i> My Posts</a>
                    </li>
                    <li>
                        <a href="./messages.php"><i class="fa fa-envelope"></i> My Messages
                            <span class="badge"></span> </a>
                    </li>
                   
                    <li class="divider"></li>
                    <li>
                        <a href="./newpost.php"><i class="fa fa-plus"></i> New Post</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="./logout.php"><i class="fa fa-sign-out"></i> Log Out</a>
                    </li>
                </ul>
            
        </div>
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

            <div class="col-sm-1 mid active">
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
  
    

    <div class="row">
    <div class="col-md-10 col-md-offset-2 searchbar">
        <div  class="col-md-8">
            <input type="text" id="searchform" style="width:100%">
        </div>

        <div class="visible-lg visible-md">
            or &nbsp;<a role="button" class="btn btn-default btn-xs" href="./searchpage.php"><img src="./picture/search.png"></img>
            Classic search</a>
        </div>

    </div>
</div>


<div class="row">
<?php
if ($postnum==0 && $tolanswernum==0 && $tolcommentnum==0) {
?>

    <div class="col-md-9">
    <h2 class="text-center New User">You do not have any post!</h2>
    <h2 class="text-center New User"><a href="./newpost.php">Add new post</a></h2>

    </div>
<?php
}
else{
?>

<div class="col-md-9">

            

<div class="row pagebar">
    <div class="col-sm-3">


        <div class="btn-group visible-lg visible-md">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                Limit to: all time <span class="caret"></span>
            </button>
            
        </div>

    </div>

    <div class="cold-sm-12 col-md-6 text-center ">

        <span class="step-links">
        
            &lt;
        

            <span class="current">
              &bull; <?php echo $totalnum; ?> results &bull;
                page 1 of 1 &bull;
        </span>

            
                 &gt;
            
        </span>
    </div>

    <div class="col-sm-3 visible-lg visible-md">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                Sort by: update <span class="caret"></span>
            </button>
            
        </div>

    </div>

</div>


<div id="post-list">
                
<?php

if ($postnum==0) {
?>
    <div class="post-row Comment Open">
    <br>
    </div>
<?php
}
else{

do {

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

                $result=mysql_query("select userid from user where username='$commentuser'");
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $commentuserid=$row1["userid"];
                }

                $rowu=$row[5];
                $result=mysql_query("select userid from user where username='$rowu'")  ;
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $userid=$row1["userid"];
                }                        


?>                    


<div class="post-row Comment Open">

    <div class="count-box visible-lg visible-md">

        <div class="box vote">

            

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
    
}
?>


                
<?php

if ($tolanswernum==0) {
?>
    <div class="post-row Comment Open">
    <br>
    </div>
<?php
}
else{

do {

                $postid=$answerrow[0];
                $result=mysql_query("select votenum from post where postid='$postid' and type=0");
                if ($result)
                {
                     $row2=mysql_fetch_array($result);
                     $votenum=$row2["votenum"];
                }
                
                $answerrowt=$answerrow[2];
                $result=mysql_query("select count(comment.comtitle) from comment,post where comment.comtitle=post.title and post.postuser!=comment.commentuser and post.title='$answerrowt'" );
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $answernum=$row1["count(comment.comtitle)"];
                }

                $result=mysql_query("select commentuser,createtime from comment where comtitle='$answerrowt'");
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $commentuser=$row1["commentuser"];
                    $createtime=$row1["createtime"];
                }  

                $result=mysql_query("select userid from user where username='$commentuser'");
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $commentuserid=$row1["userid"];
                }

                $answerrowu=$answerrow[5];
                $result=mysql_query("select userid from user where username='$answerrowu'")  ;
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $userid=$row1["userid"];
                }                          

    
?>                    


<div class="post-row Comment Open">

    <div class="count-box visible-lg visible-md">

        <div class="box vote">

            

            <div class="c"><?php echo $votenum; ?></div>
            <div class="t">votes</div>
        </div>
        <div class="box unanswered">
            <div class="c"><?php echo $answernum; ?></div>
            <div class="t">answers</div>
        </div>
        <div class="box view">
            <div class="c"><?php echo $answerrow[1]; ?></div>
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
        ANSWER:
            <a href="content.php?id=<?php echo $answerrow[0]; ?>"><?php echo $answerrow[2] ?></a>
        </div>
        <div class="clearfix">

            <span class="userlink text-right muted">
            written  <?php echo $answerrow[4]?> by 
                <a href="user.php?id=<?php echo $userid;?>"><?php echo $answerrow[5]?></a> &bull;
            </span>
            <?php 
                if($answernum!=0){                
            ?>
            <span class="userlink text-right muted">
            answered  <?php echo $answerrow[10];?> by 
                <a href="user.php?id=<?php echo $commentuserid;?>"><?php echo $answerrow[12];?></a> &bull;
            </span>
            <?php
                }
            ?>
        </div>
    </div>
    
</div>
<?php
}while($answerrow=mysql_fetch_array($answersql));
}
?>


<?php
if ($tolcommentnum==0) {
?>
    <div class="post-row Comment Open">
    <br>
    </div>
<?php
}
else{
do {

                $postid=$commentrow[0];
                $result=mysql_query("select votenum from post where postid='$postid' and type=0");
                if ($result)
                {
                     $row2=mysql_fetch_array($result);
                     $votenum=$row2["votenum"];
                }
                
                $commentrowt=$commentrow[2];
                $result=mysql_query("select count(comment.comtitle) from comment,post where comment.comtitle=post.title and post.postuser!=comment.commentuser and post.title='$commentrowt'" );
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $commentnum=$row1["count(comment.comtitle)"];
                }

                $result=mysql_query("select commentuser,createtime from comment where comtitle='$commentrowt'");
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $commentuser=$row1["commentuser"];
                    $createtime=$row1["createtime"];
                }  

                $result=mysql_query("select userid from user where username='$commentuser'");
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $commentuserid=$row1["userid"];
                }

                $commentrowu=$commentrow[5];
                $result=mysql_query("select userid from user where username='$commentrowu'")  ;
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $userid=$row1["userid"];
                }                          
                     

    
?>                    


<div class="post-row Comment Open">

    <div class="count-box visible-lg visible-md">

        <div class="box vote">

            

            <div class="c"><?php echo $votenum; ?></div>
            <div class="t">votes</div>
        </div>
        <div class="box unanswered">
            <div class="c"><?php echo $commentnum; ?></div>
            <div class="t">answers</div>
        </div>
        <div class="box view">
            <div class="c"><?php echo $commentrow[1]; ?></div>
            <div class="t">views</div>
        </div>

        

    </div>

    
    <div class="count-box-sm visible-sm visible-xs">
        <div class="box answered">
            <div class="c"><?php echo $commentnum; ?></div>
            <div class="t">answers</div>
        </div>
    </div>
    <div class="title-box clearfix">
        <div class="post-title">
        COMMENT:
            <a href="content.php?id=<?php echo $commentrow[0]; ?>"><?php echo $commentrow[2] ?></a>
        </div>
        <div class="clearfix">

            <span class="userlink text-right muted">
            written  <?php echo $commentrow[4]?> by 
                <a href="user.php?id=<?php echo $userid;?>"><?php echo $commentrow[5]?></a> &bull;
            </span>
            <?php 
                if($commentnum!=0){                
            ?>
            <span class="userlink text-right muted">
            commented  <?php echo $commentrow[10];?> by 
                <a href="user.php?id=<?php echo $userid;?>"><?php echo $commentrow[12];?></a> &bull;
            </span>
            <?php
                }
            ?>
        </div>
    </div>
    
</div>
<?php
}while($commentrow=mysql_fetch_array($commentsql));
}
?>
                
</div>

            

<div class="row pagebar">
   <br>
</div>

</div>
<?php    
}
?>
        <div class="col-md-3 sidebar">

            


<div class="head">Recent Votes</div>
<div class="recent-votes">
    <ul style="opacity: 0.8;">
        
        <?php
        
            do {
        ?>          
        
            <li><a href="content.php?id=<?php echo $voterow[1]; ?>">
                <?php echo $voterow[0]; ?></a>
            </li>



        <?php

            }while($voterow=mysql_fetch_array($votesql));
        ?>
            
        
    </ul>
</div>


        



    <div class="head">Recent Awards &bull; </div>
    <div class="recent-awards">
        <ul>
        <?php
        do {
                $awarduser=$awardrow[0];
                $result=mysql_query("select userid from user where username='$awarduser'");
                if ($result)
                {
                     $row2=mysql_fetch_array($result);
                     $userid=$row2["userid"];
                }

            
        ?>          
        
            <li>
                <a href="user.php?id=<?php echo $userid; ?>">
                <?php echo $awardrow[0]; ?></a>&bull;
                <?php echo $awardrow[1]; ?>
            </li>


        <?php

            }while($awardrow=mysql_fetch_array($awardssql));
        ?>

                
            
        </ul>
    </div>

        </div>
    </div>




    
    
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

<?php
}
else{
    echo "<script>alert('please login!');window.location.href='login.php';</script>";
}

?>

</body>
</html>