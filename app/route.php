<?php
///path : /modulAdı/controllerAdı/fonkAdı

App::getAction(link: '/proje/dashboard', path: '/admin/dashboard/dashboard', auth: true);



App::getAction(link: '/proje/newuser', path: '/user/user/newuser', auth: false);

App::postAction(link: '/proje/newuserPost', path: '/user/user/newuserPost', auth: false);

App::getAction(link: '/proje/login', path: '/user/user/login', auth: false);

App::postAction(link: '/proje/loginPost', path: '/user/user/loginPost', auth: false);

App::getAction(link: '/proje/dashboard', path: '/admin/admin/dashboard', auth: true);


//Users
App::getAction(link: '/proje/usersetting', path: '/admin/admin/user', auth: true);

App::getAction(link: '/proje/userupdate/([0-9a]+)', path: '/admin/admin/userupdate/([0-9a]+)', auth: false);

App::postAction(link: '/proje/userupdatePost/([0-9a]+)', path: '/admin/admin/userupdatePost/([0-9a]+)', auth: false);

App::getAction(link: '/proje/delete/([0-9a]+)', path: '/admin/admin/user_delete/([0-9a]+)', auth: false);



//Roles
App::getAction(link: '/proje/newrole', path: '/admin/admin/newrole', auth: false);

App::postAction(link: '/proje/newrolePost', path: '/admin/admin/newrolePost', auth: false);

App::getAction(link: '/proje/roleupdate/([0-9a]+)', path: '/admin/admin/roleupdate/([0-9a]+)', auth: false);

App::postAction(link: '/proje/roleupdatePost/([0-9a]+)', path: '/admin/admin/roleupdatePost/([0-9a]+)', auth: false);

App::getAction(link: '/proje/role_delete/([0-9a]+)', path: '/admin/admin/role_delete/([0-9a]+)', auth: false);



//languages

App::getAction(link: '/proje/newlanguage', path: '/admin/admin/newlanguage', auth: false);

App::postAction(link: '/proje/newlanguagePost', path: '/admin/admin/newlanguagePost', auth: false);

App::getAction(link: '/proje/languageupdate/([0-9a]+)', path: '/admin/admin/languageupdate/([0-9a]+)', auth: false);

App::postAction(link: '/proje/languageupdatePost/([0-9a]+)', path: '/admin/admin/languageupdatePost/([0-9a]+)', auth: false);

App::getAction(link: '/proje/language_delete/([0-9a]+)', path: '/admin/admin/language_delete/([0-9a]+)', auth: false);


//permission
App::getAction(link: '/proje/newpermission', path: '/admin/admin/newpermission', auth: false);

App::postAction(link: '/proje/newpermissionPost', path: '/admin/admin/newpermissionPost', auth: false);

App::getAction(link: '/proje/permissionupdate/([0-9a]+)', path: '/admin/admin/permissionupdate/([0-9a]+)', auth: false);

App::postAction(link: '/proje/permissionupdatePost/([0-9a]+)', path: '/admin/admin/permissionupdatePost/([0-9a]+)', auth: false);

App::getAction(link: '/proje/permission_delete/([0-9a]+)', path: '/admin/admin/permission_delete/([0-9a]+)', auth: false);


App::postAction(link: '/proje/logout', path: '/user/user/logout', auth: false);


//Pages
App::getAction(link: '/proje/pageList', path: '/admin/page/pageList', auth: true);
App::getAction(link: '/proje/newpage', path: '/admin/page/newpage', auth: true);
App::postAction(link: '/proje/newpagePost', path: '/admin/page/newpagePost', auth: true);

App::getAction(link: '/proje/pageupdate/([0-9a]+)', path: '/admin/page/pageupdate/([0-9a]+)', auth: true); 
App::postAction(link: '/proje/pageupdatePost/([0-9a]+)', path: '/admin/page/pageupdatePost/([0-9a]+)', auth: true);

App::getAction(link: '/proje/page_delete/([0-9a]+)', path: '/admin/page/page_delete/([0-9a]+)', auth: true); 


//Önyüz sayfa
//App::getAction(link: '/proje/page/([0-9a-zA-Z-_]+)', path: '/page/detail', auth: false);








?>