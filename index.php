<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .block, .criteria {
            display:inline-block;
            width:30px;
            height:30px;
            vertical-align:middle;
            text-align:center;
            border:1px solid black;
            padding: 3px;
        }
        .criteria {
            border:none;
            width:100px;
        }
        .red {
            background-color:indianred;
        }
        .green {
            background-color:greenyellow;
        }
        .reeks {
            margin-bottom:10px;
        }
    </style>
</head>
<body>


<?php
    //linear search
    $html = "";
    $haystack = [1,2,3,4,5,6,7,8,9,10,11,23,44,55,121,123,124,125,137,138,139,141,143,145,146,147,150,156];
    $needle = 23;
    $step = 0;


    //binarySearch($haystack, $needle);


    function linearSearch($haystack, $needle) {
        $steps = 0;
        $html  = "";
        foreach($haystack as $straw) {
            $steps++;
            if ($straw <= $needle) {
                $html .= '<div class="block green"> '.$straw.'</div>';
            } else {
                $html .= '<div class="block"> '.$straw.'</div>';
            }
        }
        echo $html;
    }

    function binarySearch($haystack, $needle, $steps = 0) {
        if(in_array($needle, $haystack)) {
            $mid = floor(count($haystack)/2);
            printHaystack($haystack, $mid);
            if($haystack[$mid] == $needle) {
                die();
            } elseif($haystack[$mid] > $needle) {
                $haystack = array_splice($haystack, 0, count($haystack)-$mid);
            } else {
                $haystack = array_splice($haystack, (-1*$mid)-1);
            }
            $steps++;
            //print_r($haystack);
             binarySearch($haystack, $needle, $steps);
        }
    }

    function printHaystack($haystack, $mid) {
        echo '<div class=reeks>';
        foreach($haystack as $straw) {
            if($straw == $haystack[$mid]) {
                echo '<div class="block red"> '.$straw.'</div>';
            } else {
                echo '<div class="block"> '.$straw.'</div>';
            }
        }
        echo '</div>';
    }



?>

<h3>Linear Search</h3>
<?php linearSearch($haystack, $needle); ?>
<h3>Binary Search</h3>
<?php binarySearch($haystack, $needle, $steps = 0); ?>

</body>
</html>


