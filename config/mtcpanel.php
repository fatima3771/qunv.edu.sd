<?php
  $intranetPublicUrl = 'http://172.16.1.100/public/includes/';
  $intranetUrl = 'http://172.16.1.100/api/v2/';
  $includesPath = '/qunv.edu.sd/public/includes/';
  $uploadsPath = '/public/uploads/';
  $dashboardMenuArr = [
    ["sectionID" => 1, "sectionTitle" => "التحكم الرئيسي", "sectionIcon" => "cog",
     "menuData" => [[
         'menuID' => 'pages', 'menuTitle'=> '', 'menuIcon'=> 'copy'
        ],[
         'menuID' => 'news', 'menuTitle'=> '', 'menuIcon'=> 'comments-o'
        ],[
         'menuID' => 'slides', 'menuTitle'=> '', 'menuIcon'=> 'cubes'
        ],[
         'menuID' => 'managers', 'menuTitle'=> '', 'menuIcon'=> 'users'
        // ],[
        //  'menuID' => 'councils', 'menuTitle'=> '', 'menuIcon'=> 'users'
        ],[
         'menuID' => 'services', 'menuTitle'=> '', 'menuIcon'=> 'link'
        ],[
         'menuID' => 'polls', 'menuTitle'=> '', 'menuIcon'=> 'thumbs-o-up'
        //],[
        //  'menuID' => 'mainAds', 'menuTitle'=> '', 'menuIcon'=> 'image'
        ],[
         'menuID' => 'banners', 'menuTitle'=> '', 'menuIcon'=> 'image'
        // ],[
        //  'menuID' => 'announcements', 'menuTitle'=> '', 'menuIcon'=> 'television'
        // ],[
        //  'menuID' => 'rasid', 'menuTitle'=> '', 'menuIcon'=> 'newspaper-o'
        // ],[
        //  'menuID' => 'sites', 'menuTitle'=> '', 'menuIcon'=> 'internet-explorer'
        ],[
         'menuID' => 'testamonials', 'menuTitle'=> '', 'menuIcon'=> 'users'
        ],[
         'menuID' => 'colleges', 'menuTitle'=> '', 'menuIcon'=> 'graduation-cap'
        ],[
         'menuID' => 'jobs', 'menuTitle'=> '', 'menuIcon'=> 'users'
        // ],[
        //  'menuID' => 'album', 'menuTitle'=> '', 'menuIcon'=> 'flag'
        // ],[
        //  'menuID' => 'library', 'menuTitle'=> '', 'menuIcon'=> 'book'
        ],[
          'menuID' => 'conferences', 'menuTitle'=> '', 'menuIcon'=> 'users'
        ],[
          'menuID' => 'magazines', 'menuTitle'=> '', 'menuIcon'=> 'newspaper-o'
        ]]
    ],
    // ["sectionID" => 2, "sectionTitle" => "تحكم SPTN",  "sectionIcon" => "cog",
    //  "menuData" => [[
    //      'menuID' => 'members', 'menuTitle'=> '', 'menuIcon'=> 'users'
    //     ],[
    //      'menuID' => 'members_registrations', 'menuTitle'=> '', 'menuIcon'=> 'users'
    //     ],[
    //      'menuID' => 'transactions', 'menuTitle'=> '', 'menuIcon'=> 'money'
    //     // ],[
    //     //  'menuID' => 'magazines', 'menuTitle'=> '', 'menuIcon'=> 'newspaper-o'
    //     // ],[
    //     //  'menuID' => 'conferences', 'menuTitle'=> '', 'menuIcon'=> 'users'
    //     // ],[
    //     //  'menuID' => 'graduates', 'menuTitle'=> '', 'menuIcon'=> 'graduation-cap'
    //     ]]
    // ],
    ["sectionID" => 3, "sectionTitle" => "الإعدادات",  "sectionIcon" => "cog",
     "menuData" => [[
         'menuID' => 'locales', 'menuTitle'=> '', 'menuIcon'=> 'language'
        // ],[
        //  'menuID' => 'wafra', 'menuTitle'=> '', 'menuIcon'=> 'area-chart'
        // ],[
        //  'menuID' => 'pharmaciesPrices', 'menuTitle'=> '', 'menuIcon'=> 'flask'
        ]]
    ],
  ];
  
  return array(
	'intranetPublicUrl' => $intranetPublicUrl,
	'intranetUrl'		=> $intranetUrl,
    'collegesPath'  	=> $includesPath.'colleges',
    'pagesHeadersPath'  	=> $includesPath.'headers',
    'testimonialPath'  	=> $includesPath.'testimonial',
    'newsPath'          	=> $includesPath.'news',
    'managersPath'          	=> $includesPath.'managers',
    'councilsPath'          	=> $includesPath.'councils',
    'albumPath'          	=> $includesPath.'album',
    
    // New By Fatima
    'sevicesHeadersPath'    => $includesPath.'services',
    'servicesPicsPath'      => $includesPath.'servicesPics',
    // ----------------------------------
    
    'sliderPath'          	=> $includesPath.'slider',
    'slidesPath'        	=> $includesPath.'slides',
    'slidesIconPath'        	=> $includesPath.'slides/icons',
    'collegesSlidesPath'	=> $includesPath.'colleges/slides',
    'pdfPath'           	=> $includesPath.'pdf',
    'contentPath'       	=> $includesPath.'content',
    'journalsPath'      	=> $includesPath.'journals',
    'pricesPath'        	=> $includesPath.'prices',
    'bannsPath'        		=> $includesPath.'banns',
    'services'        		=> $includesPath.'services',
    'magazinesCoverPath'	=> $includesPath.'magazines/covers',
    'magazinesIssuesCoverPath'	=> $includesPath.'magazines/covers/issues',
    'magazinesTopicsPath'	=> $includesPath.'magazines/topics',
    'rasidPath'				=> $includesPath.'rasid',
    'dashboardMenuArr'  	=> $dashboardMenuArr
  );
