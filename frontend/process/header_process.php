<?php
class header_process {
    public function header($location){
   echo'<script>window.location="'.$location.'";</script>';
    }
}
