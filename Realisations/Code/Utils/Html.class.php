<?php

namespace Code\Utils;

class Html {
    public function getCSS(string $name): string {
        return '/' . BASE_PATH . 'Code/Views/' . $name;
    }
}