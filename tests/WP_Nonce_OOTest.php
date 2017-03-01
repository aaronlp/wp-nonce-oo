<?php
namespace apwd\WP_Nonce_OO;

//mock override the in-built WordPress global functions 
function get_current_user_id() {
    return 1;
}
function wp_salt($scheme) {
    return '%SgrUWC0{:Q]/2)~r+.xKF9WizZ`/{`vr/IZzA_*Za}S7{BH&UC{>?pl`c1::{ba';
}

use PHPUnit\Framework\TestCase;
 

class WP_Nonce_OOTest extends TestCase {

    public function testExpirySet() {
        $generator = new WP_Nonce_OO('action');
        $result = $generator->setNonceExpiry(120);
        $this->assertTrue($result);
        $this->assertEquals($generator->expiry_time, 120);
    }
    
    public function testExpiryNotInteger() {
        $generator = new WP_Nonce_OO('action');
        $pre_expiry = $generator->getNonceExpiry();
        $result = $generator->setNonceExpiry('string');
        $this->assertFalse($result);
        $this->assertEquals($pre_expiry, $generator->getNonceExpiry());
    }
 
}
