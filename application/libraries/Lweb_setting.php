<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Lweb_setting {



    //Setting update form

    public function setting_add_form2()
    {
       $CI = & get_instance();

        $CI->load->model('Web_settings');

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $curlist        = $CI->Web_settings->currency_list();

        $language       = $CI->Web_settings->languages();

        $data = array(

            'title'             => display('update_setting'),

            'logo'              => $setting_detail[0]['logo'],

            'invoice_logo'      => $setting_detail[0]['invoice_logo'],

            'currency'          => $setting_detail[0]['currency'],

            'currency_position' => $setting_detail[0]['currency_position'],

            'favicon'           => $setting_detail[0]['favicon'],

            'footer_text'       => $setting_detail[0]['footer_text'],

            'language'          => $language,

            'currency_list'     => $curlist,

            'rtr'               => $setting_detail[0]['rtr'],

            'captcha'           => $setting_detail[0]['captcha'],

            'site_key'          => $setting_detail[0]['site_key'],

            'secret_key'        => $setting_detail[0]['secret_key'],

            'timezone'          => $setting_detail[0]['timezone'],

            'discount_type'     => $setting_detail[0]['discount_type'],

        );

        $data['timezonelist'] = array(

'Africa/Casablanca' => 'Africa/Casablanca',

'Africa/Lagos' => 'Africa/Lagos',

'Africa/Cairo' => 'Africa/Cairo',

'Africa/Harare' => 'Africa/Harare',

'Africa/Johannesburg' => 'Africa/Johannesburg',

'Africa/Monrovia' => 'Africa/Monrovia',

'America/Anchorage' => 'America/Anchorage',

'America/Los_Angeles' => 'America/Los_Angeles',

'America/Tijuana' => 'America/Tijuana',

'America/Chihuahua' => 'America/Chihuahua',

'America/Mazatlan' => 'America/Mazatlan',

'America/Denver' => 'America/Denver',

'America/Managua' => 'America/Managua',

'America/Chicago' => 'America/Chicago',

'America/Mexico_City' => 'America/Mexico_City',

'America/Monterrey' => 'America/Monterrey',

'America/New_York' => 'America/New_York',

'America/Lima' => 'America/Lima',

'America/Bogota' => 'America/Bogota',

'America/Caracas' => 'America/Caracas',

'America/La_Paz' => 'America/La_Paz',

'America/Santiago' => 'America/Santiago',

'America/St_Johns' => 'America/St_Johns',

'America/Sao_Paulo' => 'America/Sao_Paulo',

'America/Argentina' => 'America/Argentina',

'America/Godthab' => 'America/Godthab',

'America/Noronha' => 'America/Noronha',

'Asia/Jerusalem' => 'Asia/Jerusalem',

'Asia/Baghdad' => 'Asia/Baghdad',

'Asia/Kuwait' => 'Asia/Kuwait',

'Africa/Nairobi' => 'Africa/Nairobi',

'Asia/Riyadh' => 'Asia/Riyadh',

'Asia/Tehran' => 'Asia/Tehran',

'Asia/Baku' => 'Asia/Baku',

'Asia/Muscat' => 'Asia/Muscat',

'Asia/Tbilisi' => 'Asia/Tbilisi',

'Asia/Yerevan' => 'Asia/Yerevan',

'Asia/Kabul' => 'Asia/Kabul',

'Asia/Karachi' => 'Asia/Karachi',

'Asia/Tashkent' => 'Asia/Tashkent',

'Asia/Kolkata' => 'Asia/Kolkata',

'Asia/Katmandu' => 'Asia/Katmandu',

'Asia/Almaty' => 'Asia/Almaty',

'Asia/Dhaka' => 'Asia/Dhaka',

'Asia/Yekaterinburg' => 'Asia/Yekaterinburg',

'Asia/Rangoon' => 'Asia/Rangoon',

'Asia/Bangkok' => 'Asia/Bangkok',

'Asia/Jakarta' => 'Asia/Jakarta',

'Asia/Hong_Kong' => 'Asia/Hong_Kong',

'Asia/Chongqing' => 'Asia/Chongqing',

'Asia/Krasnoyarsk' => 'Asia/Krasnoyarsk',

'Asia/Kuala_Lumpur' => 'Asia/Kuala_Lumpur',

'Australia/Perth' => 'Australia/Perth',

'Asia/Singapore' => 'Asia/Singapore',

'Asia/Taipei' => 'Asia/Taipei', 

'Asia/Ulan_Bator' => 'Asia/Ulan_Bator',

'Asia/Urumqi' => 'Asia/Urumqi',

'Asia/Irkutsk' => 'Asia/Irkutsk',

'Asia/Tokyo' => 'Asia/Tokyo',

'Asia/Seoul' => 'Asia/Seoul',

'Asia/Yakutsk' => 'Asia/Yakutsk',

'Asia/Vladivostok' => 'Asia/Vladivostok',

'Asia/Kamchatka' => 'Asia/Kamchatka',

'Asia/Magadan' => 'Asia/Magadan',

'Atlantic/Azores' => 'Atlantic/Azores',

'Atlantic/Cape_Verde' => 'Atlantic/Cape_Verde',

'Australia/Adelaide' => 'Australia/Adelaide',

'Australia/Darwin' => 'Australia/Darwin',

'Australia/Brisbane' => 'Australia/Brisbane',

'Australia/Canberra' => 'Australia/Canberra',

'Australia/Sydney' => 'Australia/Sydney',

'Australia/Hobart' => 'Australia/Hobart',

'Australia/Melbourne' => 'Australia/Melbourne',

'Canada/Atlantic' => 'Canada/Atlantic',

'Europe/Helsinki' => 'Europe/Helsinki',

'Europe/London' => 'Europe/London',

'Europe/Dublin' => 'Europe/Dublin',

'Europe/Lisbon' => 'Europe/Lisbon',

'Europe/Belgrade' => 'Europe/Belgrade',

'Europe/Berlin' => 'Europe/Berlin',

'Europe/Bratislava' => 'Europe/Bratislava',

'Europe/Brussels' => 'Europe/Brussels',

'Europe/Budapest' => 'Europe/Budapest',

'Europe/Copenhagen' => 'Europe/Copenhagen',

'Europe/Ljubljana' => 'Europe/Ljubljana',

'Europe/Madrid' => 'Europe/Madrid',

'Europe/Paris' => 'Europe/Paris',

'Europe/Prague' => 'Europe/Prague', 

'Europe/Sarajevo' => 'Europe/Sarajevo',

'Europe/Skopje' => 'Europe/Skopje',

'Europe/Stockholm' => 'Europe/Stockholm',

'Europe/Vienna' => 'Europe/Vienna',

'Europe/Warsaw' => 'Europe/Warsaw',

'Europe/Zagreb' => 'Europe/Zagreb',

'Europe/Athens' => 'Europe/Athens',

'Europe/Bucharest' => 'Europe/Bucharest',

'Europe/Riga' => 'Europe/Riga',

'Europe/Sofia' => 'Europe/Sofia',

'Europe/Tallinn' => 'Europe/Tallinn',

'Europe/Vilnius' => 'Europe/Vilnius',

'Europe/Minsk' => 'Europe/Minsk',

'Europe/Istanbul' => 'Europe/Istanbul',

'Europe/Moscow' => 'Europe/Moscow',

'Pacific/Port_Moresby' => 'Pacific/Port_Moresby',

'Pacific/Fiji' => 'Pacific/Fiji',

'Pacific/Kwajalein' => 'Pacific/Kwajalein',

'Pacific/Midway' => 'Pacific/Midway',

'Pacific/Samoa' => 'Pacific/Samoa',

'Pacific/Honolulu' => 'Pacific/Honolulu',

'Pacific/Auckland' => 'Pacific/Auckland',

'Pacific/Tongatapu' => 'Pacific/Tongatapu',

'Pacific/Guam' => 'Pacific/Guam',

            );

        $setting = $CI->parser->parse('web_setting/web_setting', $data, true);

        return $setting;
    }

    public function setting_add_form() {

        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $curlist        = $CI->Web_settings->currency_list();

        $language       = $CI->Web_settings->languages();

  
        $admin_company =$CI->Web_settings->admin_company();

        $data = array(

            'title'             => display('update_setting'),

            'logo'              => $setting_detail[0]['logo'],

            'invoice_logo'      => $setting_detail[0]['invoice_logo'],

            'currency'          => $setting_detail[0]['currency'],

            'currency_position' => $setting_detail[0]['currency_position'],

            'favicon'           => $setting_detail[0]['favicon'],

            'footer_text'       => $setting_detail[0]['footer_text'],
           // 'admin_user_mail'  => $admin_user_mail_ids,
            'admin_company'  => $admin_company,
            'language'          => $language,

            'currency_list'     => $curlist,

            'rtr'               => $setting_detail[0]['rtr'],

            'captcha'           => $setting_detail[0]['captcha'],

            'site_key'          => $setting_detail[0]['site_key'],

            'secret_key'        => $setting_detail[0]['secret_key'],

            'timezone'          => $setting_detail[0]['timezone'],

            'discount_type'     => $setting_detail[0]['discount_type'],

        );

        $data['timezonelist'] = array(

'Africa/Casablanca' => 'Africa/Casablanca',

'Africa/Lagos' => 'Africa/Lagos',

'Africa/Cairo' => 'Africa/Cairo',

'Africa/Harare' => 'Africa/Harare',

'Africa/Johannesburg' => 'Africa/Johannesburg',

'Africa/Monrovia' => 'Africa/Monrovia',

'America/Anchorage' => 'America/Anchorage',

'America/Los_Angeles' => 'America/Los_Angeles',

'America/Tijuana' => 'America/Tijuana',

'America/Chihuahua' => 'America/Chihuahua',

'America/Mazatlan' => 'America/Mazatlan',

'America/Denver' => 'America/Denver',

'America/Managua' => 'America/Managua',

'America/Chicago' => 'America/Chicago',

'America/Mexico_City' => 'America/Mexico_City',

'America/Monterrey' => 'America/Monterrey',

'America/New_York' => 'America/New_York',

'America/Lima' => 'America/Lima',

'America/Bogota' => 'America/Bogota',

'America/Caracas' => 'America/Caracas',

'America/La_Paz' => 'America/La_Paz',

'America/Santiago' => 'America/Santiago',

'America/St_Johns' => 'America/St_Johns',

'America/Sao_Paulo' => 'America/Sao_Paulo',

'America/Argentina' => 'America/Argentina',

'America/Godthab' => 'America/Godthab',

'America/Noronha' => 'America/Noronha',

'Asia/Jerusalem' => 'Asia/Jerusalem',

'Asia/Baghdad' => 'Asia/Baghdad',

'Asia/Kuwait' => 'Asia/Kuwait',

'Africa/Nairobi' => 'Africa/Nairobi',

'Asia/Riyadh' => 'Asia/Riyadh',

'Asia/Tehran' => 'Asia/Tehran',

'Asia/Baku' => 'Asia/Baku',

'Asia/Muscat' => 'Asia/Muscat',

'Asia/Tbilisi' => 'Asia/Tbilisi',

'Asia/Yerevan' => 'Asia/Yerevan',

'Asia/Kabul' => 'Asia/Kabul',

'Asia/Karachi' => 'Asia/Karachi',

'Asia/Tashkent' => 'Asia/Tashkent',

'Asia/Kolkata' => 'Asia/Kolkata',

'Asia/Katmandu' => 'Asia/Katmandu',

'Asia/Almaty' => 'Asia/Almaty',

'Asia/Dhaka' => 'Asia/Dhaka',

'Asia/Yekaterinburg' => 'Asia/Yekaterinburg',

'Asia/Rangoon' => 'Asia/Rangoon',

'Asia/Bangkok' => 'Asia/Bangkok',

'Asia/Jakarta' => 'Asia/Jakarta',

'Asia/Hong_Kong' => 'Asia/Hong_Kong',

'Asia/Chongqing' => 'Asia/Chongqing',

'Asia/Krasnoyarsk' => 'Asia/Krasnoyarsk',

'Asia/Kuala_Lumpur' => 'Asia/Kuala_Lumpur',

'Australia/Perth' => 'Australia/Perth',

'Asia/Singapore' => 'Asia/Singapore',

'Asia/Taipei' => 'Asia/Taipei', 

'Asia/Ulan_Bator' => 'Asia/Ulan_Bator',

'Asia/Urumqi' => 'Asia/Urumqi',

'Asia/Irkutsk' => 'Asia/Irkutsk',

'Asia/Tokyo' => 'Asia/Tokyo',

'Asia/Seoul' => 'Asia/Seoul',

'Asia/Yakutsk' => 'Asia/Yakutsk',

'Asia/Vladivostok' => 'Asia/Vladivostok',

'Asia/Kamchatka' => 'Asia/Kamchatka',

'Asia/Magadan' => 'Asia/Magadan',

'Atlantic/Azores' => 'Atlantic/Azores',

'Atlantic/Cape_Verde' => 'Atlantic/Cape_Verde',

'Australia/Adelaide' => 'Australia/Adelaide',

'Australia/Darwin' => 'Australia/Darwin',

'Australia/Brisbane' => 'Australia/Brisbane',

'Australia/Canberra' => 'Australia/Canberra',

'Australia/Sydney' => 'Australia/Sydney',

'Australia/Hobart' => 'Australia/Hobart',

'Australia/Melbourne' => 'Australia/Melbourne',

'Canada/Atlantic' => 'Canada/Atlantic',

'Europe/Helsinki' => 'Europe/Helsinki',

'Europe/London' => 'Europe/London',

'Europe/Dublin' => 'Europe/Dublin',

'Europe/Lisbon' => 'Europe/Lisbon',

'Europe/Belgrade' => 'Europe/Belgrade',

'Europe/Berlin' => 'Europe/Berlin',

'Europe/Bratislava' => 'Europe/Bratislava',

'Europe/Brussels' => 'Europe/Brussels',

'Europe/Budapest' => 'Europe/Budapest',

'Europe/Copenhagen' => 'Europe/Copenhagen',

'Europe/Ljubljana' => 'Europe/Ljubljana',

'Europe/Madrid' => 'Europe/Madrid',

'Europe/Paris' => 'Europe/Paris',

'Europe/Prague' => 'Europe/Prague', 

'Europe/Sarajevo' => 'Europe/Sarajevo',

'Europe/Skopje' => 'Europe/Skopje',

'Europe/Stockholm' => 'Europe/Stockholm',

'Europe/Vienna' => 'Europe/Vienna',

'Europe/Warsaw' => 'Europe/Warsaw',

'Europe/Zagreb' => 'Europe/Zagreb',

'Europe/Athens' => 'Europe/Athens',

'Europe/Bucharest' => 'Europe/Bucharest',

'Europe/Riga' => 'Europe/Riga',

'Europe/Sofia' => 'Europe/Sofia',

'Europe/Tallinn' => 'Europe/Tallinn',

'Europe/Vilnius' => 'Europe/Vilnius',

'Europe/Minsk' => 'Europe/Minsk',

'Europe/Istanbul' => 'Europe/Istanbul',

'Europe/Moscow' => 'Europe/Moscow',

'Pacific/Port_Moresby' => 'Pacific/Port_Moresby',

'Pacific/Fiji' => 'Pacific/Fiji',

'Pacific/Kwajalein' => 'Pacific/Kwajalein',

'Pacific/Midway' => 'Pacific/Midway',

'Pacific/Samoa' => 'Pacific/Samoa',

'Pacific/Honolulu' => 'Pacific/Honolulu',

'Pacific/Auckland' => 'Pacific/Auckland',

'Pacific/Tongatapu' => 'Pacific/Tongatapu',

'Pacific/Guam' => 'Pacific/Guam',

            );

        $setting = $CI->parser->parse('web_setting/web_setting', $data, true);

        return $setting;

    }






       public function invoice_setting() {


        $CI = & get_instance();
        $SS = & get_instance();

       
        
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $curlist        = $CI->Web_settings->currency_list();

        $language       = $CI->Web_settings->languages();

        $data = array(

            'title'             => display('update_setting'),

            'logo'              => $setting_detail[0]['logo'],

            'invoice_logo'      => $setting_detail[0]['invoice_logo'],

            'currency'          => $setting_detail[0]['currency'],

            'currency_position' => $setting_detail[0]['currency_position'],

            'favicon'           => $setting_detail[0]['favicon'],

            'footer_text'       => $setting_detail[0]['footer_text'],

            'language'          => $language,

            'currency_list'     => $curlist,

            'rtr'               => $setting_detail[0]['rtr'],

            'captcha'           => $setting_detail[0]['captcha'],

            'site_key'          => $setting_detail[0]['site_key'],

            'secret_key'        => $setting_detail[0]['secret_key'],

            'timezone'          => $setting_detail[0]['timezone'],

            'discount_type'     => $setting_detail[0]['discount_type'],

        );

     

        $setting = $CI->parser->parse('web_setting/invoice_setting', $data, true);

        return $setting;


    }



           public function expense_invoice_setting() {

        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $curlist        = $CI->Web_settings->currency_list();

        $language       = $CI->Web_settings->languages();

        $data = array(

            'title'             => display('update_setting'),

            'logo'              => $setting_detail[0]['logo'],

            'invoice_logo'      => $setting_detail[0]['invoice_logo'],

            'currency'          => $setting_detail[0]['currency'],

            'currency_position' => $setting_detail[0]['currency_position'],

            'favicon'           => $setting_detail[0]['favicon'],

            'footer_text'       => $setting_detail[0]['footer_text'],

            'language'          => $language,

            'currency_list'     => $curlist,

            'rtr'               => $setting_detail[0]['rtr'],

            'captcha'           => $setting_detail[0]['captcha'],

            'site_key'          => $setting_detail[0]['site_key'],

            'secret_key'        => $setting_detail[0]['secret_key'],

            'timezone'          => $setting_detail[0]['timezone'],

            'discount_type'     => $setting_detail[0]['discount_type'],

        );

        $setting = $CI->parser->parse('web_setting/expense_invoice_setting', $data, true);

        return $setting;

    }



    public function email_setting() {

        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $data = array();

        $setting = $CI->parser->parse('web_setting/email_setting', $data, true);

        return $setting;

    }

    public function email_template()
    {
       $CI = & get_instance();
       
        $CI->load->model('email_template');
        

       $dataw = $CI->email_template->retrieve_data();
       $data= array(
        'subject'=> $dataw[0]['subject'],
        'message'=> $dataw[0]['message'],
        'greeting'=> $dataw[0]['greeting'],
        
    
   );

           $setting = $CI->parser->parse('web_setting/email_template', $data, true);

        return $setting;
    }
    public function invoice_design()
    {
        $CI = & get_instance();
        $CD = & get_instance();
        $CI->load->model('invoice_design');
        $CD->load->model('Companies');

       $dataw = $CI->invoice_design->retrieve_data();
       $datac = $CD->Companies->company_details();
       $data= array(
        'header'=> $dataw[0]['header'],
        'logo'=>$datac[0]['logo'],
        'cname'=>$datac[0]['company_name'],
        'email'=>$datac[0]['email'],
        'address'=>$datac[0]['address'],
        'mobile'=>$datac[0]['mobile'],
        'website'=>$datac[0]['website'],
        'color'=> $dataw[0]['color'],
        'template'=> $dataw[0]['template'],
        ''
   );

           $setting = $CI->parser->parse('web_setting/invoice_design', $data, true);

        return $setting;
    }
    ////////////////INvoice Content/////////////
     public function invoice_content()
    {
        $CI = & get_instance();
        $CC = & get_instance();
        $CI->load->model('invoice_design');
        $CC->load->model('invoice_content');

       $dataw = $CI->invoice_design->retrieve_data();
       $datacontent = $CI->invoice_content->retrieve_data();
       $data= array(
        'header'=> $dataw[0]['header'],
        'logo'=> $dataw[0]['logo'],
        'color'=> $dataw[0]['color'],

        'address'=>$datacontent[0]['address'],
        'cname'=>$datacontent[0]['business_name'],
        'phone'=>$datacontent[0]['phone'],
        'email'=>$datacontent[0]['email'],
        'reg_number'=>$datacontent[0]['reg_number'],
        'website'=>$datacontent[0]['website'],
        'address'=>$datacontent[0]['address'],
   );

           $setting = $CI->parser->parse('web_setting/invoice_content', $data, true);

        return $setting;
    }
}



?>