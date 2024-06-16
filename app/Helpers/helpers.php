<?php


if( !function_exists('privilegeViewTransaction')){
    function privilegeViewTransaction(){
        return in_array(4, session('privileges')) || in_array(8, session('privileges')) ;
    }
}

if( !function_exists('privilegeAddTransaction')){
    function privilegeAddTransaction(){
        return in_array(5, session('privileges')) || in_array(9, session('privileges')) ;
    }
}

if( !function_exists('privilegeAddDeposit')){
    function privilegeAddDeposit(){
        return in_array(5, session('privileges')) ;
    }
}