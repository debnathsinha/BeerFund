<?php


class LoginView {

    function display() {
        $html = '<html>';
        $html .= '<head>';
        $html .= '<title>BeerFund</title>';
        $html .= '</head>';

        $html .= '<body>';
        $html .= '<form name="login" action="index.php" method="post">';
        $html .= 'Username: <input type="text" name="user" />';
        $html .= 'Password: <input type="password" name="password" />';
        $html .= '<input type="submit" name="submit" value="Submit" />';
        
        $html .= '</form>';
        $html .= 'foo from LoginView';
        $html .= '</body>';
        $html .= '</html>';
        echo $html;
    }

}


?>