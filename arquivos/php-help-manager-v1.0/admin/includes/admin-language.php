<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Help Manager                                        |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Help Manager                                            |
 * @version 1.0                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
if (!defined('IN_MEGATPL_CP') and !defined('IN_MEGATPL'))
{
	exit;
}

class admin_language
{
    /*---------------------------------------------------------------------------*/
    /* language.php                                                             */
    /*---------------------------------------------------------------------------*/
    // language
    public function index_language()
    {
        global $template, $db, $config, $token;
        //
        if(isset($_GET['download']) and is_numeric($_GET['download']))
        {
        	$this->export_lang(intval($_GET['download']));
            $download = true;
        }
        else
        {
            $download = false;
        }
        
        if(isset($_POST['add_language']))
        {
        	$this->import_lang();
            $import = true;
        }
        else
        {
            $import = false;
        }
        
        if(isset($_GET['make_default']) and is_numeric($_GET['make_default']))
        {
            $result = $db->sql_query("UPDATE " . LANGS_TABLE . " SET `defaultd`='0' WHERE `id`!='".$db->sql_escape($_GET['make_default'])."'");
            $result = $db->sql_query("UPDATE " . LANGS_TABLE . " SET `defaultd`='1' WHERE `id`='".$db->sql_escape($_GET['make_default'])."'");
            @header("Location:language.php?ms=makedefault");
        }
        
        
        if(isset($_POST['addlang']))
        {
            $this->add_lang();
            @header("Location:language.php?ms=addlang");
        }
        
        $result = $db->sql_query("SELECT * FROM ".LANGS_TABLE." ORDER BY id ASC");
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('admin_loop_language', array( 
                'ID'        => $row['id'],
                'NAME'      => $row['name'], 
                'CODE'      => $row['code'], 
                'REGEX'     => $row['regex'], 
                'ACTIVE'    => $row['active'], 
                'DEFAULT'   => $row['defaultd'],
            ));
        }
        $template->assign_vars(array(
            'CLASS_LANG'  => ' class="active"',
        ));
        page_header(get_admin_languages('language_settings'));
        $template->set_filename('language.html');
        page_footer();
    }
    

    // form language
    public function edit_language()
    {
        global $template, $db, $config;
        
        
        if(isset($_POST['id']))
        {
            $post = $_POST;
            $result = $db->sql_query("UPDATE " . LANGS_TABLE . " SET 
                `name`      ='". $post['name']."',
                `code`      ='". $post['code']."',
                `regex`     ='". $post['regex']."'
                 WHERE `id` = '" . $db->sql_escape($post['id']) . "'
            ");
            $db->sql_freeresult($result);
            
        }
        
        $id = intval($_GET['edit_language']);
        $resultlang = $db->sql_query("SELECT * FROM ".LANGS_TABLE." WHERE `id`='".$id."'");
        $rowlang = $db->sql_fetchrow($resultlang);
        $template->assign_vars(array( 
            'ID'        => $rowlang['id'],
            'NAME'      => $rowlang['name'], 
            'CODE'      => $rowlang['code'], 
            'REGEX'     => $rowlang['regex'], 
            'ACTIVE'    => $rowlang['active'], 
            'DEFAULT'   => $rowlang['defaultd'],
        ));
        
        
        
        $page         = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit        = 20;
    	$startpoint   = ($page * $limit) - $limit;
        $sql          = "SELECT * FROM ".PHRASES_TABLE." WHERE `lang_iso`='".$rowlang['code']."' ORDER BY id ASC";
        $result       = $db->sql_query_limit($sql,$limit,$startpoint);
        $total        = $db->sql_numrows($sql);
        $lastpage     = ceil($total/$limit);
        if($total > $limit){$showpagination = true;}else{$showpagination = false;}
        while ($row = $db->sql_fetchrow($result)) 
        {
            $template->assign_block_vars('admin_loop_phrase', array( 
                'ID'            => $row['id'],
                'VARNAME'       => $row['varname'], 
                'TEXT'          => $row['text'], 
                'USED_VARNAME'  => strtoupper($row['varname']), 
            ));
        }
        
        $template->assign_vars(array(
            'CLASS_LANG'        => ' class="active"',
            'SHOW_PAGINATION'   => $showpagination,
            'PAGINATION'        => pagination($total,$limit,$page,'language.php?edit_language='.$id.'&'),
        ));
        page_header('');
        $template->set_filename('form-language.html');
        page_footer();
    }
    
    public function add_lang()
    {
        global $template, $db, $config;
        $varname = preg_replace('/[^\w\._]+/', '_', strtolower($_POST['varname']));
        $sql_ins = array(
            'id'        => (int)'',
            'lang_iso'  => $_POST['lang_code'],
            'varname'   => $varname,
            'text'      => $_POST['text']
        );                   
        $sql     = 'INSERT INTO ' . PHRASES_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
        $result  = $db->sql_query($sql);
        $db->sql_freeresult($result);
    }
    
    
    // active language
    public function active_language()
    {
        global $template, $db, $config;
        $get_status = $_REQUEST['status'];
        $id     = intval($_GET['id']);
        if($get_status == 'disable'){$status = 0;$_SESSION['action_token'] = get_admin_languages('disable_language_successfully');}
        elseif($get_status == 'enable'){$status = 1;$_SESSION['action_token'] = get_admin_languages('enable_language_successfully');}
        else {$get_status = 1;$_SESSION['action_token'] = 'none';}
        if($status == 0)
        {
            $result = $db->sql_query("UPDATE " . LANGS_TABLE . " SET `defaultd`='1' WHERE `id`!='".$db->sql_escape($id)."' LIMIT 1");
        }
        $result = $db->sql_query("UPDATE " . LANGS_TABLE . " SET `active`='".$status."', `defaultd`='0'   WHERE `id`='".$db->sql_escape($id)."'");
        $db->sql_freeresult($result);
        @header("Location:".THIS_SCRIPT);
    }
    // delete language
    public function delete_language()
    {
        global $template, $db, $config;
        $id     = intval($_GET['id']);
        if($_REQUEST['token'] == $_SESSION['securitytokenadmincp'])
        {
            $resultlang = $db->sql_query("SELECT * FROM ".LANGS_TABLE." WHERE `id`='".$id."'");
            $rowlang = $db->sql_fetchrow($resultlang);
            $result = $db->sql_query("DELETE FROM " . PHRASES_TABLE . "  WHERE `lang_iso`='".$db->sql_escape($rowlang['code'])."'");
            $db->sql_freeresult($result);
            $result = $db->sql_query("DELETE FROM " . LANGS_TABLE . "  WHERE `id`='".$db->sql_escape($id)."'");
            $db->sql_freeresult($result);
            $_SESSION['action_token'] = get_admin_languages('delete_language_successfully');
        }
        else
        {
            
        }
        header("Location:".THIS_SCRIPT."");
    }

	public function import_lang()
	{
		global $template, $db, $config;
		//First we will move uploaded file
		$file_name = '../uploads/lang.xml';
		
		if(empty($_FILES['lang_file']['name']))
        {
            //e(lang("no_file_was_selected"));
        }
		elseif(move_uploaded_file($_FILES['lang_file']['tmp_name'], $file_name ))
		{
			//Reading Content
			$content = file_get_contents($file_name);
			if(!$content)
			{
				//e(lang("err_reading_file_content"));
			}
            else
			{
				//Converting data from xml to array
				$data    = $this->xml2array($content,1,'tag',false);
				//now checkinf if array has lang code, phrases and name etc or not
				$data    = $data['helpdesk_language'];
				$phrases = $data['phrases'];
                $this->lang_exists($data['iso_code']);
				if(empty($data['name']))
                {
                    //e(lang("cant_find_lang_name"));
                }
				elseif(empty($data['iso_code']))
                {
                    //e(lang("cant_find_lang_code"));
                }
				elseif(count($phrases)<1)
                {
                    //e(lang("no_phrases_found"));
                }
				elseif($this->lang_exists($data['iso_code']))
                {
                    //e(lang("language_already_exists"));
                }
				else
				{
                    
                    $sql_ins = array(
                        'id'        => (int)'',
                        'code'      => $data['iso_code'],
                        'name'      => $data['name'],
                        'regex'     => "/^".$data['iso_code']."/i",
                        'active'    => (int)'0',
                        'defaultd'  => (int)'0'
                    );                   
                    $sql     = 'INSERT INTO ' . LANGS_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_ins, true);
                    $result  = $db->sql_query($sql);
                    $db->sql_freeresult($result);
                    
                    
					$sql = '';
					foreach($phrases as $code => $phrase)
					{
						if(!empty($sql))
                        {
                            $sql .=",\n";
                        }
						$sql .= "('".$data['iso_code']."','$code','".mysql_real_escape_string($phrase)."')";
					}
					$sql .= ";";
					$query = "INSERT INTO ".PHRASES_TABLE." (lang_iso,varname,text) VALUES \n";
					$query .= $sql;
					$db->sql_query($query);
					//e(lang("lang_added"),"m");
				}
			}
			
		}
        else
        {
            //e(lang("error_while_upload_file"));
        }
			
		if(file_exists($file_name))
        {
            unlink($file_name);
        }
	}
    
    function lang_exists($id)
	{
		global $db;
        $sql   = "SELECT * FROM ".LANGS_TABLE." WHERE `code`='".$id."' OR `id`='".$id."'";
        $total = $db->sql_numrows($sql);
		if($total)
		{
          $result = $db->sql_query($sql);
          $row = $db->sql_fetchrow($result);
          return $row;
		}
		else
		{
		  return false;
		}
	}
    
    function get_lang($id)
	{
		return $this->lang_exists($id);
	}

    function lang_phrases($lang_details = '')
	{
		$phrases = $this->get_phrases($lang_details['code']);
		foreach($phrases as $phrase)
		{
			$lang[$phrase['varname']] = $phrase['text'];
		}
		return $lang;
	}
    
    function get_phrases($lang = NULL,$fields="varname,text")
	{
		global $db;
		$lang_details = $this->lang_exists($lang);
		$lang_code    = $lang_details['code'];
		if(empty($lang_code))
        {
            $lang_code = 'en';
        }
        $sql    = "SELECT ".$fields." FROM ".PHRASES_TABLE." WHERE `lang_iso`='".$lang_code."' ORDER BY id ASC";
        $result = $db->sql_query($sql);
        $data = array();
        while($row = $db->sql_fetchrow($result))
        {
            $data[] = $row;
        }
        return $data;
	}
    
    
    function export_lang($id)
	{
		
		//first get language details
		$lang_details = $this->get_lang($id);
		if($lang_details)
		{
			header("Pragma: public"); // required
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Cache-Control: private",false); // required for certain browsers 
			header("Content-type: application/force-download");
			header("Content-Disposition: attachment; filename=\"lang_".$lang_details['code'].".xml\""); 
echo '<?xml version="1.0" encoding="UTF-8"?>';
			?>
<helpdesk_language>
    <name><?=$lang_details['name']?></name>
    <iso_code><?=$lang_details['code']?></iso_code>
    <phrases>
    <?=$this->array2xml(array('lang'=>$this->lang_phrases($lang_details)));?>
    </phrases>
</helpdesk_language>
            <?php
			exit();
		}
        else
		{
		}
	}
    
    
    
    
    function xml2array($url, $get_attributes = 1, $priority = 'tag',$is_url=true)
	{
		$contents = "";
		if (!function_exists('xml_parser_create'))
		{
			return false;
		}
		$parser = xml_parser_create('');
		
		if($is_url)
		{
			if (!($fp = @ fopen($url, 'rb')))
			{
				$ch = curl_init();
				curl_setopt($ch,CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_USERAGENT, 
				'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.2) Gecko/20070219 Firefox/3.0.0.2');
				curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
				curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
				$contents = curl_exec($ch);
				curl_close($ch);
				
				if(!$contents)
					return false;
			}
			while (!feof($fp))
			{
				$contents .= fread($fp, 8192);
			}
			fclose($fp);
		}else{
			$contents = $url;
		}

		xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8");
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_parse_into_struct($parser, trim($contents), $xml_values);
		xml_parser_free($parser);
		if (!$xml_values)
			return; //Hmm...
		$xml_array = array ();
		$parents = array ();
		$opened_tags = array ();
		$arr = array ();
		$current = & $xml_array;
		$repeated_tag_index = array ();
		foreach ($xml_values as $data)
		{
			
			unset ($attributes, $value);
			extract($data);
			$result = array ();
			$attributes_data = array ();
			if (isset ($value))
			{
				if ($priority == 'tag')
					$result = $value;
				else
					$result['value'] = $value;
			}
			if (isset ($attributes) and $get_attributes)
			{
				foreach ($attributes as $attr => $val)
				{
					if ($priority == 'tag')
						$attributes_data[$attr] = $val;
					else
						$result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
				}
			}
			if ($type == "open")
			{
				$parent[$level -1] = & $current;
				if (!is_array($current) or (!in_array($tag, array_keys($current))))
				{
					$current[$tag] = $result;
					if ($attributes_data)
						$current[$tag . '_attr'] = $attributes_data;
					$repeated_tag_index[$tag . '_' . $level] = 1;
					$current = & $current[$tag];
				}
				else
				{
					if (isset ($current[$tag][0]))
					{
						$current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
						$repeated_tag_index[$tag . '_' . $level]++;
					}
					else
					{
						$current[$tag] = array (
							$current[$tag],
							$result
						);
						$repeated_tag_index[$tag . '_' . $level] = 2;
						if (isset ($current[$tag . '_attr']))
						{
							$current[$tag]['0_attr'] = $current[$tag . '_attr'];
							unset ($current[$tag . '_attr']);
						}
					}
					$last_item_index = $repeated_tag_index[$tag . '_' . $level] - 1;
					$current = & $current[$tag][$last_item_index];
				}
			}
			elseif ($type == "complete")
			{
				if (!isset ($current[$tag]))
				{
					$current[$tag] = $result;
					$repeated_tag_index[$tag . '_' . $level] = 1;
					if ($priority == 'tag' and $attributes_data)
						$current[$tag . '_attr'] = $attributes_data;
				}
				else
				{
					if (isset ($current[$tag][0]) and is_array($current[$tag]))
					{
						$current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
						if ($priority == 'tag' and $get_attributes and $attributes_data)
						{
							$current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
						}
						$repeated_tag_index[$tag . '_' . $level]++;
					}
					else
					{
						$current[$tag] = array (
							$current[$tag],
							$result
						);
						$repeated_tag_index[$tag . '_' . $level] = 1;
						if ($priority == 'tag' and $get_attributes)
						{
							if (isset ($current[$tag . '_attr']))
							{
								$current[$tag]['0_attr'] = $current[$tag . '_attr'];
								unset ($current[$tag . '_attr']);
							}
							if ($attributes_data)
							{
								$current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
							}
						}
						$repeated_tag_index[$tag . '_' . $level]++; //0 and 1 index is already taken
					}
				}
			}
			elseif ($type == 'close')
			{
				$current = & $parent[$level -1];
			}
		}
		
		return ($xml_array);
	}
    
    function array2xml($array, $level=1)
	{
		$xml = '';
		// if ($level==1) {
		//     $xml .= "<array>\n";
		// }
		foreach ($array as $key=>$value) {
		$key = strtolower($key);
		if (is_object($value)) {$value=get_object_vars($value);}// convert object to array
		
		if (is_array($value)) {
			$multi_tags = false;
			foreach($value as $key2=>$value2) {
			 if (is_object($value2)) {$value2=get_object_vars($value2);} // convert object to array
				if (is_array($value2)) {
					$xml .= str_repeat("\t",$level)."<$key>\n";
					$xml .= array2xml($value2, $level+1);
					$xml .= str_repeat("\t",$level)."</$key>\n";
					$multi_tags = true;
				} else {
					if (trim($value2)!='') {
						if (htmlspecialchars($value2)!=$value2) {
							$xml .= str_repeat("\t",$level).
									"<$key2><![CDATA[$value2]]>". // changed $key to $key2... didn't work otherwise.
									"</$key2>\n";
						} else {
							$xml .= str_repeat("\t",$level).
									"<$key2>$value2</$key2>\n"; // changed $key to $key2
						}
					}
					$multi_tags = true;
				}
			}
			if (!$multi_tags and count($value)>0) {
				$xml .= str_repeat("\t",$level)."<$key>\n";
				$xml .= array2xml($value, $level+1);
				$xml .= str_repeat("\t",$level)."</$key>\n";
			}
		
		 } else {
			if (trim($value)!='') {
			 echo "value=$value<br>";
				if (htmlspecialchars($value)!=$value) {
					$xml .= str_repeat("\t",$level)."<$key>".
							"<![CDATA[$value]]></$key>\n";
				} else {
					$xml .= str_repeat("\t",$level).
							"<$key>$value</$key>\n";
				}
			}
		}
		}
		//if ($level==1) {
		//    $xml .= "</array>\n";
		// }
		
		return $xml;
	}
    
}    
?>