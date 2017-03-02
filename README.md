[![Build Status](https://travis-ci.org/aaronlp/wp-nonce-oo.svg?branch=master)](https://travis-ci.org/aaronlp/wp-nonce-oo)

## WordPress nonce functionality re-created with Object Oriented approach

This package provides an object oriented approach to basic nonce generation and checking. It can be used instead of some of the core the wp_nonce functions in your plugin or theme. 

## Benefits over existing default WP nonce functionality

* Object-oriented
* Set your action name once at object creation then generate/check nonces with that action name as many times as you like
* Ability to set a custom expiry for your nonce/s
* True single use nonce - no longer valid once it's been used once

## Important

If you use wp_nonce functionlity you are possibly used to generating one nonce and then using it multiple times in the same page. When using AJAX to submit data, this works fine because WordPress nonces can be used over and over again. Therefore, if you have multiple items on the same page using the same nonce and use AJAX to submit multiple actions without reloading the page, it works fine.

However, the nonce implementation here is single use which provides more security but means using the same nonce multiple times could result in failure, especially if you are submitting the data to the server using AJAX.

To avoid this, generate a new nonce for eveey button/action on your page and generate a new nonce to replace an existing one if the nonce is used.

## Simple usage example
```
$generator = apwd\WP_Nonce_OO\WP_Nonce_OO('my_action');

//override the nonce expiry time to 2 minutes
$generator->setNonceExpiry(120);   

//creates and persists a new nonce and returns it
$my_new_nonce = $generator->createNonce();         

//add your action name and the nonce returned by the above to your form.
//Alternatively generate a hidden input field with the nonce already included using $generator->outputNonce(); 

//then in your form processing function:

$generator = APWD\WP_Nonce_OO\WP_Nonce_OO($_REQUEST['action]);
$nonce_valid = $generator->useNonce($_REQUEST['nonce']);
if ($nonce_valid) {
    //Process form...
} else {
    //Deny processing...
}
```
