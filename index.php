<?php
//Aantal records
$x=300;

//Random haystack
$straw = 0;
for($i = 1; $i <= $x; $i++) {
    $straw += random_int(1, 9);
    $haystack[] = $straw;
}

//Random needle
$needle = $haystack[random_int(0,$x-1)];


function linearSearch($haystack, $needle) {
    $steps = 0;
    $html  = "";
    foreach($haystack as $straw) {
        if ($straw <= $needle) {
            $steps++;
            $html .= '<div class="block green"> '.$straw.'</div>';
        } else {
            $html .= '<div class="block"> '.$straw.'</div>';
        }
    }
    echo '<p>Aantal stappen: '.$steps.'</p>'.$html;
}

function binarySearch($haystack, $needle, $steps = 0) {
    if(in_array($needle, $haystack)) {
        $mid = floor(count($haystack)/2);
        printHaystack($haystack, $mid, $steps);
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

function printHaystack($haystack, $mid, $steps) {
    echo '<p> Aantal stappen '.($steps+1).'</p>';
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
<h3>Linear Search</h3>
<?php linearSearch($haystack, $needle); ?>
<h3>Binary Search</h3>
<?php binarySearch($haystack, $needle, $steps = 0); ?>

</body>
</html>


