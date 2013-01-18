<html>
    <head>
        <style>
            * { margin: 0px; }
            td { margin: 0px; padding: 18px; border: 1px solid; }
        </style>
    </head>
    <body>
        <table>
            <?php
            $level = $_GET['difficulty'];
            $totalRows = $_GET['rows'];
            $outerRow = range(1,$totalRows);
            foreach ($outerRow as $row) {
            ?>
                <tr>
                    <?php
                    $outerColumn = range(1,2);
                    foreach ($outerColumn as $column) {
                    $r=-1;
                    ?>
                    <td>
                            <table cellspacing=0 cellpadding=0>
                                <tr>
                                    <?php
                                    $operand = $_GET['operation'];                  
                                    switch ($operand) {
                                        case 'plus':
                                            echo "<td>+</td>";
                                            break;
                                        default:
                                            echo "<td>*</td>";
                                            break;
                                    }
                                    ?>

                                    <?php
                                    $columnNumbers = range(1, 9);
                                    shuffle($columnNumbers);
                                    foreach ($columnNumbers as $number) {
                                        $rand = rand(0, 100);
                                        switch ($level) {
                                            case 'medium':
                                                if ( ($rand % 2) == 0) {
                                                    echo "<td>" . $number . "</td>";
                                                } else {
                                                    echo '<td>&nbsp;</td>';
                                                }
                                                break;
                                            case 'high':
                                                if ( ($rand % 3) == 0) {
                                                    echo "<td>" . $number . "</td>";
                                                } else {
                                                    echo '<td>&nbsp;</td>';
                                                }
                                                break;
                                            case 'crazy':
                                                if ( ($rand % 5) == 0) {
                                                    echo "<td>" . $number . "</td>";
                                                } else {
                                                    echo '<td>&nbsp;</td>';
                                                }
                                                break;
                                            default:
                                                echo "<td>$number</td>";
                                                break;
                                        }
                                    }
                                    ?>
                                </tr>
                                <?php
                                $rowNumbers = range(1, 9);
                                shuffle($rowNumbers);
                                foreach ($rowNumbers as $number) {
                                    $rand = rand(0, 100);
                                    $r++;
                                    $c=-1;
                                    switch ($level) {
                                        case 'medium':
                                            if ( ($rand % 2) == 0) {
                                                echo "<tr><td>" . $number . "</td>";
                                            } else {
                                                echo '<td>&nbsp;</td>';
                                            }
                                            break;
                                        case 'high':
                                            if ( ($rand % 3) == 0) {
                                                echo "<tr><td>" . $number . "</td>";
                                            } else {
                                                echo '<td>&nbsp;</td>';
                                            }
                                            break;
                                        case 'crazy':
                                            if ( ($rand % 5) == 0) {
                                                echo "<tr><td>" . $number . "</td>";
                                            } else {
                                                echo '<td>&nbsp;</td>';
                                            }
                                            break;
                                        default:
                                            echo "<tr><td>$number</td>";
                                            break;
                                    }
                                    $emptyCells = range(1, 9);
                                    foreach ($emptyCells as $cell) {
                                        $c++;
                                        $rand = rand(0, 100);
                                        $answer = ($columnNumbers[$c] *  $rowNumbers[$r]);
                                        switch ($level) {
                                            case 'answers':
                                                echo "<td>" . $answer . "</td>";
                                                break;
                                            case 'medium':
                                                if ( ($rand % 2) == 0) {
                                                    echo "<td>" . $answer . "</td>";
                                                } else {
                                                    echo '<td>&nbsp;</td>';
                                                }
                                                break;
                                            case 'high':
                                                if ( ($rand % 3) == 0) {
                                                    echo "<td>" . $answer . "</td>";
                                                } else {
                                                    echo '<td>&nbsp;</td>';
                                                }
                                                break;
                                            case 'crazy':
                                                if ( ($rand % 5) == 0) {
                                                    echo "<td>" . $answer . "</td>";
                                                } else {
                                                    echo '<td>&nbsp;</td>';
                                                }
                                                break;
                                            default:
                                                echo "<td>&nbsp;</td>";
                                                break;
                                        }
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </td>
                        <?php
                        }
                        ?>
                </tr>
            <?php
            }
            ?>
        </table>        
    </body>
</html>