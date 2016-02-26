<?php
$con = new mysqli();

$con->connect("localhost", "root", "root", "test");
$con->query("SET NAMES `utf8`");

$result = $con->query("SELECT * FROM `post`");
$data = array();
while($row = mysqli_fetch_array($result)) {
	$data[] = $row;
}

echo json_encode($data);

$con->close();






primary key (postid,voteid);
foreign key postid references post(postid);
foreign key voteid references votes(voteid);

alter table get add foreign key (postid) references post(postid)
alter table get add foreign key (votetid) references votes(voteid)



$J=json_decode($json);   
print_r($J);   

mixed json_decode ( string $json [, bool $assoc ] ) 
接受一个 JSON 格式的字符串并且把它转换为 PHP 变量

string json_encode ( mixed $value [, int $options = 0 ] ) 
返回 value 值的 JSON 形式 



<?php
if(isset($_COOKIE['username']))
{
    

?>


<?php
else{
    echo "<script>alert('please login!');window.location.href='login.html';</script>";
}

?>

<?php echo $_COOKIE['username']  ?>


//页面访问次数
<?php
if (!isset($_COOKIE['visits'])) $_COOKIE['visits'] = 0;
$visits = $_COOKIE['visits'] + 1;
setcookie('visits',$visits,time()+3600*24*365);//每更新次数，将过期时间设为一年
?>


while($row=mysql_fetch_row($filesql));

$id = $_GET['id'];
    $result=mysql_query("select content,title from post where postid=$id ");
    if ($result)
    {
        $row1=mysql_fetch_array($result);
        $content_post=$row1["content"];
        $title_post=$row1["title"];
    }
#查找post content内容
    $result1=mysql_query("select votenum from votes,post where postid=$id and votetitle=title ");

    if ($result1)
    {
         $row1=mysql_fetch_array($result1);
         $votenum_post=$row1["votenum"];
    }
#查找votes votenum
    $result2=mysql_query("select  username,settime from user,post where postid=$id and username=post.postuser ");
    
    if ($result2)
    {
         $row1=mysql_fetch_array($result2);
         $username=$row1["username"];
         $settime=$row1["settime"];
    }
    #查找 username,settime

    $result3=mysql_query("select * from comment where comtitle='$title_ziji' order by createtime desc");

    while($row=mysql_fetch_row($result3))
    {

            $row3=$row[0];
            $commentusername=$row[4];
            $commentcreatetime=$row[2];
            $commentvotenum=$row[6]; 
            $commentcontent=$row[1];                              
    }
?>



<?php 
$link = mysql_connect("localhost","root","root") or die("不能连接到数据库服务器".mysql_error());
mysql_select_db("database",$link) or die("不能连接到数据库服务器".mysql_error());
mysql_query("set names 'utf8'");

$search=$_GET['search'];
//echo $search;

$resultsear=mysql_query("select * from post where (title like '%".$search."%') ");
$resulttnum=mysql_num_rows($resultsear);
while ($rowsear=mysql_fetch_array($resultsear)) {
    $postid = $rowsear[0];
    $viewsnum = $rowsear[1];
    $title = $rowsear[2];
    $content = $rowsear[3];
    $posttime = $rowsear[4];
    $postuser = $rowsear[5];
    

}


$postsql=mysql_query("select * from post order by posttime desc ");
    $postnum=mysql_num_rows($postsql);
    $row=mysql_fetch_array($postsql);

?>






    $votesql=mysql_query("select votetitle,postid from votes,post where votes.votetitle=post.title order by votenum desc ");
    $voterow=mysql_fetch_array($votesql);

    $awardssql = mysql_query("select postuser,sumsum from 
            (select postuser,sum(votenum) as sumsum from post,votes where post.title=votes.votetitle group by postuser ) as a
                order by sumsum desc ");
    $awardrow=mysql_fetch_array($awardssql);

Recent Votes:
    <?php
            do {
        ?>          
        
            <li><a href="content.php?id=<?php echo $voterow[1]; ?>">
                <?php echo $voterow[0]; ?></a>
            </li>


        <?php

            }while($voterow=mysql_fetch_array($votesql));
        ?>
Recent awards:
        <?php
            do {
        ?>          
        
            <li>
                <?php echo $awardrow[0]; ?>&bull;
                <?php echo $awardrow[1]; ?>
            </li>


        <?php

            }while($awardrow=mysql_fetch_array($awardssql));
        ?>





select postuser
from 
(select postuser,sum(votenum) as sumsum
from post,votes
where post.title=votes.votetitle
group by postuser )
AS T2 ( postuser, sumsum)
order by sumsum desc



        SELECT COUNT(*) FROM `counter` WHERE name = 'counter1'"

        select * from post,comment where comment.commentnum=0 order by posttime desc



select * from post,comment where post.postuser!= comment.commentuser and post.title=comment.comtitle  order by posttime desc 

<?php
//$answersql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=2 order by posttime desc  ");
    $answersql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle order by posttime desc  ");
    $answernum=mysql_num_rows($answersql);
    $answerrow=mysql_fetch_array($answersql);
    
    //$commentsql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=1 order by posttime desc  ");
    $commentsql=mysql_query("select * from post,comment where post.postuser=comment.commentuser and commentuser='$username' and post.title=comment.comtitle order by posttime desc  ");
    $commentnum=mysql_num_rows($commentsql);
    $commentrow=mysql_fetch_array($commentsql);



    $rowu=$row[5];
    $result=mysql_query("select userid from user where username='$rowu'")  ;
    if ($result)
    {
        $row1=mysql_fetch_array($result);
        $userid=$row1["userid"];
    }  

    userlink:
    <a href="user.php?id=<?php echo $userid;?>">




    $postsql=mysql_query("select * from post where postuser='$username' and type=0 order by posttime desc  ");
    $postnum=mysql_num_rows($postsql);
    $row=mysql_fetch_array($postsql);

    $votesql=mysql_query("select distinct votetitle,postid from votes,post where votes.votetitle=post.title and type=0 order by votes.votenum desc ");
    $voterow=mysql_fetch_array($votesql);

    $awardssql = mysql_query("select postuser,sumsum from 
            (select postuser,sum(votes.votenum) as sumsum 
                from post,votes 
                where post.title=votes.votetitle and type=0 group by postuser ) as a
                order by sumsum desc ");
    $awardrow=mysql_fetch_array($awardssql);

    //$answersql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=2 order by posttime desc  ");
    $answersql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=0 order by posttime desc  ");
    $answernum=mysql_num_rows($answersql);
    $answerrow=mysql_fetch_array($answersql);
    
    //$commentsql=mysql_query("select * from post,comment where post.postuser!=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=1 order by posttime desc  ");
    $commentsql=mysql_query("select * from post,comment where post.postuser=comment.commentuser and commentuser='$username' and post.title=comment.comtitle and type=0 order by posttime desc  ");
    $commentnum=mysql_num_rows($commentsql);
    $commentrow=mysql_fetch_array($commentsql);

                $postid=$row[0];
                $result=mysql_query("select votenum from post where postid='$postid' and type=0");
                if ($result)
                {
                     $row2=mysql_fetch_array($result);
                     $votenum=$row2["votenum"];
                }

                select postuser,sumsum from
                (select postuser,sum(votenum) as sumsum 
                from post where type=0 and votenum!=0 group by postuser) as a
                order by sumsum desc

                $awarduser=$awardrow[0];
                $result=mysql_query("select userid from user where username='$awarduser'");
                if ($result)
                {
                     $row2=mysql_fetch_array($result);
                     $userid=$row2["userid"];
                }

                <a href="user.php?id=<?php echo $userid; ?>">
                <?php echo $awardrow[0]; ?></a>



distinct

SELECT DISTINCT title, post.content, postuser, commentuser 
from post,comment 
where type=1 and commentuser='$username' and postuser='$commentusername'

select distinct title,post.content,commentuser,posttime
                    from post,comment 
                    where type=1 and comment.content=post.content  
                    order by createtime desc



Bookmarks
bookmarks.php


$postsql=mysql_query("select postid,title,posttime,postuser,viewsnum from post,bookmarks 
                where bookmarks.username='$username' and bookmarks.postuser=post.postuser and post.title=bookmarks.posttitle and type=0 order by posttime desc  ");
    $postnum=mysql_num_rows($postsql);
    $row=mysql_fetch_array($postsql);




    select postuser,comtitle,post.content,posttime 
    from post,comment
    where type=1 and post.title=comment.content and commentuser='$username'
