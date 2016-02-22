<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Installation Manager                                |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Installation Manager                                    |
 * @version 1.6                                                         |
//----------------------------------------------------------------------|
************************************************************************/
include('system/global-install.php');
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
$html   = array();
$arr    = array();
$error  = array();
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------- step 1
if(isset($_GET['step']) and $_GET['step'] == '1')
{
    $html     = '<li class="titletop">Upgrade 1.0 to 1.6</li>';
    include('application/database-tables-upgrade.php');
    
    
    foreach($datatables as $key => $val)
    {
        $sql = parse_mysql_dump($val);
        if($sql)
        {
            $error[] = '0';
        }
        else
        {
            $error[] = '1';
        }
    }
    if(!in_array('1',$error))
    {
        $arr['error'] = 'no';
        $html    .= '<li class="title">Create Tables Database</li>';
        $html    .= '<li class="title">Upgrade Tables Database</li>';
        $html    .= '<li class="title">Importing Tables Data</li>';
        $html    .= '<li class="title">Importing languages EN</li>';
        $html    .= '<li class="title">Importing languages AR</li>';
    }
    else
    {
        $arr['error'] = 'yes';
        $html    .= '<li class="title">Upgrade Error!</li>';
    }

    
    
    
    
    

                                      
    $arr['html']  = $html;
    echo json_encode($arr) ;
}
//--------------------------------------------------------------------------------------------------------------
else
{
    
}
//--------------------------------------------------------------------------------------------------------------
?>