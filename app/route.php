<?php
App::getAction(link: '/proje/', path: '/deneme/index', auth: false, area: null);

App::getAction(link: '/proje/register', path: '/user/register', auth: false, area: null);

App::postAction(link: '/proje/registerPost', path: '/user/registerPost', auth: false, area: null);


?>