<?php
/*
 * Simple Demo of Duo's Web SDK
 *
 * Simple login form with hardcoded username/password
 * protected using Duo
 */

require_once '../../src/Web.php';

define('USERNAME', 'demo');
define('PASSWORD', 'letmein');

/*
 * This is something uniquely generated by you for your application
 * and is not shared with Duo.
 */
define('AKEY', "0b12f9e65005b1e2b19d7b3b8f8ce76e3f3e2f9d");

/*
 * IKEY, SKEY, and HOST should come from the Duo Security admin dashboard
 * on the integrations page. For security reasons, these keys are best stored
 * outside of the webroot in a production implementation.
 */
define('IKEY', "DI9DDA2NDC72G6MG0NSA");
define('SKEY', "zirHtgQw5XlOsGBvIHyZB9EenzDZ3SCyOW9PsqNs");
define('HOST', "api-67478907.duosecurity.com");

echo "<html>";
echo '<head>';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo '</head>';
echo "<h1>Duo Security Web SDK Demo</h1>";
echo sprintf("Username: %s <br>Password: %s <br><br><br><hr>", USERNAME, PASSWORD);

/*
 * STEP 3:
 * Once secondary auth has completed you may log in the user
 */
if (isset($_POST['sig_response'])) {
    /*
     * Verify sig response and log in user. Make sure that verifyResponse
     * returns the username we logged in with. You can then set any
     * cookies/session data for that username and complete the login process.
     */
    $resp = Duo\Web::verifyResponse(IKEY, SKEY, AKEY, $_POST['sig_response']);
    if ($resp === USERNAME) {
        // Password protected content would go here.
        echo 'Hi, ' . $resp . '<br>';
        echo 'Your content here!';
    }
}

/*
 * STEP 2:
 * verify username and password
 * if the user and pass are good, then generate a sig_request and
 * load up the Duo iframe for secondary authentication
 */
else if (isset($_POST['user']) && isset($_POST['pass'])) {
    if ($_POST['user'] === USERNAME && $_POST['pass'] === PASSWORD) {
        /*
         * Perform secondary auth, generate sig request, then load up Duo
         * javascript and iframe.
         */
        $sig_request = Duo\Web::signRequest(IKEY, SKEY, AKEY, $_POST['user']);
    ?>
        <script type="text/javascript" src="Duo-Web-v2.js"></script>
        <link rel="stylesheet" type="text/css" href="Duo-Frame.css">
        <iframe id="duo_iframe"
            data-host="<?php echo HOST; ?>"
            data-sig-request="<?php echo $sig_request; ?>"
        ></iframe>
<?php
    }
}

/*
 * STEP 1: login form
 * handled exactly as usual
 */
else {
    // Output simple login form
    echo "<form action='index.php' method='post'>";
    echo "Username: <input type='text' name='user' /> <br />";
    echo "Password: <input type='password' name='pass' /> <br />";
    echo "<input type='submit' value='Submit' />";
    echo "</form>";
}

echo "</html>";

?>
