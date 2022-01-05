<?php

    class Page{

        public function __construct()
        {
            echo 'Constract Call from page  Controller';
        }

        public function index(){
            echo 'Called index method form page controller';
        }
    }