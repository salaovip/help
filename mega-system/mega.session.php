<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Gallery Manager                                     |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <themearabia@gmail.com> |
 * @package PHP Gallery Manager                                         |
 * @version 2.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
if (!defined('IN_MEGATPL')){exit;}                                    //|
//----------------------------------------------------------------------|

class session
{
    // set session
    public function set_session($length,$userid,$location = '')
    {
        global $db;
        $ip = $_SERVER['REMOTE_ADDR'];
        $pc = $_SERVER['HTTP_USER_AGENT'];
        $time = time() + 2500;
        $crc = securitytoken($length);
        $sql_ins = array(
            'sessionhash'   => $crc,
            'userid'        => $userid,
            'host'          => $ip,
            'idhash'        => '',
            'lastactivity'  => $time,
            'location'      => $location,
            'useragent'     => $pc,
        );
        $sql    = 'INSERT INTO '.SESSION_TABLE.' ' . $db->sql_build_array('INSERT', $sql_ins);
        $result = $db->sql_query($sql);
        $_SESSION['sessionhash'] = $crc;
        setcookie('sessionmega', $crc, $time); 
        return $crc;
    }
    // get session
    public function get_session($login = true){
        global $db,$config;
        $ip = $_SERVER['REMOTE_ADDR'];
        $pc = $_SERVER['HTTP_USER_AGENT'];
        $time = time() + $config['lastactivity'];
        $countsession = $db->sql_numrows(
            "SELECT * FROM ".SESSION_TABLE." WHERE 
            `sessionhash`='".@$_SESSION['sessionhash']."' and `host`='".$ip."' and `useragent`='".$pc."' and `location`='user' and `lastactivity` > '".time()."'
        ");
            
        if($login == true)
        {
            if($countsession == true)
            {
                header("location:index.php");
            }
        }
        else{
            
            if($countsession == true)
            {
                $db->sql_query("
                    UPDATE ".SESSION_TABLE." SET `lastactivity`='".$time."' WHERE 
                    `sessionhash` = '".$_SESSION['sessionhash']."' and `host`='".$ip."' and `location`='user' and `useragent`='".$pc."'
                ");
                return true;
            }
            else
            {
                return false;
            }
        }
    }
    // unset session
    public function unset_session(){
        global $db;
        $ip = $_SERVER['REMOTE_ADDR'];
        $pc = $_SERVER['HTTP_USER_AGENT'];
        $db->sql_query("DELETE FROM ".SESSION_TABLE." WHERE `sessionhash`='".$_SESSION['sessionhash']."' and `location`='user' and `host`='".$ip."' and `useragent`='".$pc."'");
        return true;
    }
    // get account
    public function get_account($filed){
        global $db;
        $ip      = $_SERVER['REMOTE_ADDR'];
        $pc      = $_SERVER['HTTP_USER_AGENT'];
        $result  = $db->sql_query("SELECT * FROM ".SESSION_TABLE." WHERE `sessionhash`='".@$_SESSION['sessionhash']."' and `location`='user' and `host`='".$ip."' and `useragent`='".$pc."'");
        $row     = $db->sql_fetchrow($result);
        $id      = $row['userid'];
        $result2 = $db->sql_query("SELECT * FROM ".USERS_TABLE." WHERE `id`='".$id."'");
        $account = $db->sql_fetchrow($result2);
        $db->sql_freeresult($result);
        $db->sql_freeresult($result2);
        return $account[$filed];
    }

}
?>