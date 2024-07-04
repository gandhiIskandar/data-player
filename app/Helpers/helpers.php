<?php

if (!function_exists('toBaht')) {
    function toBaht($amount)
    {

        return '฿ ' . number_format($amount, 0, ',', '.');
    }
}

if (!function_exists('toRupiah')) {
    function toRupiah($amount, $prefix =  false)
    {
        if ($prefix) {
            return "Rp " . number_format($amount, 0, ',', '.');
        }

        return number_format($amount, 0, ',', '.');
    }
}

if (!function_exists('changeToComa')) {
    function changeToComa($amount)
    {

        return str_replace('.', ',', $amount);
    }
}

if (!function_exists('changeToDot')) {
    function changeToDot($amount)
    {

        return str_replace(',', '.', $amount);
    }
}



if (!function_exists('privilegeViewTransaction')) {
    function privilegeViewTransaction()
    {
        return in_array(4, session('privileges')) || in_array(8, session('privileges'));
    }
}

if (!function_exists('privilegeAddTransaction')) {
    function privilegeAddTransaction()
    {
        return in_array(5, session('privileges')) || in_array(9, session('privileges'));
    }
}

if (!function_exists('privilegeAddDeposit')) {
    function privilegeAddDeposit()
    {
        return in_array(5, session('privileges'));
    }
}
if (!function_exists('privilegeAddWithdraw')) {
    function privilegeAddWithdraw()
    {
        return in_array(9, session('privileges'));
    }
}

if (!function_exists('privilegeEditWithdraw')) {
    function privilegeEditWithdraw()
    {
        return in_array(10, session('privileges'));
    }
}

if (!function_exists('privilegeEditDeposit')) {
    function privilegeEditDeposit()
    {
        return in_array(6, session('privileges'));
    }
}

if (!function_exists('privilegeRemoveWithdraw')) {
    function privilegeRemoveWithdraw()
    {
        return in_array(11, session('privileges'));
    }
}

if (!function_exists('privilegeRemoveDeposit')) {
    function privilegeRemoveDeposit()
    {
        return in_array(7, session('privileges'));
    }
}

if (!function_exists('privilegeEditTransaction')) {
    function privilegeEditTransaction()
    {
        return privilegeEditDeposit() || privilegeEditWithdraw();
    }
}

if (!function_exists('privilegeRemoveTransaction')) {
    function privilegeRemoveTransaction()
    {
        return privilegeRemoveDeposit() || privilegeRemoveWithdraw();
    }
}

if (!function_exists('privilegeChangePassword')) {
    function privilegeChangePassword()
    {
        return in_array(1, session('privileges'));
    }
}

if (!function_exists('privilegeEditUserData')) {
    function privilegeEditUserData()
    {
        return in_array(2, session('privileges'));
    }
}

if (!function_exists('privilegeViewDashboard')) {
    function privilegeViewDashboard()
    {
        return in_array(3, session('privileges'));
    }
}

if (!function_exists('privilegeViewMember')) {
    function privilegeViewMember()
    {
        return in_array(13, session('privileges'));
    }
}

if (!function_exists('privilegeEditMember')) {
    function privilegeEditMember()
    {
        return in_array(14, session('privileges'));
    }
}

if (!function_exists('privilegeRemoveMember')) {
    function privilegeRemoveMember()
    {
        return in_array(15, session('privileges'));
    }
}

if (!function_exists('privilegeViewCashBook')) {
    function privilegeViewCashBook()
    {
        return in_array(16, session('privileges'));
    }
}

if (!function_exists('privilegeAddCashBook')) {
    function privilegeAddCashBook()
    {
        return in_array(17, session('privileges'));
    }
}

if (!function_exists('privilegeEditCashBook')) {
    function privilegeEditCashBook()
    {
        return in_array(18, session('privileges'));
    }
}

if (!function_exists('privilegeRemoveCashBook')) {
    function privilegeRemoveCashBook()
    {
        return in_array(19, session('privileges'));
    }
}

if (!function_exists('privilegeViewExpenditure')) {
    function privilegeViewExpenditure()
    {
        return in_array(20, session('privileges'));
    }
}

if (!function_exists('privilegeAddExpenditure')) {
    function privilegeAddExpenditure()
    {
        return in_array(21, session('privileges'));
    }
}

if (!function_exists('privilegeEditExpenditure')) {
    function privilegeEditExpenditure()
    {
        return in_array(22, session('privileges'));
    }
}

if (!function_exists('privilegeRemoveExpenditure')) {
    function privilegeRemoveExpenditure()
    {
        return in_array(23, session('privileges'));
    }
}
