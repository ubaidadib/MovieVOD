<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of header_process
 *
 * @author ubaidadib
 */
class header_process {
    public function header($location){
   echo'<script>window.location="'.$location.'";</script>';
    }
}