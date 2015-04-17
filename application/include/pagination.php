<div class="pagination">
<?php 
$page_set= ceil($list_count/RESULTS_PER_PAGE);
$current = $_REQUEST['page'];
if($current>2 && $page_set>5){
    echo '<button onclick="Filter.submit(0)" class="button"><</button>';
}
$start = ($current-2>0?$current-2:0);
$end = ($current+3<$page_set?$current+3:$page_set);
if($page_set>1){
    for($i=$start;$i<$end;$i++){
        $class="";
        if($_REQUEST['page']==$i){
            $class="button_highlight";
        }
        echo '<button onclick="Filter.submit('.($i).')" class="button '.$class.'">'.($i+1).'</button>';
    }
}
if($current<$page_set-3 && $page_set>5){
    echo '<button onclick="Filter.submit('.($page_set-1).')" class="button">></button>';
}
?>
</div>