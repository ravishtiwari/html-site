<?php
/**
 * User: ravish
 * Date: 12/16/14
 * Time: 7:24 PM
 */

class TextCaptcha {
    /**
     * Text Captcha end point
     */
    const API_END_POINT = "http://api.textcaptcha.com/";

    /**
     * @var string API KEY
     */
    private $_key = '';

    public function __construct($key)
    {
        $this->_key = $key;
    }

    /**
     * return new random text captcha in following format
     * : question=>QUESTUION, answer => array(answer1, answer2)
     * @return array
     */
    public function getCaptcha()
    {
        $url = self::API_END_POINT.$this->_key;
        try {
            $xml = @new SimpleXMLElement($url,null,true);
        } catch (Exception $e) {
            $fallback = '<captcha>'.
                '<question>Is ice hot or cold?</question>'.
                '<answer>'.md5('cold').'</answer></captcha>';
            $xml = new SimpleXMLElement($fallback);
        }
        $question = (string) $xml->question;
        $ans = array();
        foreach ($xml->answer as $hash) {
            $ans[] = (string) $hash;
        }
        return array('question' => $question, 'answer' => $ans);
    }
} 