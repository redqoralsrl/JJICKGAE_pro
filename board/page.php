<table border="0" width="100%" cellspacing="0">
    <tr>
        <td width="100%" align="center" cellpadding='0'>
        
            <?php

                $page = $_GET['page'];


                $total_page = ceil($total_article / $view_article);

                // 페이지 인덱스의 시작과 종료 범위 구함 //

                if($page % 10){
                    echo "전체 페이징 그룹 :".$start_page = $page - $page % 10 + 1;
                }else{
                    echo "처음 :".$start_page = $page - 9;
                }
                echo "<br>";
                echo "마지막 :".$end_page = $start_page + 10;
                echo "<p>&nbsp;</p>";

                // 그룹이동
                // 이전그룹
                $prev_group = $start_page - 1;
                if($prev_group < 1) $prev_group = 1;
                // 다음그룹
                $next_group = $end_page;
                if($next_group > $total_page) $next_group = $total_page;

                // 처음 페이지
                if($page != 1) echo "<a href=../board/board_free.php?page=1>First</a> &nbsp; &nbsp;";
                else "First &nbsp; &nbsp;";

                // 이전 그룹 이동
                if($page != 1) echo "<a href=../board/board_free.php?page=$prev_group>◀</a> &nbsp; &nbsp;";

                for($i = $start_page; $i < $end_page; $i++){
                    if($i > $total_page) break;
                    if($i == $page) echo "$i &nbsp; &nbsp;";
                    else echo "<a href=../board/board_free.php?page=$i>$i</a> &nbsp;";
                }
                
                // 다음 그룹 이동
                if($page < ($total_page + $page - $end_page)) echo "&nbsp; &nbsp; <a href=../board/board_free.php?page=$next_group>▶</a>";

                // 마지막 페이지
                if($page != $total_page) echo "&nbsp; &nbsp; <a href=../board/board_free.php?page=$total_page>Last</a>";
                else echo " &nbsp; &nbsp; Last";
            ?>
            

        </td>
    </tr>
</table>