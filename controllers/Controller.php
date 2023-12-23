<?php
abstract class Controller {
    public function renderView($content) {
        include("views/".$content.".php");
    }
}
?>