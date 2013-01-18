<html>
    <head>
        <style>
            .ProblemRow {margin:0 0 0 0;height:auto;width:auto;position:relative;clear:left;}
            .ProblemVertical, .ProblemHorizontal { 
                font-size: 16px; font-weight:bold;
                float: left; position: relative;
             }
                .ProblemVertical { 
                    width: 50px;
                    margin:0px 0px 50px 40px;
                }
                .ProblemHorizontal { 
                    width: 90px;
                    margin:0px 0px 50px 0px; 
                }
            .Problem span {clear:left;text-align:right;position:relative;}
            .Line       {background:#000000;}
            .Line img, .LineSpacer  {width:100px;height:2px;}
            .LineSpacer, .Answer {margin:2px 0 0 0;}
            .Top, .Bottom, .Line, .LineSpacer, .Answer {float:left;clear:left;text-align:right;}
                .Top, .Bottom { text-align: right; width: inherit;}
            .Answer      {border: 2px solid; }
            .Bottom     { border-bottom: 2px solid; }
            .Left, .Right { display: inline; float: left;}
            .HideMath   {color:#ffffff;visibility:hidden;}
            .DivisorHat { 
                border-left: 1px solid;
                border-top: 1px solid;
                height: 17px;
                margin: 0 0 0 5px;
                padding: 0 0 0 5px;
                position: relative;
                top: -1px;
                width: 25px; 
            }
        </style>
        
        <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
    </head>
    
    <body>
<?php
//todo pages here and with page break style
$sOrientation = "Vertical";
$iPages = 1;
$iRows = 8;
$iColumns = 10;
$iRowNum = 1;
$iColNum = 1;
     switch ($_GET['mathtype']) {
            case "plusminus":
                $sMathType = "plusminus";
                break;
            case "divide":
                $sMathType = "&divide;";
                break;
            case "times":
                $sMathType = "*";
                break;
            case "minus":
                $sMathType = "-";
                break;
            default:
                $sMathType = "+";
                break;
     }
     
     switch ($_GET['layout']) {
         case "mixed":
             $sLayout = "mixed";
             $sOne = "Top";
             $sTwo = "Bottom";
             break;
         case "portrait":
         case "vertical":
             $sLayout = "portrait";
             $sOne = "Top";
             $sTwo = "Bottom";
             break;
         default:
             $sLayout = "landscape";
             $sOne = "Left";
             $sTwo = "Right";
             $sOrientation = "Horizontal";
             $sEqualizer = "=";
             break;
     }

// Set max and min top values if desired
if ($_GET['mintop'] != "") {
    $iMinTop = $_GET['mintop'];
}
else {
    $iMinTop = "0";
}
     
if ($_GET['maxtop'] != "") {
    $iMaxTop = $_GET['maxtop'];
}
else {
    $iMaxTop = "15";
}

// Set max and min bot values if desired
if ($_GET['minbot'] != "") {
    $iMinBot = $_GET['minbot'];
}
else {
    $iMinBot = "0";
}

if ($_GET['maxbot'] != "") {
    $iMaxBot = $_GET['maxbot'];
}
else {
    $iMaxBot = "15";
}

for ($i=0; $i<($iRows*$iPages); $i++)
{
?>
    <div class="ProblemRow">
        <?php
        for ($j=0;$j<$iColumns;$j++)
        {
            // Top & Bottom OR left & Right

            // Top
            $iTop = rand($iMinTop,$iMaxTop);

            // Bottom
            $iBot = rand($iMinBot,$iMaxBot);
                        
            if ($sLayout == "mixed") {
                if (($iRowNum % 2) == 0) {
                     $sOneSpacer = "";
                     $sTwoSpacer = "";
                     
                     $sOne = "Left";
                     $sTwo = "Right";
                     $sOrientation = "Horizontal";
                     $sEqualizer = "=";
                     if ($sMathType == "&divide;") {
                         $sEqualizer = "";
                     }
                } else {
                     $sOne = "Top";
                     $sTwo = "Bottom";
                     $sOrientation = "Vertical";
                     $sEqualizer = "";
                    
                }
            }
            
            // Division easing
            if ($sMathType == "&divide;") {
                if ($iBot !=0 && ($iTop / $iBot != 0)) {
                    $iTop = $iBot * rand($iBot,$iMaxTop/2);
                }
                
                // swap horizontal numbers to get right number under the hat
                if ($sOrientation === "Horizontal") {
                    $iTempVal = $iTop;
                    $iTop = $iBot;
                    $iBot = $iTempVal; 
                }
            }
            if ($_GET['mathtype'] === "plusminus") {
                if (($i + $j) % 2) {
                    $sMathType = "-";
                } else {
                    $sMathType = "+";
                }
            }

            ?>
            <div class="Problem<?php echo $sOrientation ?>">
                <div class="<?php echo $sOne ?>"><?= $sOneSpacer; ?><?php echo $iTop; ?></div>
                <div class="<?php echo $sTwo ?>"><span class="mathType"><?= $sMathType?></span><?= $sTwoSpacer; ?><?php echo $iBot; ?> <? echo $sEqualizer ?></div>
            </div>
        <?php
        }
        ?>
    </div>

<?php
    // track column and row numbers
    if ($iColNum < $iCols) {
        $iColNum = $iColNum + 1;
    } else {
        $iColNum = 1;
        $iRowNum = $iRowNum + 1;
    }

    // br at end
    if ((($i + 1) % $iRows) == 0)
    {
       echo "<br/>";
    }
}

if ($sMathType == "&divide;") {
?>
<script>
    $(document).ready(function() {
        $('.ProblemHorizontal .mathType').hide();
        $('.ProblemHorizontal .Right').addClass('DivisorHat');
        $('.ProblemHorizontal').attr('style', 'margin-top: 10px;');
    });
</script>
<?php
}

if ($sMathType == "*") {
?>
<script>
    $(document).ready(function() {
        $('.ProblemHorizontal .mathType').text("x");
        $('.ProblemHorizontal .mathType').attr('style', 'margin: 0px 2px 0px 2px;');
    });
</script>
<?php
}
?>

    </body>
</html>