<?php

class DefaultController
{
    public function index()
    {
        // Gọi trực tiếp file giao diện trang chủ nơ hồng Sanrio
        include 'app/views/home.php';
        exit;
    }
}