<?php

class viewHelper extends View {

    public function __construct() {

    }

    public function getDetailByField($json = '', $firstField = '', $secondField = '') {

        $data = json_decode($json, true);

        if (isset($data[$firstField])) {
      
            return $data[$firstField];
        }
        elseif (isset($data[$secondField])) {
      
            return $data[$secondField];
        }

        return '';
    }

    public function includeThumbnail($name = '',$year_awarded='') {

        return PROFILE_IMAGE_URL . $year_awarded . "/" . str_replace(' ', '_', $name) . ".jpg";

    }
    public function includeAvatarPhotos($name = '',$year_awarded='') {

        return AVATAR_IMAGE_URL . $year_awarded . "/" . str_replace(' ', '_', $name) . ".jpg";

    }

    public function displayFieldData($json, $auxJson='') {

        $data = json_decode($json, true);
        
        if ($auxJson) $data = array_merge($data, json_decode($auxJson, true));
        
        if(isset($data['id'])) {

            $data['id'] = $data['albumID'] . '/' . $data['id'];
            unset($data['albumID']);
        }

        $html = '';
        $html .= '<ul class="list-unstyled">';

        foreach ($data as $key => $value) {

            if(preg_match('/keyword/i', $key)) {

                $html .= '<li class="keywords"><strong>' . $key . ':</strong><span class="image-desc-meta">';
                
                $keywords = explode(',', $value);
                foreach ($keywords as $keyword) {
   
                    $html .= '<a href="' . BASE_URL . 'search/field/?description=' . $keyword . '">' . str_replace(' ', '&nbsp;', $keyword) . '</a> ';
                }
                
                $html .= '</span></li>' . "\n";
            }
            else{

                $html .= '<li><strong>' . $key . ':</strong><span class="image-desc-meta">' . $value . '</span></li>' . "\n";
            }
        }

        $html .= '<li>Do you know details about this picture? Mail us at heritage@iitm.ac.in quoting the image ID. Thank you.</li>';

        $html .= '</ul>';

        return $html;
    }
    public function insertReCaptcha() {

        require_once('vendor/recaptchalib.php');

        $publickey = "6Le_DBsTAAAAACt5YrgWhjW00CcAF0XYlA30oLPc";
        $privatekey = "6Le_DBsTAAAAAH8rvyqjPXU9jxY5YJxXct76slWv";

        echo recaptcha_get_html($publickey);
    }

}

?>
