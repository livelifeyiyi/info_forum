<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" href="./picture/title.png"/>

    <title>
    Sign Up.
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="./account/csshsy/bootstrap.min.css" rel="stylesheet">
    <link href="./account/csshsy/font-awesome.css" rel="stylesheet">

    <script src="./account/jshsy/jquery.min.js"></script>
    <script src="./account/jshsy/bootstrap2.min.js"></script>

    
    

        
        <link rel="stylesheet" href="./account/csshsy/9ddfff193f12.css" type="text/css" />

 <!--       <script type="text/javascript" src="./account/jshsy/acea93bb4f1b.js"></script>
-->
    

    
        
    

    <script type="application/javascript">
        
            USER_ID = null;
        
        TITLE_SEARCH_URL = "/local/search/title/"
        POST_DISPLAY_URL = "/p/"
    </script>


    <SCRIPT LANGUAGE="JavaScript">
        function createCode(len)
        {
            var seed = new Array(
                    'abcdefghijklmnopqrstuvwxyz',
                    'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
                    '0123456789'
            );               //创建需要的数据数组
            var idx,i;
            var result = '';   //返回的结果变量
            for (i=0; i<len; i++) //根据指定的长度
            {
                idx = Math.floor(Math.random()*3); //获得随机数据的整数部分-获取一个随机整数
                result += seed[idx].substr(Math.floor(Math.random()*(seed[idx].length)), 1);//根据随机数获取数据中一个值
            }
            return result; //返回随机结果
        }

        function test() {
            var inputRandom=document.getElementById("id_captcha_0").value;
            var autoRandom=document.getElementById("autoRandom").innerHTML;
            if(inputRandom==autoRandom) {
                alert("通过验证");
            } else {
                alert("Please check your Captcha.");
            }

        }
    </SCRIPT>

    
    <script type="text/javascript">  


$(document).ready(function(){

  $("#register").click(function(){

  password1=$("#id_password1").val();
  password2=$("#id_password2").val();
          if (password1!=password2)
          {
            alert("You must type the same password each time!");
            window.location.href="./signup.php";
          }

  var inputRandom=document.getElementById("id_captcha_0").value;
  var autoRandom=document.getElementById("autoRandom").innerHTML;
          if(inputRandom!=autoRandom) {
                       
                alert("Please check your Captcha.");
                window.location.href="./signup.php";
            }


   

  var dataObject={
    "email":$("#id_email").val(), 
    "password":$("#id_password1").val()
    
    };

  var url = "check_signup.php?data=" + JSON.stringify(dataObject) + "&time" + Math.random();
  var xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.onreadystatechange = function() {
    if(xhr.readyState==4) {
        var response = xhr.responseText;
      if(response=="OK") {
      alert("register succeed!");
      window.location.href="./login.php";

      } 
      else {
        alert("register failed!");
       // window.location.href="./signup.php";
        window.location.href="./signup.php";
      }

    }
  };
  xhr.send(null);


  
  }); 
});
 
</script>
</head>
<body>

<div class="container" id="content">

    
    
    


<div class="row visible-lg visible-md">
    <div class="col-md-12 text-center" id="topnav">
            
                <div class="col-md-1 ">
                    <a href="./Latest.php">Latest <sup><b></b></sup></a>
                </div>
            
                <div class="col-md-1 ">
                    <a href="./Open.php">Open <sup><b></b></sup></a>
                </div>

                <div class="col-md-1 ">
                    <a href="./Most.php">MOST <sup><b></b></sup></a>
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

            
                <div>
                    <a class="btn btn-primary active" role="button" href="./login.php">
                        <i class="fa fa-user fa-1x"></i> Log In
                    </a>
                </div>
            
        </div>
    </div>
</div>
    
<div class="row visible-lg visible-md">

    <div class="col-md-12" id="navbar">

        <div class="col-lg-3 visible-lg" id="logo">
            <a href="./main.php"><img src="./picture/logo.png"></a>
        </div>

        <div class="col-md-3 visible-md text-center">
            <a href="/">
                <a href="/"><img style="width:200px; height: auto;" src="./picture/logo.png"></a>
            </a>
        </div>

        

            <div class="col-md-9 top text-center">
                 Welcome to Biostar!
                
            </div>

            <div class="col-md-2 col-md-offset-10 mid ">
                
                    <div><i class="fa fa-globe"></i>
                    </div>
                    <div></div>
                
            </div>

            <div class="col-md-2 mid ">
                <b><a href="./login.php">
                    <div><img src="./picture/login1.jpg"></img></div>
                    <div>User Login</div>
                </a></b>
            </div>

            <div class="col-md-2 mid newpost">
               
                    <div><i class="fa fa-plus-circle fa-1x"></i></div>
                    <div></div>
               
            </div>


        
    </div>
</div>

    
    

    
    
    <div class="row">
        <div class="col-md-9 col-md-offset-3">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create Account</h3>
                </div>
                <div class="panel-body">
                   <!-- 
                    <form role="form" class="signup" id="signup_form" method="post" action="/accounts/signup/">-->
                        <input type='hidden' name='csrfmiddlewaretoken' value='bnSmHPY8hwn5oL4H23eerOZ5lgUS5paq' />
                        <div class="form-group">

                            

<div id="div_id_email" class="form-group"><label for="id_email" class="control-label  requiredField">
				E-mail<span class="asteriskField">*</span></label><div class="controls "><input class="textinput textInput form-control" id="id_email" name="email" placeholder="E-mail address" type="text" /> </div></div><div id="div_id_password1" class="form-group"><label for="id_password1" class="control-label  requiredField">
				Password<span class="asteriskField">*</span></label><div class="controls "><input class="textinput textInput form-control" id="id_password1" name="password1" placeholder="Password" type="password" /> </div></div><div id="div_id_password2" class="form-group"><label for="id_password2" class="control-label  requiredField">
				Password (again)<span class="asteriskField">*</span></label><div class="controls "><input class="textinput textInput form-control" id="id_password2" name="password2" placeholder="Password" type="password" /> </div></div><input id="id_confirmation_key" name="confirmation_key" type="hidden" /> <div id="div_id_captcha" class="form-group"><label for="id_captcha_0" class="control-label  requiredField">
				Captcha<span class="asteriskField">*</span></label><div class="controls ">

       
                <!-- <td><label id="autoRandom" value=""></label><INPUT TYPE="button" VALUE="获取验证码" ONCLICK="autoRandom.innerHTML=createCode(sel.value)"></td>
                 -->
                <span class="captcha-question">
                <td><label id="autoRandom" value=""></label><INPUT TYPE="button" VALUE="acquire Captcha" ONCLICK="autoRandom.innerHTML=createCode(5)"></td>
                

                </span>
                <input class="textinput textInput form-control" id="id_captcha_0" name="captcha_0" size="5" type="text" /> 

                
                <!--<td><input type="text" id="inputRandom"></td> -->
                <!--
                <input type="button" value="yanzheng" onclick="test()">
                -->


                <input class="hiddeninput form-control" id="id_captcha_1" name="captcha_1" type="hidden" value="95a38878a6077434435fc66327c21025d274f2b6" /> </div></div>

                        </div>
                        

                        <button type="submit" class="btn btn-success" id="register">Sign Up &raquo;</button>

                <span class="btn btn-default pull-right">
                    <a class="button" href="./login.php">Back to login &raquo;</a>
                </span>

                  <!--  </form>  -->
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