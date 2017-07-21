<?php

//pr($this->request->session()->read()); ?>
<script type="text/javascript" src="https://appcenter.intuit.com/Content/IA/intuit.ipp.anywhere.js"></script>

<script>
    // Runnable uses dynamic URLs so we need to detect our current //
    // URL to set the grantUrl value   ########################### //
    /*######*/ var parser = document.createElement('a');/*#########*/
    /*######*/parser.href = document.url;/*########################*/
    // end runnable specific code snipit ##########################//
    intuit.ipp.anywhere.setup({
        menuProxy: '',
        grantUrl: 'https://' + parser.hostname + '/QBSync/users/home?start=t'
                // outside runnable you can point directly to the oauth.php page
    });
</script>


  <?php


if(!$this->request->session()->read('token')) { ?>
<h3>You are not currently authenticated!</h3>


<div> 
    Click on the button below to connect this app to QuickBooks
</div>

<br /> <ipp:connectToIntuit></ipp:connectToIntuit><br />
 <?php } else { ?>
<h3>You are currently authenticated!</h3>
<?php 
$token = unserialize($this->request->session()->read('token'));
//echo "realm ID: ". $_SESSION['realmId'] . "<br />";
//echo "oauth token: ". $token['oauth_token'] . "<br />";
//echo "oauth secret: ". $token['oauth_token_secret'] . "<br />";
?>
<br />

<button class='myButton' title='Disconnect your app from QBO' onclick='Disconnect()'>Disconnect</button>

- Invalidates the OAuth access token in the request, thereby disconnecting the user from QuickBooks for this app.
<br />
<button class='myButton' title='Regenerate the tokens within 30 days prior to token expiration' onclick='Reconnect()'>Reconnect</button>
- Invalidates the OAuth access token used in the request and generates a new one, thereby extending the life span by 180 days. You can regenerate the tokens within 30 days prior to expiration!";
<br />
<?php } ?>
<script>
    function Disconnect(parameter) {
        window.location.href = "https://geqfinance.com/qbonline/oauth-php-master/PHPOAuthSample/Disconnect.php";
    }

    function Reconnect(parameter) {
        window.location.href = "https://geqfinance.com/qbonline/oauth-php-master/PHPOAuthSample/Reconnect.php";
    }
</script>



