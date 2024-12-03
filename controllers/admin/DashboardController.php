<?php

require_once '../models/Dashboard.php';
class DashboardController extends Dashboard{
    public function index(){
        $countUsers = $this->CountUser();
        $countUsersToday = $this->CountUserToday();
        $countOrderTotalAdmin = $this->CountOrder();
        $countOrderAdminToday = $this->CountOrderToday();
        $countRevenue = $this->countRevenueAll();
        $countRevenueToday = $this->countRevenueToday();
        // var_dump($countUsersToday);
        // die();
        include '../views/admin/index.php';
    }
}
