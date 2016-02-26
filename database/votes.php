




<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="./picture/title.png"/>

    <title>Votes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./account/csshsy/bootstrap.min.css" rel="stylesheet">
    <link href="./account/csshsy/font-awesome.css" rel="stylesheet">

    <script src="./account/jshsy/jquery.min.js"></script>
    <script src="./account/jshsy/bootstrap2.min.js"></script>

    
    

        
    <link rel="stylesheet" href="./account/csshsy/9ddfff193f12.css" type="text/css" />

 <!--       <script type="text/javascript" src="./account/jshsy/acea93bb4f1b.js"></script>
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
    date_default_timezone_set('PRC');
    $link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
    mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
    mysql_query("set names 'utf8'");
    $username=$_COOKIE['username'];
 //   echo $username;

    $result=mysql_query("select distinct votes.votetime,votes.votetitle,votes.voteuser from votes,comment,post where votes.votetitle=post.title and postuser='$username' ");
#select votes.votetime,votes.votetitle,comment.commentuser from votes,comment,post where votes.votetitle=post.title and postuser='$username' and comment.comtitle=post.title
    $resultnum=mysql_num_rows($result);
    $row=mysql_fetch_row($result)

?>

<div class="container" id="content">

    
    
    


<div class="row visible-lg visible-md">
    <div class="col-md-12 text-center" id="topnav">
            
                <div class="col-md-1 ">
                    <a href="./latest.php">Latest </a>
                </div>
            
                <div class="col-md-1 ">
                    <a href="./Open.php">Open</a>
                </div>
            
               
   
        </ul>
    </div>
</div>

<div class="row visible-sm visible-xs">

    <div class="col-xs-4">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                 votes 
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
                    <li>
                        <a href="/t/bookmarks/"><i class="fa fa-book"></i> My Bookmarks</a>
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
<a href="./userinfo.php"><?php echo $_COOKIE['username']  ?></a> &bull;  &nbsp;|&nbsp;
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

            <div class="col-sm-1 mid active">

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

            <div class="col-sm-1 mid ">
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




<div class="col-md-9">
<?php
if($resultnum==0){
?>
<h2 class="text-center">You do not have any vote!</h2>

     
<?php
}

else{
    

?>            


<div class="text-center">

        <span class="step-links">
        
            &lt;
        

            <span class="current">
              &bull; <?php echo $resultnum;?> results &bull;
                page 1 of 1 &bull;
        </span>

            
                 &gt;
            
        </span>
</div>


            <table id="posts" class="table table-striped">

            <tbody>
<?php


#    $result=mysql_query("select votes.votetime,votes.votetitle,votes.voteuser from votes,comment,post where votes.votetitle=post.title and postuser='$username' ");

        while($row=mysql_fetch_row($result)){

            $votetime_f=$row[0];
            $votetitle_f=$row[1];
            $voteuser_f=$row[2];
            $sqlid=mysql_query("select postid from post where title='$votetitle_f'");
            if($sqlid){

                $rowid=mysql_fetch_array($sqlid);
                $postid=$rowid[0];
            //echo $postid;
            }

?>
                    <tr>
                        <td>
                            Upvote, <?php echo $votetime_f; ?>  for
                            the question: <a href="content.php?id=<?php echo $postid; ?>"><?php echo $votetitle_f; ?></a>
                        </td>
                    </tr>

                    <?php
}

?>
            </tbody>
                
            </table>
            


<div class="text-center">

        <span class="step-links">
        
            &lt;
        

            <span class="current">
              &bull; <?php echo $resultnum;?> results &bull;
                page 1 of 1 &bull;
        </span>

            
                 &gt;
            
        </span>
</div>

<?php
}
?>

</div>


        <div class="col-md-3 sidebar">
            <div class="head">People voting on your posts</div>
            
<?php
    $voteresult=mysql_query("select distinct votes.voteuser from votes,comment,post where votes.votetitle=post.title and postuser='$username' ");
    $voterow=mysql_fetch_row($voteresult);
     if ($voterow==0) {
 ?>   
    <div class="recent-posts">
    &bull; no one !
    </div>
<?php
    }
    else{
?>

<div class="recent-posts">
    
<?php

           do{
          
            $voteuser_f=$voterow[0];

            $result=mysql_query("select userid from user where username='$voteuser_f'")  ;
            if ($result)
            {
                $row1=mysql_fetch_array($result);
                $userid=$row1["userid"];
            }  

    
?>
        <ul>
            <li >
            <a href="user.php?id=<?php echo $userid;?>"><?php echo $voterow[0]; ?></a> 
            </li>

        </ul>
<?php
}while($voterow=mysql_fetch_row($voteresult));

?>     
    
</div>
<?php
}
?>
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