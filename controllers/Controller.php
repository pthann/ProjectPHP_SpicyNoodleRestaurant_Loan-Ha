<?php
abstract class Controller {
    private $data = [];

    public function __construct() {
        $this->getView();
    }

    public function renderView($content) {
        $this->processEvent();
        $this->processData();
        include_once("views/pages/" . $content . ".php");
    }

    public function getView() {
    }

    public function processData() {
    }

    public function processEvent() {
    }

    public function redirect(string $url) {
        header("Location: $url");
    }

    public function setData($key, $value) {
        $this->data[$key] = $value;
    }

    public function getData($key) {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
    }
    protected function processData() {
        $processedData = "The data has been processed"; 
        $this->setData('processedData', $processedData);
    }

}
