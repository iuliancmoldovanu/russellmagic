<?php

class Input
{
    public static function exist($type = 'post')
    {
        switch ($type) {
            case 'post':
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;
                break;
            default:
                return false;
                break;
        }
    }

    public static function get($field)
    {
		    if ( isset( $_POST[ $field ] ) ) {
			    return $_POST[ $field ];
		    } else if ( isset( $_GET[ $field ] ) ) {
			    echo $_GET[ $field ];

			    return $_GET[ $field ];
		    }
        return '';
    }
} 