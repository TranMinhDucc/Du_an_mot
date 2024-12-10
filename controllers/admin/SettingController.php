<?php
require_once '../models/Settings.php';
class SettingController extends Settings
{
    public function indexSettings(){
        $settings = $this->getAllSetting();
        // var_dump($settings); die();
        if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['btn_setting'])){
            foreach ($_POST['settings'] as $id => $content) {
                $this->updateSetting($id, $content);
                header("Location: ?act=setting");
            }
        }
        include '../views/admin/setting/settings.php';
    }
    
}
