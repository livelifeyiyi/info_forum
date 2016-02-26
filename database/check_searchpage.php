<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="/static/favicon.ico"/>

    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/font-awesome.css" rel="stylesheet">

    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./css/9ddfff193f12.css" type="text/css" />

    <script type="application/javascript">
        
            USER_ID = null;
        
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
$username = $_COOKIE['username'];

$search=$_GET['search'];
//echo $search;

$resultsear=mysql_query("select * from post where (title like '%".$search."%') ");
$resulttnum=mysql_num_rows($resultsear);
$row=mysql_fetch_array($resultsear);


?>

<div class="container" id="content">

<div class="row visible-lg visible-md">
    <div class="col-md-12 text-center" id="topnav">
            
                <div class="col-md-1 ">
                    <a href="./Latest.php">Latest <sup><b></b></sup></a>
                </div>
            
                <div class="col-md-1 ">
                    <a href="./Open.php">Open <sup><b></b></sup></a>
                </div>

                
       
    </div>
</div>

<div class="row visible-sm visible-xs">

    <div class="col-xs-4">
        <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                 Latest 
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                
                    <li>
                        <a href="./Latest.php">Latest</a>
                    </li>
                
                    <li>
                        <a href="./Open.php">Open</a>
                    </li>
                
                    <li>
                        <a href="./Most.php">MOST</a>
                    </li>
                
                   
            </ul>
        </div>
    </div>

        <div class="col-xs-4 text-center" style="margin-bottom:5px">
        <a role="button" class="btn btn-primary" href="./main.php">
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

            <div class="col-sm-1 mid ">

                <a href="./votes.php" class="navitem">
                    <div class="navitem">
                        <div><img src="./picture/votes.jpg"></img>
                        </div>
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
                    <div><img src="./picture/myposts.jpg"></img>
                    </div>
                    <div>My Posts</div>
                </a>
            </div>

            <div class="col-sm-1 mid ">        
                <span class="badge"></span>
            </div>

            <div class="col-sm-1 mid ">
                <a href="./mytags.php" class="navitem">
                    <div><img src="./picture/mytags.jpg"></img>
                    </div>
                    <div>My Tags</div>
                </a>
            </div>

             <div class="col-sm-1 mid newpost pull-right">
                <a href="./newpost.php" class="navitem">
                    <div><img src="./picture/newpost.jpg"></img>
                    </div>
                    <div>New Post</div>
                </a>
            </div>

         <!--   <div class="col-md-2 mid ">
                <b><a href="./login.php">
                    <div><img src="./picture/login1.jpg"></img></div>
                    <div>User Login</div>
                </a></b>
            </div>-->


        
    </div>
</div>




<div class="row">

<hr>
            

<div class="row pagebar">
    

    <div class=" text-center ">
           
              &bull;<?php echo $resulttnum; ?> results &bull;
                page 1 of 1  &bull;
       
       
    </div>

    
</div>


<div id="post-list">
 
                                  
<?php
do{


?>

<div class="post-row Question Open">

    <div class="count-box visible-lg visible-md">

        <div class="box vote">

            <?php
                #$votenum=mysql_query("select votenum from votes where voteid=1 ");

                $result=mysql_query("select votenum from votes where voteid=1");
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $votenum=$row1["votenum"];
                }
                                //$votenum=mysql_query("select votenum from votes where votetitle==$row[2] ");
                                //echo "<script> alert ($row[2]) </script>";
                $title=$row[2];
                $result=mysql_query("select count(comment.comtitle) from comment,post where comment.comtitle=post.title and post.postuser!=comment.commentuser and post.title='$title'" );
                if ($result)
                {
                    $row1=mysql_fetch_array($result);
                    $answernum=$row1["count(comment.comtitle)"];
                }                       
            ?>

            <div class="c"><?php echo $votenum; ?></div>
            <div class="t">votes</div>
        </div>
        <div class="box unanswered">
            <div class="c"><?php echo $answernum; ?></div>
            <div class="t">answers</div>
        </div>
        <div class="box view">
            <div class="c"><?php echo $row[1]; ?></div>
            <div class="t">views</div>
        </div>
    </div>  
    <div class="count-box-sm visible-sm visible-xs">
        <div class="box unanswered">
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
                <a href="/u/8732/"><?php echo $row[5]?></a> &bull;
            </span>
        </div>
    </div>
</div>

<?php
}while ( $row=mysql_fetch_array($resultsear))

?>

                


                
            
            

<div class="row pagebar">
    <div class="col-sm-3">


        
            
        </div>

    </div>

    

    

</div>


        </div>



    

</div>


    
    
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <hr>
            </div>
        </div>

        <div class="row toc">

            <div class="col-xs-3 col-xs-offset-1 col-md-2 col-md-offset-3">
                <div class="title">Content</div>
                <ul class="flat">
                    <li><a href="/local/search/page/">Search</a></li>
                    <li><a href="/user/list/">Users</a></li>
                    <li><a href="/t/">Tags</a></li>
                    <li><a href="/b/list/">Badges</a></li>
                </ul>
            </div>

            <div class="col-xs-3 col-md-2">
                <div class="title">Help</div>
                <ul class="flat">
                    <li><a href="/info/about/">About</a></li>
                    <li><a href="/info/faq/">FAQ</a></li>
                </ul>
            </div>

            <div class="col-xs-3 col-md-2 ">
                <div class="title">Access</div>
                <ul class="flat">
                    <li><a href="/info/rss/">RSS</a></li>
                    <li>Stats</li>
                    <li>API</li>
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
                Use of this site constitutes acceptance of our <a href="/info/policy/">User
                Agreement
                and Privacy
                Policy</a>.
            </div>
            <div class="col-md-12 text-center">
                Powered by <a href="https://github.com/ialbert/biostar-central">Biostar</a>
                version 2.1.0
            </div>
        </div>
    

    
    <div id="traffic">Traffic: 533 users visited in the last hour</div>

<!--</div>-->



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