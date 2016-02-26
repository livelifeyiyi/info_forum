
<!DOCTYPE html>
<html lang="en">
<head>

   <link rel="shortcut icon" href="./picture/title.png"/>

    <title>
    Update Post
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link href="./account/csshsy/bootstrap.min.css" rel="stylesheet">
    <link href="./account/csshsy/font-awesome.css" rel="stylesheet">

    <script src="./account/jshsy/jquery.min.js"></script>
    <script src="./account/jshsy/bootstrap2.min.js"></script>

    
    

        
        <link rel="stylesheet" href="./account/csshsy/9ddfff193f12.css" type="text/css" />

       <!-- <script type="text/javascript" src="./account/jshsy/acea93bb4f1b.js"></script>  -->


    

    
        
    
<!--
    <script type="application/javascript">
        
            USER_ID = 12459;
        
        TITLE_SEARCH_URL = "/local/search/title/"
        POST_DISPLAY_URL = "/p/"

-->

</script>

            <script type="text/javascript">  


$(document).ready(function(){

  $("#submit-id-submit").click(function(){

  posttitle=$("#id_title").val();
  postatags=$("#id_tag_val").val();
   content=$("#id_content").val();    
  var dataObject={
    "title":$("#id_title").val(), 
    "tags":$("#id_tag_val").val(),
    "content":$("#id_content").val()
    
    };
  /*$.ajax({ 
  type:'GET', 
  //url:"http://api.fanqiechaodan.info/users/",
  url:"check_signup.php?data=" + encodeURI(JSON.stringify(dataObject)),
  //data:JSON.stringify(dataObject),//jsonData(),//可以直接加一个函数名。 
  contentType:"application/json;text/html;charset=utf-8",//dataType:'json', 
  error:function(XMLHttpRequest, textStatus, errorThrown){  
        alert(XMLHttpRequest.readyState + XMLHttpRequest.status + XMLHttpRequest.responseText);  
    },
  //beforeSend:beforecall, 
  success:function(result){//callback
        

             alert("Register succeed！");
             window.location.href="./main.php";
  }
  
  })
*/
  var url = "check_newpost.php?data=" + JSON.stringify(dataObject) + "&time" + Math.random();
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState==4) {
        var response = xhr.responseText;
      if(response=="OK") {
      alert("Post succeed!");
      window.location.href="./main.php";

      } 
      else {
        alert("Post failed!");
        window.location.href="./newpost.php";
        //window.location.href="./signup.php";
      }

    }
  };
  xhr.send(null);


  
  }); 
});
 
</script>


</head>
<body>



<?php
if(isset($_COOKIE['username']))
{
    

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
                 View Posts 
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
                
                    <li>
                        <a href="./latest.php">Latest</a>
                    </li>
                
                    <li>
                        <a href="./Open.php">Open</a>
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

            

            <div class="col-sm-1 mid newpost pull-right" >
                <a href="./newpost.php" class="navitem">
                    <div><img src="./picture/newpost.jpg"></img></div>
                    <div>New Post</div>
                </a>
            </div>

        
    </div>
</div>
   

 

        
         
<!-- <form>
  class="post-form" method="post" ><input type='hidden' name='csrfmiddlewaretoken' value='u6nNfDFosG7U0enAaL4kjDVs1IKAMmu9' /> 
-->

<div class="row">

            <br>
        <div class="alert alert-info text-center"> Classic search. Type your query and press enter. Go to the main page
            for dynamic search.
        </div>

        <div class="col-md-10 col-md-offset-2">
            <form class="form-inline" role="form" action="check_searchpage.php">
                <div class="col-xs-9">
                    <input type="text" name="search" class="form-control" value="" placeholder="Search">
                </div>
                <div class="col-xs-1">
                    <button type="submit" class="btn btn-default">Search!</button>
                </div>
            </form>
        </div>

        <div class="col-md-10 col-md-offset-1" id="search-results">

            

            
                
            


        </div>
       
</div>

     <!--</form>  --> 


<!--
    <script src="./editor/editor.js"></script>
    <script>
        CKEDITOR.replace('id_content', {
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

<?php
}

else{
    echo "<script>alert('please login!');window.location.href='login.php';</script>";
}

?>

</body>
</html>