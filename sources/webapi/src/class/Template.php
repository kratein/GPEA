<?php
/*
 * Plunk Framework
 * Written by Burak (burak@burak.fr)
 *
 */

class Template {

    private $template;
    private $folder;
    private $data;
    private $replaceKeys = [];
    private $replaceValues = [];
    private $key1 = "{{";
    private $key2 = "}}";

    public function __construct($folder, $template) {
        $this->template = $template;
        $this->folder = $folder;
        $this->loadTemplate();
        $this->set('time', time());
        $this->set('root', RootConfig::getROOTPATH());
    }

    private function loadTemplate() {
        $path = RootConfig::getTPLPATH() . $this->folder . "/" . $this->template . RootConfig::getTPLEXT();
        if (file_exists($path)) {
            $this->data = file_get_contents($path);
        } else {
            throw new Exception("Template (" . $path . ") not found !");
        }
    }

    public function set($key, $value) {
        $this->replaceKeys[] = $this->key1 . $key . $this->key2;
        $this->replaceValues[] = $value;
    }

    public function render() {
        print(str_replace($this->replaceKeys, $this->replaceValues, $this->data));
    }

    public function getOutput() {
        return str_replace($this->replaceKeys, $this->replaceValues, $this->data);
    }

}
