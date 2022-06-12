<?php
//@id ssly
//@name 绅士领域
//@icon https://m.xiazai99.com/uploads/2020/10/2020101502080771.png
//@site 91ssly.xyz

class ssly extends Runner
{
    public function run(string $aid, array $data)
    {
        $this->signin($data["cookie"]);
    }

    /**
    * 签到
    * @param cookie 账号的 Cookie
    */
    private function signin($cookie)
    {
        $result = null;
        $ret = null;
        $ret = newHttp("https://91ssly.xyz/mz_pbl/app_con/add_sign.php")
        ->post("time=1635039871&mac=09308021a9da3472e6095aa048c98327&u_id=".$cookie)
        ->asJSON();
        if ($ret->state == 0) {
            logInfo("绅士领域签到：".$ret->erro);
              $this->nb->append("绅士领域签到：".$ret->erro);
              $result = $ret->erro;
        } elseif ($ret->state == 1) {
             logInfo("绅士领域签到：".$ret->sms);
             $this->nb->append("绅士领域签到：".$ret->sms);
             $result = $ret->sms;
        } else {
            logInfo("绅士领域签到失败");
            $this->nb->append("绅士领域签到失败");
            $result = "绅士领域签到失败";
        }
        $this->nb->append($result);
    }    
}
