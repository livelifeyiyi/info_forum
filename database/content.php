<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="./picture/title.png"/>

    <title>
    post content
    </title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/font-awesome.css" rel="stylesheet">
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/9ddfff193f12.css" type="text/css" />
    <script type="application/javascript">
        USER_ID = 12450; 
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

    $postsql = mysql_query("select * from post where type=0");
    $postnum = mysql_num_rows($postsql);
    $row = mysql_fetch_array($postsql);

     $array=array();
    array_push($array,$username);

    $id = $_GET['id'];
    $temp=mysql_query("select commentnum from comment,post where postid='$id' and title=comtitle and type=0");
    if ($temp)
    {
        $row1=mysql_fetch_array($temp);
        $commentnum_f=$row1["commentnum"];
        
    }


    $result=mysql_query("select content,title,postuser from post where postid='$id' and type=0");
    if ($result)
    {
        $row1=mysql_fetch_array($result);
        $content_post=$row1["content"];
        $title_post=$row1["title"];
        $postuser_f=$row1["postuser"];
    }
#查找post content内容
    $result1=mysql_query("select votenum from votes,post where postid='$id' and votetitle=title and type=0");

    if ($result1)
    {
         $row2=mysql_fetch_array($result1);
         $votenum_post=$row2["votenum"];
    }
#查找votes votenum

        


    $result2=mysql_query("select  postuser,posttime,votenum from post where postid='$id' and type=0");
    
    if ($result2)
    {
         $row3=mysql_fetch_array($result2);
         $postusername=$row3["postuser"];
         $settime=$row3["posttime"];
         $postvotenum=$row3["votenum"];
    }
    #查找 username,settime
 /*   if (!isset($_COOKIE['visits$id'])) $_COOKIE['visits$id'] = 0;
    $visits = $_COOKIE['visits$id'] ;
    setcookie('visits$id',$visits,time()+3600*24*365);//每更新次数，将过期时间设为一年
    $addviewnum = mysql_query("update post set viewsnum ='$visits'+1 where postid='$id'  ");
*/
    $addviewnum = mysql_query("update post set viewsnum = viewsnum+1 where postid='$id'  and type=0");


?>

     <script type="text/javascript">
    var baoliu_v=[];
    
    function upvote(name,id,title,votenum,content)
    {
    if (id=="0")
    {
        if ("<?php echo $username?>"=="<?php echo $postuser_f?>")
            alert("You can not vote for you own post");
        else
            {
            votenum=votenum+1;
                   var dataObject={
    "voteuser":"<?php echo $username?>", 
    "votetitle":title,
    
    "votenum":votenum,
    "content":content
    

    
    };
  var url = "check_content_postvote.php?data=" + JSON.stringify(dataObject) + "&time" + Math.random();
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState==4) {
        var response = xhr.responseText;
      if(response=="OK") {
        document.location.reload([true]);//window.location .href =window.location .href;//location.reload();
      
      } 
      else {
       
      }

    }
  };
  xhr.send(null);
            }

    
location.reload([true]);

 
}   //id="0"
else{

if ("<?php echo $username?>"==name)
            alert("You can not vote for you own post");
        else
            {
            votenum=votenum+1;
                   var dataObject={
    "voteuser":name, 
    "votetitle":title,
    
    "votenum":votenum,
    "content":content
    

    
    };
  var url = "check_content_commentvote.php?data=" + JSON.stringify(dataObject) + "&time" + Math.random();
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState==4) {
        var response = xhr.responseText;
      if(response=="OK") {
        location.reload(true);//window.location .href =window.location .href;//location.reload();
      
      } 
      else {
       
      }

    }
  };
  xhr.send(null);
            }


    
}
}
</script>


  <script type="text/javascript">
    var baoliu_v=[];
    
    function addmark(postname,title)  //addmark('<?php echo $postuser_f?>','<?php echo $title_post;?>')
    {
    
       
            
                   var dataObject={
    "username":"<?php echo $username;?>", 
    "postuser":postname,
    "posttitle":title
    
    
    

    
    };
  var url = "check_addmark.php?data=" + JSON.stringify(dataObject) + "&time" + Math.random();
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState==4) {
        var response = xhr.responseText;
      if(response=="OK") {
     //   document.location.reload([true]);//window.location .href =window.location .href;//location.reload();
      window.location.href="./bookmarks.php";
      } 
      else {
       alert('you had bookmarked this post!');
       window.location.href='./bookmarks.php';
      }

    }
  };
  xhr.send(null);
            

    
