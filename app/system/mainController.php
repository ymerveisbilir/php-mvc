<?php


class mainController{


    public function callView($modul,$method,$params=[])
    {
        //echo $modul."<br>".$method."<br>";
        //print_r($params);
        return view::frontView($modul,$method,$params);
    }

    public function  callLayout($layout,$modul,$method,$params=[])
    {
        return view::frontLayout($layout,$modul,$method,$params);
    }

}

?>