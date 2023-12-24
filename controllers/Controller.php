<?php
abstract class Controller {
    private $data = [];

    public function renderView($content) {
        include_once("views/" . $content . ".php");
    }

    public function redirect(string $url) {
        header("Location: $url");   
    }
    public function processEventOnView() {
    }

    public function setData($key, $value) {
        $this->data[$key] = $value;
    }

    public function getData($key) {

        if (array_key_exists($key, $this->data)) {
                    return $this->data[$key];

        }
    }
}
