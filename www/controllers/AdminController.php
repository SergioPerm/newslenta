<?php

class AdminController {

    public function receivePostData()
    {
        $data = [];
        if (!empty($_POST['title'])) {
            $data['title'] = $_POST['title'];
        }

        if (!empty($_POST['content'])) {
            $data['content'] = $_POST['content'];
        }

        if (isset($data['title']) && isset($data['content'])) {
            //определим текущую дату и добавим к новости
            $tek_data = date("d.m.Y") . " " . date("H:i:s");
            $data['datetime'] = $tek_data;
        }
    }
} 