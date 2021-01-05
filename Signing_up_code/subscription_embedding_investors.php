<?php
include_once('../database/init.php');
require_once '../mandrill/src/Mandrill.php';
if(!isset($_SESSION))
{ 

    session_set_cookie_params(time() + 43200000, '/', 'www.directly-sourced.com', isset($_SERVER["HTTPS"]), true);
    ini_set('session.gc_maxlifetime', 43200000);
    session_start(); 

} 

if ($_POST['action'] == 'embedding_subscription') {

    //Check for beta
    $beta = check_beta($_POST['email']);

    //Check for early bird
    $early_bird = check_early_bird($_POST['email']);

        //Check unique DB
    $is_unique = check_unique_email($_POST['email']);

    if($is_unique){

        // Add user to db
        $id = add_user_investor('live', $_POST['firstname'], $_POST['surname'], $_POST['email'], $_POST['password'],'Embedding', $early_bird, $beta, $_POST['user_type'], $_POST['investor_type']);

        $str = substr($_POST['firstname'],0,1);
        $str2 = substr($_POST['surname'],0,1);
        $uid = 'ds'. strtolower($str) . strtolower($str2) . $id;
        $uid = str_replace(" ","",$uid);
        add_user_kv($id, $uid);

        update_user_subscription($id, 1, 'Embedding', $_POST['user_type']);

        $_SESSION['login_username']=$_POST['email'];

        $_SESSION['isLogged'] = true;
        $users = get_user_from_username($_POST['email']);

        foreach ($users as $user)  {

            $_SESSION['login_id_user'] = $user['kv'];

        }

        set_last_login($_SESSION['login_id_user']);

        $_SESSION['userID'] = $_SESSION['login_id_user'];
        $_SESSION['goodAccess'] = 1;
        $_SESSION['surname'] = $users[0]['surname'];
        $_SESSION['email'] = $users[0]['email'];

        $user = get_user_from_id($id);

//Create verification link
        $code = generateStrongPassword(24,false,'lu');

        $str = substr($user[0]['firstname'],0,1);
        $str2 = substr($user[0]['surname'],0,1);
        $uid = 'ds'. strtolower($str) . strtolower($str2) . $user[0]['id'];
        $uid = str_replace(" ","",$uid);

        $link = 'https://www.directly-sourced.com/verification?uid='.$uid.'&code='.$code;

        $name = $user[0]['firstname'] . ' ' . $user[0]['surname'];
        $email = $user[0]['email'];


        try {
            $mandrill = new Mandrill('MANDRILL_KEY');
            $message = array(
                'html' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta name="viewport" content="width=device-width" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Directly Sourced | Welcome</title>
                <style>
                /* -------------------------------------
                GLOBAL
                A very basic CSS reset
                ------------------------------------- */
                * {
                margin: 0;
                padding: 0;
                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                box-sizing: border-box;
                font-size: 14px;
            }

            img {
                max-width: 100%;
            }

            body {
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: none;
                width: 100% !important;
                height: 100%;
                line-height: 1.6;
            }


            table td {
                vertical-align: top;
            }

            /* -------------------------------------
            BODY & CONTAINER
            ------------------------------------- */
            body {
                background-color: #f6f6f6;
            }

            .body-wrap {
                background-color: #f6f6f6;
                width: 100%;
            }

            .container {
                display: block !important;
                max-width: 600px !important;
                margin: 0 auto !important;
                /* makes it centered */
                clear: both !important;
            }

            .content {
                max-width: 600px;
                margin: 0 auto;
                display: block;
                padding: 20px;
            }

            /* -------------------------------------
            HEADER, FOOTER, MAIN
            ------------------------------------- */
            .main {
                background: #fff;
                border: 1px solid #e9e9e9;
                border-radius: 3px;
            }

            .content-wrap {
                padding: 20px;
            }

            .content-block {
                padding: 0 0 20px;
            }

            .header {
                width: 100%;
                margin-bottom: 20px;
            }

            .footer {
                width: 100%;
                clear: both;
                color: #999;
                padding: 20px;
            }
            .footer a {
                color: #999;
            }
            .footer p, .footer a, .footer unsubscribe, .footer td {
                font-size: 12px;
            }

            /* -------------------------------------
            TYPOGRAPHY
            ------------------------------------- */
            h1, h2, h3 {
                font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                color: #000;
                margin: 40px 0 0;
                line-height: 1.2;
                font-weight: 400;
            }

            h1 {
                font-size: 32px;
                font-weight: 500;
            }

            h2 {
                font-size: 24px;
            }

            h3 {
                font-size: 18px;
            }

            h4 {
                font-size: 14px;
                font-weight: 600;
            }

            p, ul, ol {
                margin-bottom: 10px;
                font-weight: normal;
            }
            p li, ul li, ol li {
                margin-left: 5px;
                list-style-position: inside;
            }

            /* -------------------------------------
            LINKS & BUTTONS
            ------------------------------------- */
            a {
                color: #1ab394;
                text-decoration: underline;
            }

            .btn-primary {
                text-decoration: none;
                color: #FFF;
                background-color: #1ab394;
                border: solid #1ab394;
                border-width: 5px 10px;
                line-height: 2;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
                display: inline-block;
                border-radius: 5px;
                text-transform: capitalize;
            }

            /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
            ------------------------------------- */
            .last {
                margin-bottom: 0;
            }

            .first {
                margin-top: 0;
            }

            .aligncenter {
                text-align: center;
            }

            .alignright {
                text-align: right;
            }

            .alignleft {
                text-align: left;
            }

            .clear {
                clear: both;
            }

            /* -------------------------------------
            ALERTS
            Change the class depending on warning email, good email or bad email
            ------------------------------------- */
            .alert {
                font-size: 16px;
                color: #fff;
                font-weight: 500;
                padding: 20px;
                text-align: center;
                border-radius: 3px 3px 0 0;
            }
            .alert a {
                color: #fff;
                text-decoration: none;
                font-weight: 500;
                font-size: 16px;
            }
            .alert.alert-warning {
                background: #f8ac59;
            }
            .alert.alert-bad {
                background: #ed5565;
            }
            .alert.alert-good {
                background: #1ab394;
            }

            /* -------------------------------------
            INVOICE
            Styles for the billing table
            ------------------------------------- */
            .invoice {
                margin: 40px auto;
                text-align: left;
                width: 80%;
            }
            .invoice td {
                padding: 5px 0;
            }
            .invoice .invoice-items {
                width: 100%;
            }
            .invoice .invoice-items td {
                border-top: #eee 1px solid;
            }
            .invoice .invoice-items .total td {
                border-top: 2px solid #333;
                border-bottom: 2px solid #333;
                font-weight: 700;
            }

            /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
            ------------------------------------- */
            @media only screen and (max-width: 640px) {
                h1, h2, h3, h4 {
                    font-weight: 600 !important;
                    margin: 20px 0 5px !important;
                }

                h1 {
                    font-size: 22px !important;
                }

                h2 {
                    font-size: 18px !important;
                }

                h3 {
                    font-size: 16px !important;
                }

                .container {
                    width: 100% !important;
                }

                .content, .content-wrap {
                    padding: 10px !important;
                }

                .invoice {
                    width: 100% !important;
                }
            }

            </style>
            </head>

            <body>

            <table class="body-wrap">
            <tr>
            <td></td>
            <td class="container" width="600">
            <div class="content">
            <table class="main" width="100%" cellpadding="0" cellspacing="0">
            <tr>
            <td class="content-wrap">
            <table  cellpadding="0" cellspacing="0">
            <tr>
            <td style="vertical-align: top; padding-bottom:30px;" align="center"><a href="https://www.directly-sourced.com/" target="_blank"><img src="https://www.directly-sourced.com/img/logosmall.png" style="border:none"></a> </td>
            </tr>

            <tr>
            <td class="content-block aligncenter">
            <h2>Welcome to Directly Sourced</h2>
            </td>
            </tr>


            <tr>
            <td class="content-block">Hello ' . $user[0]['firstname']. ',<br><br>
            Thank you for subscribing to the Directly Sourced community.<br><br>
            To begin using our platform, please verify your account via the following link: <br>' . $link. '
            </td>
            </tr> 


            <tr>
            <td class="content-block">
            Kind regards.<br>Directly Sourced
            </td>
            </tr> 


            </table>
            </td>
            </tr>
            </table>
            </div>
            </td>
            <td></td>
            </tr>
            </table>

            </body>
            </html>
            ',
            'subject' => 'Verification - Welcome to Directly Sourced',
            'from_email' => 'hello@directly-sourced.com',
            'from_name' => 'Directly Sourced',
            'to' => array(
                array(
                    'email' => $email,
                    'name' => $name,
                    'type' => 'to'
                )
            ),
            'headers' => array('Reply-To' => 'noreply@directly-sourced.com'),
            'important' => false,
            'track_opens' => null,
            'track_clicks' => null,
            'auto_text' => null,
            'auto_html' => null,
            'inline_css' => null,
            'url_strip_qs' => null,
            'preserve_recipients' => null,
            'view_content_link' => null,
            'tracking_domain' => null,
            'signing_domain' => null,
            'return_path_domain' => null,
            'merge' => true,
            'merge_language' => 'mailchimp',
            'tags' => array('account-creation-verification'),
            'google_analytics_domains' => array('directly-sourced.com'),
            'google_analytics_campaign' => 'hello@directly-sourced.com',
            'metadata' => array('website' => 'www.directly-sourced.com')
        );
    $async = false;
    $ip_pool = 'Main Pool';
    $send_at = '2020-08-01 11:11:11';
    $result = $mandrill->messages->send($message, $async, $ip_pool, $send_at);
    $output = array(  
        'success'     =>     'Success'

    );  
    echo json_encode($output);

    } catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
        echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
        throw $e;
    }

    }else{
        $output = array(  
            'error'     =>     'Email address already used'

        );  
        echo json_encode($output);
    }

}



