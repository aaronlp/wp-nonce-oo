## WordPress nonce functionality re-created with Object Oriented approach

This package provides an object oriented approach to nonce generation and checking. It can be used instead of the wp_nonce functionality in your plugin or theme. 

## Simple usage example

$generator = APWD\WP_Nonce_OO\WP_Nonce_OO('my_action');
$generator->setNonceExpiry(120);   //override the nonce expiry time to 2 minutes
$generator->createNonce();         //creates and persists a new nonce and returns it
//add your action name and nonce to your form or generate a hidden input field using $generator->outputNonce(); 

//then in your form processing function:

$generator = APWD\WP_Nonce_OO\WP_Nonce_OO($_REQUEST['action]);
$nonce_valid = $generator->useNonce($_REQUEST['nonce']);
if ($nonce_valid) {
    //Process form
}