//location.reload([true]);

 


}
</script>

<script type="text/javascript">
    var baoliu_v=[];
    
    function deletepost(postname,title)  //addmark('<?php echo $postuser_f?>','<?php echo $title_post;?>')
    {
    
       
            
                   var dataObject={
    
    "postuser":postname,
    "posttitle":title
    
    
    

    
    };
  var url = "check_deletepost.php?data=" + JSON.stringify(dataObject) + "&time" + Math.random();
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState==4) {
        var response = xhr.responseText;
      if(response=="OK") {
       // document.location.reload([true]);//window.location .href =window.location .href;//location.reload();
      window.location.href="./main.php";
      } 
      else {
       document.location.reload([true]);
      }

    }
  };
  xhr.send(null);
            

    


 


}
</script>



<div class="container" id="content">
    <div class="row visible-lg visible-md">
        <div class="col-md-12 text-center" id="topnav">           
                <div class="col-md-1 ">
                    <a href="./Latest.php">Latest <sup><b></b></sup></a>
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
                 View Posts 
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
                <a href="./bookmarks.php" class="navitem">
                    <div><img src="./picture/bookmarks.jpg"></img>
                    </div>
                    <div>Bookmarks</div>
                </a>
            </div>

             <div class="col-sm-1 mid newpost pull-right">
                <a href="./newpost.php" class="navitem">
                    <div><img src="./picture/newpost.jpg"></img>
                    </div>
                    <div>New Post</div>
                </a>
            </div>

        
        </div>
    </div>

    <div class="row" itemscope itemtype="">
        <div class="col-xs-12 col-md-10">
            <div id="post-details" >                
                <span itemscope itemtype="">
                    <div class="post-body Open clearfix">
                        <div class="title" >Question: 
                        <span itemprop="name"><?php echo $title_post;?></span>
                        </div>
    
                        <div class="post vote-box visible-lg visible-md" data-post_id="105789">

                            <div class="vote mark on tip" data-toggle="tooltip" data-placement="top"
                                     data-type="vote" title="Upvote!">
                                    <img src="./picture/vote.jpg" id="0" onclick="upvote('<?php echo $postuser_f?>','0','<?php echo $title_post;?>',<?php echo $postvotenum?>,'<?php echo $content_post;?>')"></img>
                            </div>
                            <div class="count" itemprop="voteCount"><?php echo $postvotenum?></div>
                            <div class="vote mark on tip" data-toggle="tooltip" data-placement="top"
                                 data-type="bookmark" title="Bookmark!" id="addbookmark" onclick="addmark('<?php echo $postuser_f?>','<?php echo $title_post;?>')">
                                <img src="./picture/bookmark.jpg"></img>
                            </div>                               
                        </div>

                        <div>
                                
                            <div class="content" >
                                <div class="col-xs-3 col-md-2 box pull-right text-center visible-lg visible-md">
                                   
                                    
                                    <div><img src="./picture/user.png"/>
                                    </div>


                                    <?php
                                    $result=mysql_query("select userid from user where username='$postusername'")  ;
                                    if ($result)
                                    {
                                        $row1=mysql_fetch_array($result);
                                        $userid=$row1["userid"];
                                    }  
                                    ?>
                                    
                                    <div class="ago"><?php echo $settime;?></div>
                                    <div class="uname"><a href="user.php?id=<?php echo $userid; ?>"><?php echo $postusername;?></a></div>
                                    <div class="loc">China</div>
                                </div>

                                <div class="box text-center visible-sm visible-xs">
                                    <div class="uname"><?php echo $postusername;?> &bull;  wrote:</div>
                                </div>

                                <span itemprop="text">
                                <p><?php echo $content_post;?></p>
                                <p> </p>
                                </span>

                                <div class="clearfix">
                                                                   
                                    <div class="post-action">
                                    <br>

                                    <span class="label label-default add-comment" data-value="105789" id="C0" onclick="addanswer('<?php echo $username; ?>','C0',0,'<?php echo $title_post;?>',0,'<?php echo $content_post;?>')">ADD ANSWER</span>
                                    
                                    <span class="userlink muted">
                                         
                                         written <?php echo $settime;?> by <?php echo $postusername;?>
                                    </span>
                                    </div>
                                    <div class="post-action">
                                    <br>
                                    <?php
                                    if ($postusername==$username) {

                                    ?>
                                    <span class="label label-default add-comment" value="delete post" id="deletepost" onclick="deletepost('<?php echo $postuser_f?>','<?php echo $title_post;?>')">DELETE POST
                                    </span>

                                    <?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                

                                
                            </div>
                        </div>
                    </div>
                </span>
                
                <span itemscope itemtype="http://schema.org/Answer"> 
                

                <?php
                    $result3=mysql_query("select * from comment where comtitle='$title_post' and commentuser!='$postusername' order by createtime desc");
                     $count=1;
                    $result3num=mysql_num_rows($result3); 
                    if ($result3num==0) {
                               echo "<br>";
                            }
                            else{


                ?>  
                <div class="title" >Answers: 
                </div>  
                <?php
                }   
                    while($row=mysql_fetch_row($result3))
                    {
                            $row4=$row[0];
                            $commentusername=$row[4];
                            $commentcreatetime=$row[2];
                            $commentvotenum=$row[6]; 
                            $commentcontent=$row[1];
                            $title_ff=$row[5];
                            array_push($array, $commentusername);
                             
                ?>                              
                    <div class="post-body Open clearfix">

                        <div class="post vote-box visible-lg visible-md" data-post_id="105792">

                            <div class="vote mark on tip" data-toggle="tooltip" data-placement="top"
                             data-type="vote" title="Upvote!">
                            <img src="./picture/vote.jpg" id= "<?php echo $count;?>" onclick="upvote('<?php echo $commentusername;?>','<?php echo $count;?>','<?php echo $title_ff;?>',<?php echo $commentvotenum?>,'<?php echo $commentcontent;?>')"></img>
                            </div>

                            <div class="count" itemprop="voteCount"><?php echo $commentvotenum;?></div>
                        
                            
                        
                        </div>

                        <div>

                                               
                        <div class="content" >
                    
                            <div class="col-xs-3 col-md-2 box pull-right text-center visible-lg visible-md">
                               <?php
                                    $result=mysql_query("select userid from user where username='$commentusername'")  ;
                                    if ($result)
                                    {
                                        $row1=mysql_fetch_array($result);
                                        $userid=$row1["userid"];
                                    }  
                                    ?>
                               <div><img src="./picture/user2.png" />
                                    </div>

                                <div class="ago"><?php echo $commentcreatetime;?></div>
                                <div class="uname"><a href="user.php?id=<?php echo $userid; ?>"><?php echo $commentusername;?></a></div>
                                <div class="loc">China</div>
                            </div>

                            <div class="box text-center visible-sm visible-xs">
                               <div class="uname"><?php echo $commentusername;?> &bull;  wrote:</div>
                            </div>

                            <span itemprop="text"><p> <?php echo $commentcontent;?> </p>
                            </span>

                            <div class="clearfix">

                                <div class="post-action">

                                    <span class="label label-default add-comment" data-value="105792" id= "<?php echo 'C'.$count;?> " onclick="addanswer('<?php echo $commentusername; ?>','<?php echo 'C'.$count;?>',0,'<?php echo $title_ff ?>',1,'<?php echo $commentcontent; ?>')" >
                                    ADD COMMENT</span>
                  
                                    <span class="userlink muted">   
                                    
                                    written <?php echo $commentcreatetime; ?> by 
                                        <?php echo $commentusername; ?>
                                    </span>
                                </div>
                            </div>






<div class="comment" itemprop="comment">
<?php
                   $result4=mysql_query("select distinct title,post.content,commentuser,posttime
                    from post,comment 
                    where type=1 and comment.content=post.content and post.title='$commentcontent' 
                    order by createtime desc");
                    $comnum=mysql_num_rows($result4);
                    $row5=mysql_fetch_array($result4);

                    if ($comnum==0) {
                    ?>
                    <div class="indent">
                    
                    </div>
                    <?php    
                    }
                    else{

                    do {
                        $commentcomment=$row5[0];
                        $commentcommentcontent=$row5[1];
                        $commentcommentuser=$row5[2];
                        $commentcommenttime=$row5[3];
                        if ($commentcomment==$commentcontent) {
                            
        
                ?>  
    <div class="indent">

        <div class="entry Open  clearfix">

                        <!--    <div class="vote mark on tip" data-toggle="tooltip" data-placement="top"
                             data-type="vote" title="Upvote!">
                            <img src="./picture/vote.jpg" id= "<?php echo $count;?>" onclick="upvote('<?php echo $commentusername;?>','<?php echo $count;?>','<?php echo $title_ff;?>',<?php echo $commentvotenum?>,'<?php echo $commentcontent;?>')"></img>
                            </div>

                            <div class="count" itemprop="voteCount"><?php echo $commentvotenum;?></div>-->
                <?php
                $result=mysql_query("select userid from user where username='$commentcommentuser'");
                if ($result)
                {
                     $row2=mysql_fetch_array($result);
                     $userid=$row2["userid"];
                }
                ?>

            <p><?php echo $commentcommentcontent; ?></p>
    
            <div class="post-action">
        <!--    <span class="label label-default add-comment" data-value="105791" id="C105791">ADD REPLY</span>-->
            <span class="userlink muted">           
                written <?php echo $commentcommenttime; ?> by 
                <a href="user.php?id=<?php echo $userid; ?>"><?php echo $username; ?></a>
            </span>
            </div>
        </div>
    </div>
                    <?php
                    }
                    else
                    ?>
                    <div class="indent">
                   
                    </div>
                    <?php
                    } while ($row5=mysql_fetch_array($result4));

                    }
                    ?>
</div>

                            







                            
                        </div>
                        </div>
                    </div>
                    <?php
                     $count=$count+1;
                        }
                    ?>
                </span>
                
                
                <div id="kaishi">

                
                    <h3>Add your answer</h3>
                    <div class="alert alert-success">
                        <p><strong>Note:</strong> Answers should respond to the original question on the
                                top!
                        </p>

                        <p>
                                Use the comments
                                to discuss an answer, ask for clarifications, request more details, etc.
                        </p>
                    </div>


                    <!--

                    <form role="form" id="answer-form" method="post"
                              action="check_addanswer.php">

                              -->
                        <input type='hidden' name='addanswer' value='addanswer' />
                            <div class="form-group">
                                <textarea class="textarea form-control" cols="40" id="answerbox" name="content"
                                          rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success" id="addadd">Add Answer</button>
   <!--
                    </form>  -->
                    
                </div>
            </div>
        </div>


        <div class="col-xs-12 col-md-2 sidebar">
            
                <h4>Similar posts <br>&bull;
                 <a href="searchpage.php">Search &raquo;</a></h4>
                

                <ul class="more-like-this">
                    
                        
                                          
                        
                    
                </ul>
            
        </div>
    </div>
    

<!--
    <script src="/static/ckeditor/ckeditor.js"></script>
        <script type="application/javascript">
            CKEDITOR.replace('answerbox', {
                customConfig: '/static/ck_config-v2.js'
            });
        </script>
    
-->


    
    
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




    <script type="text/javascript">
    $(document).ready(function(){
    document.getElementById("kaishi").style.display="none";   //隐藏

    });
    </script>



    <script type="text/javascript">
    var baoliu=[];
    function addanswer(name,id,num,title,type,comcontent){
  document.getElementById("kaishi").style.display="block";//显示

  if (id=="C0")
  {
  if ("<?php echo $username?>"=="<?php echo $postuser;?>")
{
            alert("You can not answer for you own post!");
            location.reload([true]);
            return;



            }
            }
else
{


             if ("<?php echo $username?>"==name)
{
            alert("You can not answer for you own comment!");
            location.reload([true]);
            return;



            }

            }
  baoliu=[name,id,num,title,type,comcontent];
  $("#addadd").focus();


 
}
</script>

       <script type="text/javascript">  


$(document).ready(function(){

  $("#addadd").click(function(){

    var name=baoliu[0];
    var id=baoliu[1];
    var num=baoliu[2];
    var title=baoliu[3];
    var type=baoliu[4];
    var comcontent=baoliu[5];

 if (type==0)
    num=num+1;


       



  answercontent=$("#answerbox").val();

   var dataObject={
    "user_ziji":"<?php echo $username?>",
    "user":name, 
    "content":$("#answerbox").val(),
    "title":title,
    "commentnum":num,
    "type":type,
    "comcontent":comcontent

    
    };

  var url = "check_content.php?data=" + JSON.stringify(dataObject) + "&time" + Math.random();
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState==4) {
        var response = xhr.responseText;
        //alert (xhr.responseText);
        //alert (response);
        if (response=="OK"){
      alert( "add answer succeeded!");
      location.reload([true]);
      } 
      else {
      if (response=="FAILED")
      {

      alert("add answer failed!");
      location.reload([true]);
      }
       
       else{
      alert( "add answer succeeded!");
      location.reload([true]);
      }
      }



    }
  };
  xhr.send(null);
       //}


  
  }); 
});
 
</script>





</script>
    <?php
}

else{
    echo "<script>alert('please login!');window.location.href='login.php';</script>";
}

?>

</body>
</html>