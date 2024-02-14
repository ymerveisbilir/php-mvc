<?php

App::getAction(link: '/proje/newuser', path: '/user/newuser', auth: false);

App::postAction(link: '/proje/newuserPost', path: '/user/newuserPost', auth: false);

App::getAction(link: '/proje/login', path: '/user/login', auth: false);

App::postAction(link: '/proje/loginPost', path: '/user/loginPost', auth: false);

App::getAction(link: '/proje/dashboard', path: '/admin/dashboard', auth: true);


//Users
App::getAction(link: '/proje/usersetting', path: '/admin/user', auth: true);

App::getAction(link: '/proje/userupdate/([0-9a]+)', path: '/admin/userupdate/([0-9a]+)', auth: false);

App::postAction(link: '/proje/userupdatePost/([0-9a]+)', path: '/admin/userupdatePost/([0-9a]+)', auth: false);

App::getAction(link: '/proje/delete/([0-9a]+)', path: '/admin/delete/([0-9a]+)', auth: false);



//Roles
App::getAction(link: '/proje/newrole', path: '/admin/newrole', auth: false);

App::postAction(link: '/proje/newrolePost', path: '/admin/newrolePost', auth: false);

App::getAction(link: '/proje/roleupdate/([0-9a]+)', path: '/admin/roleupdate/([0-9a]+)', auth: false);

App::postAction(link: '/proje/roleupdatePost/([0-9a]+)', path: '/admin/roleupdatePost/([0-9a]+)', auth: false);

App::getAction(link: '/proje/role_delete/([0-9a]+)', path: '/admin/role_delete/([0-9a]+)', auth: false);



//languages

App::getAction(link: '/proje/newlanguage', path: '/admin/newlanguage', auth: false);

App::postAction(link: '/proje/newlanguagePost', path: '/admin/newlanguagePost', auth: false);

App::getAction(link: '/proje/languageupdate/([0-9a]+)', path: '/admin/languageupdate/([0-9a]+)', auth: false);

App::postAction(link: '/proje/languageupdatePost/([0-9a]+)', path: '/admin/languageupdatePost/([0-9a]+)', auth: false);

App::getAction(link: '/proje/language_delete/([0-9a]+)', path: '/admin/language_delete/([0-9a]+)', auth: false);


//permission
App::getAction(link: '/proje/newpermission', path: '/admin/newpermission', auth: false);

App::postAction(link: '/proje/newpermissionPost', path: '/admin/newpermissionPost', auth: false);

App::getAction(link: '/proje/permissionupdate/([0-9a]+)', path: '/admin/permissionupdate/([0-9a]+)', auth: false);

App::postAction(link: '/proje/permissionupdatePost/([0-9a]+)', path: '/admin/permissionupdatePost/([0-9a]+)', auth: false);

App::getAction(link: '/proje/permission_delete/([0-9a]+)', path: '/admin/permission_delete/([0-9a]+)', auth: false);


App::postAction(link: '/proje/logout', path: '/user/logout', auth: false);


App::getAction(link: '/proje/pages', path: '/page/page', auth: true);
App::getAction(link: '/proje/newpage', path: '/page/newpage', auth: true);

App::postAction(link: '/proje/newpagePost', path: '/page/newpagePost', auth: true);


//App::getAction(link: '/proje/pageupdate', path: '/page/pageupdate', auth: true); 

//App::postAction(link: '/proje/pageupdatePost/([0-9a]+)', path: '/page/pageupdatePost/([0-9a]+)', auth: true);






?>