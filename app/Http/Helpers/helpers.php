<?php

use Illuminate\Support\Facades\DB;

    function roleName($roleId)
    {
        $name = DB::table('roles')->where('id', $roleId)->first()->name;
        return $name;
    }

?>
