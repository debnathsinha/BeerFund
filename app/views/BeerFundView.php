<?php


class BeerFundView {

    function display() {

        $html = '<html>';
        $html .= '<head>';
        $html .= '<title>BeerFund</title>';
        $html .= '</head>';
        
        $html .= '<body>';
        $html .= '<form name="logout" action="index.php" method="get">';
        $html .= '<input type="submit" name="logout" value="Logout" />';
        
        $html .= '</form>';
        
        $html .= '</body>';
        $html .= '</html>';
        echo $html;
        echo "displaying stuff\n";
        echo $_SESSION["user"];
        echo $_SESSION["password"];
        echo "hopefully you could see tht\n";

    }

}


?>