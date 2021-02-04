<!DOCTYPE html>

<?php
                $connect = mysqli_connect("localhost", "root", "950419", "BBS") or die("fail");
                
                $id = $_GET['name'];                      //Writer
                $pw = $_GET['pw'];                        //Password
                $title = $_GET['title'];                  //Title
                $content = $_GET['content'];              //Content
                $date = date('Y-m-d H:i:s');            //Date
 
                $URL = '../index.html';                   //return URL
 
 
                $query = "insert into board (title, content, date, hit, id ) 
                        value('$title', '$content', '$date',0, '$id' )";
 
 
                $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo "FAIL";
                }
 
                mysqli_close($connect);
?>


</html>