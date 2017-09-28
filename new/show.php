<?php
require_once 'init.php';

if (isset($_GET['id']) && !empty($_GET['id']))
{
    $id = (int) $_GET['id'];
//    $user = User::find($id)->toArray();
    echo "<pre>";
    print_r(User::all()->count());
    echo "</pre>";

}