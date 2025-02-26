<?php
session_start();

if(!isset($_SESSION['username'])){
    $_SESSION['username'] = "NpcXYZ";
}

if(isset($_SESSION['username'])){
    echo 'sessao criada';
}