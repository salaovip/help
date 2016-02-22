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
include('application/config-install.php');
include('application/languages/'.IN_LANGUAGE.'-install.php');


function get_tables_name()
{
    $connect = @mysql_connect( IN_DBHOST, IN_DBUSER, IN_DBPASS );
    $select  = @mysql_select_db( IN_DBNAME, $connect );
    $result = mysql_query("SHOW TABLES FROM ".IN_DBNAME."");
    while ($row = mysql_fetch_row($result))
    {
        if(IN_DBPREF)
        {
            if(substr_count($row[0],IN_DBPREF) )
            {
                echo '<div class="col-sm-4"><input type="checkbox" checked="checked" value="'.$row[0].'" name="nametable[]" /> '.$row[0].'</div>';
            }
        }
        else
        {
            echo '<div class="col-sm-4"><input type="checkbox" checked="checked" value="'.$row[0].'" name="nametable[]" /> '.$row[0].'</div>';
        }
            
    }
    mysql_free_result($result);
}

function delete_database()
{
    $connect = @mysql_connect( IN_DBHOST, IN_DBUSER, IN_DBPASS );
    $select  = @mysql_select_db( IN_DBNAME, $connect );
    $result = mysql_query("SHOW TABLES FROM ".IN_DBNAME."");
    while ($row = mysql_fetch_row($result)) {
        mysql_query("DROP TABLE ".$row[0]."");
    }
    mysql_free_result($result);
}


function db_connect()
{
    global $lang;
    $connect = @mysql_connect( IN_DBHOST, IN_DBUSER, IN_DBPASS );
    if($connect)
    {
        $html['msg']    = '<li>'.$lang['step1']['connect'].'</li>';
        $html['status'] = true;
    }
    else
    {
        $html['msg']    = '<li>'.mysql_error().'</li><li>'.sprintf($lang['step1']['connect_error'], IN_PATH_FILE_CONFIG).'</li>';
        $html['status'] = false;
    }
    return $html;
}



function db_select()
{
    global $lang;
    $connect = @mysql_connect( IN_DBHOST, IN_DBUSER, IN_DBPASS );
    $select  = @mysql_select_db( IN_DBNAME, $connect );
    @mysql_set_charset('utf8');
    if($select)
    {
        
        $html['msg']    = '<li>'.$lang['step1']['selected'].'</li>';
        $html['status'] = true;
    }
    else
    {
        $query = @mysql_query("CREATE DATABASE ".IN_DBNAME."");
        if ($query == true) {
            $html['msg'] = '<li>'.sprintf($lang['step1']['createddb'] , IN_DBNAME).'</li>';
            $html['status'] = true;
        } else {
            $html['msg']    = '<li>'.$lang['step1']['createddb_error'] . mysql_error().'</li>';
            $html['status'] = false;
        }
    }
    return $html;
}

function db_contents()
{
    global $tables;
    $connect = @mysql_connect( IN_DBHOST, IN_DBUSER, IN_DBPASS );
    $select  = @mysql_select_db( IN_DBNAME, $connect );
    @mysql_set_charset('utf8');
    $result = mysql_query("SHOW TABLES FROM ".IN_DBNAME."");
    $x = 0;
    if($result)
    {
        while ($row = mysql_fetch_row($result))
        {
            if(IN_DBPREF)
            {
                if(substr_count($row[0],IN_DBPREF))
                {
                    $x++;
                }
            }
            else
            {
                $x++;
            }   
            
        }
        if($x)
        {
            $status = 'yes';
        }
        else
        {
            $status = 'no';
        }
    }
    else
    {
        $status = 'no';
    }
        
    return $status;
}

function parse_mysql_dump($sql){
    $connect = @mysql_connect( IN_DBHOST, IN_DBUSER, IN_DBPASS );
    $select  = @mysql_select_db( IN_DBNAME, $connect );
    @mysql_set_charset('utf8');
    if(@mysql_query($sql)){
        return true;
    }else{
        return false;
    }	
}

      
?>