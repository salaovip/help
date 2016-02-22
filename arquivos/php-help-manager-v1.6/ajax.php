<?php
//----------------------------------------------------------------------|
/***********************************************************************|
 * Project:     PHP Help Manager                                        |
//----------------------------------------------------------------------|
 * @link http://themearabia.net                                         |
 * @copyright 2015.                                                     |
 * @author Eng Hossam Hamed <megatpl@gmail.com> <eng.h.hamed@gmail.com> |
 * @package PHP Help Manager                                            |
 * @version 1.6                                                         |
//----------------------------------------------------------------------|
************************************************************************/
//----------------------------------------------------------------------|
session_start();
ob_start();
define('IN_MEGATPL', true);
include('mega-system/mega.class.php');
$Megatpl->setup();
$display->global_vars();
if(isset($_POST))
{
		
	//get type of vote from client
	$user_vote_type = trim($_POST["vote"]);
	
	//get unique content ID and sanitize it (cos we never know).
	$pid = filter_var(trim($_POST["unique_id"]),FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
	
	//Convert content ID to MD5 hash (optional)
	//$pid = hash('md5', $pid);
	
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    } 
	

	switch ($user_vote_type)
	{			
		
		##### User liked the content #########
		case 'up': 
			//check if user has already voted, determined by unique content cookie
            if (isset($_COOKIE["voted_".$pid]))
			{
				header('HTTP/1.1 500 Already Voted'); //cookie found, user has already voted
				exit(); //exit script
			}
			//get vote_up value from db using pid
			$result = $db->sql_query("SELECT vote_up FROM ".VOTING_TABLE." WHERE pid='$pid' LIMIT 1");
			$get_total_rows = $db->sql_fetchrow($result);
			
			if($get_total_rows)
			{
				//found record, update vote_up the value
				$db->sql_query("UPDATE ".VOTING_TABLE." SET vote_up=vote_up+1 WHERE pid='$pid'");
			}else{
				//no record found, insert new record in db
                $sql_ins = array(
        	            'id'                => (int)'',
                        'pid' => (int)$pid,
                        'vote_up'           => (int)'1',
                        'vote_down'         => (int)''
                );
                $sql     = 'INSERT INTO '.VOTING_TABLE.' ' . $db->sql_build_array('INSERT', $sql_ins, false);
                $result  = $db->sql_query($sql);
                $db->sql_freeresult($result);
        
			}
			setcookie("voted_".$pid, 1, time()+7200); // set cookie that expires in 2 hour "time()+7200".
			echo ($get_total_rows["vote_up"]+1); //display total liked votes
			break;	
		
		##### User disliked the content #########
		case 'down': 
			
			//check if user has already voted, determined by unique content cookie
            if (isset($_COOKIE["voted_".$pid]))
			{
				header('HTTP/1.1 500 Already Voted this Content!'); //cookie found, user has already voted
				exit(); //exit script
			}
			//get vote_up value from db using pid
			$result = $db->sql_query("SELECT vote_down FROM ".VOTING_TABLE." WHERE pid='$pid' LIMIT 1");
			$get_total_rows = $db->sql_fetchrow($result);
			
			if($get_total_rows)
			{
				//found record, update vote_down the value
				$db->sql_query("UPDATE ".VOTING_TABLE." SET vote_down=vote_down+1 WHERE pid='$pid'");
			}else{
				
				//no record found, insert new record in db
                $sql_ins = array(
        	            'id'                => (int)'',
                        'pid' => (int)$pid,
                        'vote_up'           => (int)'',
                        'vote_down'         => (int)'1'
                );
                $sql     = 'INSERT INTO '.VOTING_TABLE.' ' . $db->sql_build_array('INSERT', $sql_ins, false);
                $result  = $db->sql_query($sql);
                $db->sql_freeresult($result);
                
			}
			setcookie("voted_".$pid, 1, time()+7200);  // set cookie that expires in 2 hour "time()+7200".
			echo ($get_total_rows["vote_down"]+1);//display total disliked votes
			break;	
		##### respond votes for each content #########		
		case 'fetch':
			//get vote_up and vote_down value from db using pid
			$result = $db->sql_query("SELECT vote_up,vote_down FROM ".VOTING_TABLE." WHERE pid='$pid' LIMIT 1");
			$row = $db->sql_fetchrow($result);
			//making sure value is not empty.
			$vote_up 	= ($row["vote_up"])?$row["vote_up"]:0; 
			$vote_down 	= ($row["vote_down"])?$row["vote_down"]:0;
			//build array for php json
			$send_response = array('vote_up'=>$vote_up, 'vote_down'=>$vote_down);
			echo json_encode($send_response); //display json encoded values
			break;
	}
}
else
{
    
}
//----------------------------------------------------------------------------------------| end
?>