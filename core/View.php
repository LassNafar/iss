<?php
namespace core;

    class View
    {
        public function generate($content_view, $template_view, $data = NULL)
        {
            include "views/" . $template_view;
        }
    }

