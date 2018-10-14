<?php

include_once('include/c.php');



$output = '';

if(isset($_GET['q']) && $_GET['q'] !== ' '){
    $searchq = $_GET['q'];

    $q = mysqli_query($conn, "SELECT * FROM patien WHERE p_name LIKE '%$searchq%' ") or die(mysqli_error());
    $c = mysqli_num_rows($q);
    if($c == 0){
        $output = 'No search results for <b>"' . $searchq . '"</b>';
    } else {
        while($row = mysqli_fetch_array($q)){
            $id = $row['id'];
            $title = $row['p_name'];
            $link = $row['p_name'];
            $desc = $row['p_name'];


            $output .= '<a href="' . $link . '">
                            <h3>' . $title . '</h3>
                                <p>' . $desc . '</p>
                            </a>';
        }
    }
} else {
    header("location: ./");
}
print("$output");
mysqli_close($conn);

?>