<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Installation Manager                                |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Installation Manager                                    |
 * @version 1.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
include('system/global-install.php');
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
$html   = array();
$arr    = array();
$error  = array();
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------- delete database
if(isset($_REQUEST['do']) and $_REQUEST['do']=='deletedatabase')
{
    delete_database();
}
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------- step 1
if(isset($_GET['step']) and $_GET['step'] == '1')
{
    $html     = '<li class="titletop">'.$lang['global']['installing'].'</li>';
    $html    .= '<li class="title">'.$lang['step1']['title'].'</li>';
    $connect  = db_connect();
    $select   = db_select();
    $arr['contents'] = db_contents();
    if($connect['status'] == true)
    {
        $html .= $connect['msg'];
        $arr['error'] = 'no';
        $arr['error'] = $connect['status'];
        if($select)
        {
            $html .= $select['msg'];
            $arr['error'] = 'no';
        }
        else
        {
            $html .= $select['msg'];
            $arr['error'] = 'yes';
        }
    }
    else
    {
        $html .= $connect['msg'];
        $arr['error'] = 'yes';
    }
    $arr['html'] = $html;
    echo json_encode($arr) ;
}
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------- step 2
elseif(isset($_GET['step']) and $_GET['step'] == '2')
{
    $html  = '<li class="brline"></li><li class="title">'.$lang['step2']['title'].'</li>';
    $arr = $error = array();
    if(!empty($check_the_server))
    {
        foreach($check_the_server as $server)
        {
            if($server['check'] and $server['version'] and $server['version'] <= $server['value'])
            {
                $html .= '<li>'.$server['title'].': <span style="color:green">'.$server['msg']['on'].'</span></li>';
                $error[] = '0';
            }
            else
            {
                $html .= '<li>'.$server['title'].': <span style="color:red">'.$server['msg']['off'].'</span></li>';
                if($server['stop'])
                {
                    $error[] = '1';
                }
                else
                {
                    $error[] = '0';
                }
            }
        }
    }
    if(!empty($check_the_folder))
    {
        foreach($check_the_folder as $folder)
        {
            if($folder['check'] and $folder['value'])
            {
                $html .= '<li>'.$folder['title'].': <span style="color:green">'.$folder['msg']['on'].'</span></li>';
                $error[] = '0';
            }
            else
            {
                $html .= '<li>'.$folder['title'].': <span style="color:red">'.$folder['msg']['off'].'</span></li>';
                if($folder['stop'])
                {
                    $error[] = '1';
                }
                else
                {
                    $error[] = '0';
                }
            }
        }
    }    
    if(!empty($check_the_file))
    {
        foreach($check_the_file as $file)
        {
            if($file['check'] and $file['value'])
            {
                $html .= '<li>'.$file['title'].': <span style="color:green">'.$file['msg']['on'].'</span></li>';
                $error[] = '0';
            }
            else
            {
                $html .= '<li>'.$file['title'].': <span style="color:red">'.$file['msg']['off'].'</span></li>';
                if($file['stop'])
                {
                    $error[] = '1';
                }
                else
                {
                    $error[] = '0';
                }
            }
        }
    }    
        
    if(!in_array('1',$error))
    {
        $arr['error'] = 'no';
    }   
    else
    {
        $arr['error'] = 'yes';
    }                                         
    $arr['html']  = $html;
    echo json_encode($arr) ;
}
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------- step 3
elseif(isset($_GET['step']) and $_GET['step'] == '3')
{
    $html  = '<li class="brline"></li><li class="title">'.$lang['step3']['title'].'</li>';
    include('application/database-tables-install.php');
    foreach($tables as $key => $val)
    {
        $sql = parse_mysql_dump($val);
        if($sql)
        {
            $html .= '<li>'.$lang['global']['create_table'].' '.$key.' <span style="color:green">'.$lang['global']['has_been_successfully'].'</span></li>';
            $error[] = '0';
        }
        else
        {
            $html .= '<li>'.$lang['global']['create_table'].' '.$key.' <span style="color:red">'.$lang['global']['the_operation_did_not_succeed'].'</span></li>';
            $error[] = '1';
        }
    }
    if(!in_array('1',$error))
    {
        $arr['error'] = 'no';
    }
    else
    {
        $arr['error'] = 'yes';
        $html .= '<li>'.$lang['global']['create_table'].' <span style="color:red">'.$lang['global']['error'].'</span></li>';
    }
    $arr['html']  = $html;
    echo json_encode($arr) ;
}
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------- step 4
elseif(isset($_GET['step']) and $_GET['step'] == '4')
{
    $html  = '<li class="brline"></li><li class="title">'.$lang['step4']['title'].'</li>';
    $sqlstep  = modal_step3($_POST);
    $sqlstep3 = parse_mysql_dump($sqlstep['sql']);
    if($sqlstep3)
    {
        $html .= '<li>'.$lang['step4']['insert'].' '.$sqlstep['tablename'].' <span style="color:green">'.$lang['global']['has_been_successfully'].'</span></li>';
        $error[] = '0';
    }
    else
    {
        $html .= '<li>'.$lang['step4']['insert'].' '.$sqlstep['tablename'].' <span style="color:red">'.$lang['global']['the_operation_did_not_succeed'].'</span></li>';
        $error[] = '1';
    }
    if(!in_array('1',$error))
    {
        $arr['error'] = 'no';
    }
    else
    {
        $arr['error'] = 'yes';
        $html .= '<li>Importing default data: <span style="color:red">'.$lang['global']['error'].'</span></li>';
    }
    $arr['html']  = $html;
    echo json_encode($arr) ;
}
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------- step 5
elseif(isset($_GET['step']) and $_GET['step'] == '5')
{
    $html  = '<li class="brline"></li><li class="title">'.$lang['step5']['title'].'</li>';
    $sqlstep  = modal_step4($_POST);
    $sqlstep4 = parse_mysql_dump($sqlstep['sql']);
    if($sqlstep4)
    {
        $html .= '<li>'.$lang['step4']['insert'].' '.$sqlstep['tablename'].' <span style="color:green">'.$lang['global']['has_been_successfully'].'</span></li>';
        $error[] = '0';
    }
    else
    {
        $html .= '<li>'.$lang['step4']['insert'].' '.$sqlstep['tablename'].' <span style="color:red">'.$lang['global']['the_operation_did_not_succeed'].'</span></li>';
        $error[] = '1';
    }
    if(!in_array('1',$error))
    {
        $arr['error'] = 'no';
    }
    else
    {
        $arr['error'] = 'yes';
        $html .= '<li>'.$lang['step5']['admin_created'].': <span style="color:red">'.$lang['global']['error'].'</span></li>';
    }
    $arr = array();
    $arr['html']  = $html;
    echo json_encode($arr) ;
}
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------- step 6
elseif(isset($_GET['step']) and $_GET['step'] == '6')
{
    $html  = '<li class="brline"></li><li class="title">'.$lang['step6']['title'].'</li>';
    include('application/database-data-install.php');
    foreach($datatables as $key => $val)
    {
        $sql = parse_mysql_dump($val);
        if($sql)
        {
            $html .= '<li>'.$lang['step6']['importing'].' '.$key.' <span style="color:green">'.$lang['global']['has_been_successfully'].'</span></li>';
            $error[] = '0';
        }
        else
        {
            $html .= '<li>'.$lang['step6']['importing'].' '.$key.' <span style="color:red">'.$lang['global']['the_operation_did_not_succeed'].'</span></li>';
            $error[] = '1';
        }
    }
    if(!in_array('1',$error))
    {
        $arr['error'] = 'no';
    }
    else
    {
        $arr['error'] = 'yes';
        $html .= '<li>'.$lang['step6']['importing'].' <span style="color:red">'.$lang['global']['error'].'</span></li>';
    }
    $arr['html']  = $html;
    $arr['error'] = 'no';
    echo json_encode($arr) ;
}
//--------------------------------------------------------------------------------------------------------------
else
{
    
}
//--------------------------------------------------------------------------------------------------------------
?>