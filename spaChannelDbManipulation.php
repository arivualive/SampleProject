<?php
    session_start();
    //$f = json_decode($_POST["fileTypes"][0]);
    //setting the server timezone to Tokyo time
	date_default_timezone_set("Asia/Tokyo");
	//loading infromations of all folders
	$data_results = file_get_contents('jsonFiles/folder.json');
	$folderJsonData = json_decode($data_results,true);
	//loading infromations of all files
	$data_results = file_get_contents('jsonFiles/file.json');
    $fileJsonData = json_decode($data_results,true);
    //loading infromations of all Trash files
	$data_results = file_get_contents('jsonFiles/recycleBin.json');
	$recycleJsonData = json_decode($data_results,true);
	//loading infromations of all schools
	$data_results = file_get_contents('jsonFiles/school.json');
    $schoolJsonData = json_decode($data_results,true);

    switch($_POST['block'])
    {
        case "-2":          // admin wants to log out from current browser so for that updating our DB (decremnt that browser's count and remove his ip[if that is matched on the public ip array], decrement usedAdmin , increment remainingAdmin)
            $response['msg'] = "fail";
            $browser = $_POST['browserName'];
            $channelName = $_POST['channel_name'];
            // this checking is for concurrent logout of superAdmin and admin. And also for backend validation during the DB update during logout (checking that at least one admin is logged in now.)
            // backend validation 
            // (u > 0 && r < a && browserCount > 0) [u = usedAdmin, a = allocatedAdmin , r = remainingAdmin] . [before logut this condition should maintain otherwise no DB update]
            // This case is important.if superAdmin click firstly then this browser's count, PublicIp will be zero then for the 2nd click of logout from admin won't make any hamper for this checking
            // This case is not important.if admin click it firstly for logout then this block will be executed and for the second click of superAdmin will also work perfectly regardlessly about this checking
            if($schoolJsonData[$channelName]['adminBrowserDetails'][$browser]['count'] > 0 && $schoolJsonData[$channelName]['usedAdmin'] > 0 && $schoolJsonData[$channelName]['remainingAdmin'] < $schoolJsonData[$channelName]['allocatedAdmin'])
            {
                $schoolJsonData[$channelName]['adminBrowserDetails'][$browser]['count'] =  $schoolJsonData[$channelName]['adminBrowserDetails'][$browser]['count'] - 1;
                // fetching the public ip of current browser
                $ip = "";
                if(isset($_SERVER['HTTP_CLIENT_IP']))
                {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
                elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
                else 
                {
                        $ip = $_SERVER['REMOTE_ADDR'];
                }
                $publicIpKey = array_search($ip,$schoolJsonData[$channelName]['adminBrowserDetails'][$browser]['publicIp']);
                if($publicIpKey !== false)
                {
                    //unset($schoolJsonData[$channelName]['adminBrowserDetails'][$browser]['publicIp'][$publicIpKey]);    // removing the ip if it exists on the array
                    array_splice($schoolJsonData[$channelName]['adminBrowserDetails'][$browser]['publicIp'],$publicIpKey,1);    // removing the ip if it exists on the array
                }
                $schoolJsonData[$channelName]['usedAdmin'] = $schoolJsonData[$channelName]['usedAdmin'] - 1;
                $schoolJsonData[$channelName]['remainingAdmin'] = $schoolJsonData[$channelName]['remainingAdmin'] + 1;
                $jsonUpdateData = json_encode($schoolJsonData);
                file_put_contents('jsonFiles/school.json', $jsonUpdateData);
            }
            $response['msg'] = "success";
            echo json_encode($response);
            break;
        case "-1":  // superAdmin is erasing all admin for a specific browser and a specific channel so updating that browser's(for that specific channel) related loggedOn data in our DB.
            $response['msg'] = "fail";
            $browser = $_POST['browserName'];
            $browserType = $_POST['browserType'];
            $channelName = $_POST['channel_name'];
            if($browserType == "OD")
                $combinator = ["edge"."-".$browser,"newEdge"."-".$browser,"chrome"."-".$browser,"ie"."-".$browser,"firefox"."-".$browser,"safari"."-".$browser,"other"."-".$browser];
            else
                $combinator = [$browser."-"."ios_iphone",$browser."-"."ios_other",$browser."-"."android_smartphone",$browser."-"."android_other",$browser."-"."mac_pc",$browser."-"."windows_10",$browser."-"."windows_other",$browser."-"."other"];
            $erasedOrNot = false;
            foreach($combinator as $rawKey => $processedKey)
            {
                if(isset($schoolJsonData[$channelName]['adminBrowserDetails'][$processedKey]))
                {
                    $erasedOrNot = true;
                    //i.e. superAdmin has requested to erase this key
                    $schoolJsonData[$channelName]['usedAdmin'] = $schoolJsonData[$channelName]['usedAdmin'] - $schoolJsonData[$channelName]['adminBrowserDetails'][$processedKey]['count'];
                    $schoolJsonData[$channelName]['remainingAdmin'] = $schoolJsonData[$channelName]['remainingAdmin'] + $schoolJsonData[$channelName]['adminBrowserDetails'][$processedKey]['count'];
                    $schoolJsonData[$channelName]['adminBrowserDetails'][$processedKey]['publicIp'] = array();
                    $schoolJsonData[$channelName]['adminBrowserDetails'][$processedKey]['count'] = 0;
                    //php by default gives UNIX timestamp in Seconds. I am using UNIX timestamp in miliseconds for blackListedBrowserTime. That's why multiplying the UNIX timestamp by 1000.
                    $schoolJsonData[$channelName]['blackListedBrowserTime'][$processedKey] = time()*1000;
                }
            }
            if($erasedOrNot)
            {
                $jsonUpdateData = json_encode($schoolJsonData);
                file_put_contents('jsonFiles/school.json', $jsonUpdateData);
            }
            $response['msg'] = "success";
            echo json_encode($response);
            break;
        case "0":   // real admin logged in a browser so inserting his publicIp and his browserName and count and updating usedAdmin,remainingAdmin in our database
            $response['msg'] = "fail";
            $clientBrowserName = $_POST['browserName'];
            $channelName = $_POST['channel_name'];
            if(isset($_POST['ln']))
            {
                $ln = $_POST['ln'];
                if(intval($ln) < 1 || intval($ln) > 2)
                    $ln = $schoolJsonData[$channelName]['defaultLanguage'];
            }
            $languageJsonFile = "";
            switch($ln)
            {
                case 1:
                    $data_results = file_get_contents('lang/jp.json');
                    $languageJsonFile = json_decode($data_results,true);
                    break;
                case 2:
                    $data_results = file_get_contents('lang/en.json');
                    $languageJsonFile = json_decode($data_results,true);
                    break;
            }
            $ip = "";
            if(isset($_SERVER['HTTP_CLIENT_IP']))
            {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            else 
            {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            // This checking is for backend validation during the DB update during login (checking that the space of at least one admin log in is available.) 
            // (u < a && r > 0 && browserCount < a) [u = usedAdmin, a = allocatedAdmin , r = remainingAdmin] . [before login this condition should maintain otherwise no access and no DB update]
            if($schoolJsonData[$channelName]['adminBrowserDetails'][$clientBrowserName]['count'] < $schoolJsonData[$channelName]['allocatedAdmin'] && $schoolJsonData[$channelName]['usedAdmin'] < $schoolJsonData[$channelName]['allocatedAdmin'] && $schoolJsonData[$channelName]['remainingAdmin'] > 0)
            {
                // allowing this request as admin and updating the database and giving access to admin page
                $schoolJsonData[$channelName]['adminBrowserDetails'][$clientBrowserName]['count'] = $schoolJsonData[$channelName]['adminBrowserDetails'][$clientBrowserName]['count'] + 1;
                $schoolJsonData[$channelName]['usedAdmin'] = $schoolJsonData[$channelName]['usedAdmin'] + 1;
                $schoolJsonData[$channelName]['remainingAdmin'] = $schoolJsonData[$channelName]['remainingAdmin'] -1;
                array_push($schoolJsonData[$channelName]['adminBrowserDetails'][$clientBrowserName]['publicIp'],$ip);
                $jsonUpdateData = json_encode($schoolJsonData);
                file_put_contents('jsonFiles/school.json', $jsonUpdateData);
                $response['msg'] = "success";
                $response['serial'] = $languageJsonFile["admin_Backend_alert_admin_security_alert1"]."\n".(string)$schoolJsonData[$channelName]['usedAdmin']."/".(string)$schoolJsonData[$channelName]['allocatedAdmin']. $languageJsonFile['admin_Backend_alert_admin_security_alert2'];
            }
            else
            {
                // not allowing this request as admin and NOT updating the database and will redirect to student page
                $response['msg'] = "notPermitted";
            }
            echo json_encode($response);
            break;
        case "1": // channel Creation cmd block (only super Admin can access here)
            $alreadyExists = false;
            foreach (glob('contents/*') as $channel) // backend validation for channel name duplication checking during channel creation
            {
                if (is_dir($channel)) {
                    $tmp = [];
                    // $tmp['name'] = mb_convert_encoding(pathinfo($content, PATHINFO_BASENAME), 'UTF-8', 'SJIS');
                    $tmp['name'] = pathinfo($channel, PATHINFO_BASENAME);
                    if(isset($schoolJsonData[$tmp['name']]['displayName']))
                    {
                        if($_POST['displayName'] == $schoolJsonData[$tmp['name']]['displayName'])
                        {
                            $alreadyExists = true;
                            break;
                        }
                    }
                    
                }
            }
            if(!$alreadyExists)
            {
                $channelId = uniqid(true);
                $response['msg'] = "failed";
                if(mkdir('./contents/' . $channelId, 0777,true))
                {
                    chmod( './contents/' . $channelId, 0777 );
                    if(mkdir('./contents/'. $channelId."/wastebin", 0777,true))
                    {
                        chmod( './contents/'. $channelId."/wastebin", 0777 );
                        // channel creation json block
                        channelCreate($channelId);
                        $response['msg'] = "success";
                    }
                }
            }
            else
            {
                $response['msg'] = "duplicate";
            }
            echo json_encode($response);
            break;
        case "2": // channel Edition cmd block (only super Admin can access here)
            $channelId = $_POST['channel_name'];
            $alreadyExists = false;
            foreach (glob('contents/*') as $channel)    // backend validation for channel name duplication checking during channel edition
            {
                if (is_dir($channel)) {
                    $tmp = [];
                    // $tmp['name'] = mb_convert_encoding(pathinfo($content, PATHINFO_BASENAME), 'UTF-8', 'SJIS');
                    $tmp['name'] = pathinfo($channel, PATHINFO_BASENAME);
                    if(isset($schoolJsonData[$tmp['name']]['displayName']))
                    {
                        if($_POST['displayName'] == $schoolJsonData[$tmp['name']]['displayName'] && ($_POST['channel_name'] != $tmp['name']))
                        {
                            $alreadyExists = true;
                            break;
                        }
                    }
                    
                }
            }
            if(!$alreadyExists)
            {
                $response['msg'] = "";
                $limitForAllocatedAdminAllocatedSpace = true;
                if(file_exists('./contents/' . $channelId))     // if channel exists
                {
                    if($schoolJsonData[$channelId]['usedAdmin'] >  $_POST['allocatedAdmin'])
                    {
                        $limitForAllocatedAdminAllocatedSpace = false;
                        $response['msg'] = "limitForAA";
                        $response['usedAdmin'] = $schoolJsonData[$channelId]['usedAdmin'];
                    }
                    if($schoolJsonData[$channelId]['usedSpace'] >  $_POST['allocatedSpace'] * 1073741824)   // converting requested allocatedSpace(is in GB) to Bytes
                    {
                        $limitForAllocatedAdminAllocatedSpace = false;
                        $response['msg'] = $response['msg']."limitForAS";
                        $tmp = $schoolJsonData[$channelId]['allocatedSpace']/(float)1073741824; 
                        $fraction = intval($tmp*1000)/1000; 
                        $response['usedSpace'] =  ($tmp - floor($tmp) == 0)?ceil($tmp):$fraction;   // converting the usedSpace into GB
                    }
                    if($limitForAllocatedAdminAllocatedSpace)
                    {
                        // channel edition json block
                        channelEdit($channelId);
                        $response['msg'] = "success";
                    }
                }
                else
                    $response['msg'] = "fail";
            }
            else
            {
                $response['msg'] = "duplicate";
            }
            echo json_encode($response);
            break;
        case "3": // channel disable json block
            
            if(isset($schoolJsonData[$_POST['channel_name']]['active']))
            {
                $schoolJsonData[$_POST['channel_name']]['active'] = 0;
                $jsonUpdateData = json_encode($schoolJsonData);
                file_put_contents('jsonFiles/school.json', $jsonUpdateData);
                $response['msg'] = "success";
            }
            else
                $response['msg'] = "fail";
            echo json_encode($response);
            break;
        case "4": // channel enable json block
        
            if(isset($schoolJsonData[$_POST['channel_name']]['active']))
            {
                $schoolJsonData[$_POST['channel_name']]['active'] = 1;
                $jsonUpdateData = json_encode($schoolJsonData);
                file_put_contents('jsonFiles/school.json', $jsonUpdateData);
                $response['msg'] = "success";
            }
            else
                $response['msg'] = "fail";
            echo json_encode($response);
            break;

    }

    // channel creation json logic
    function channelCreate($channelId)
    {
        global $schoolJsonData;
        $createTime = date("Y-m-d H:i:s");
        $protocol = "";
        if (isset($_SERVER['HTTPS'])) 
        {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } 
        else 
        {
            $protocol = 'http';
        }
        /* data regarding admin confinement for this channel */
        $allocatedAdmin = $_POST['allocatedAdmin'];
        $adminBrowserDetailsForEachType = ["publicIp"=>array(),"count"=>0];
        $adminBrowserDetails = [];
        $browsersList = ["edge","newEdge","chrome","ie","firefox","safari","other"];
        $odList = ["ios_iphone","ios_other","android_smartphone","android_other","mac_pc","windows_10","windows_other","other"];
        for($i = 0;$i < 7;$i++)
        {
            for($j = 0 ; $j < 8 ; $j++)
            {
                $key = $browsersList[$i]."-".$odList[$j];
                $adminBrowserDetails[$key] = $adminBrowserDetailsForEachType;
            }
        }
        /* data regarding admin confinement for this channel */
        $allocateSpaceInKB = $_POST['allocatedSpace'] * 1073741824;   // 1GB = 1073741824 Bytes
        $permittedFileTypes = [];
        foreach($_POST["permittedFileTypes"] as $key=>$value)
        {
            $catch = json_decode($value);
            if(is_array($catch))
            {
                foreach($catch as $nk=>$nv)
                {
                    $permittedFileTypes[] = $nv;
                }
            }
            else
            {
                $permittedFileTypes[] = $value;
            }
        }
        $insert = array($channelId=>array(
            "creationDate"=>$createTime,
            "modifyDate"=> $createTime,
            "fileCount" => 0,
            "folderCount"=>0,
            "displayName" => $_POST['displayName'],
            // 'adminPageLink' => $adminPageLink,
            // 'userPageLink' => $userPageLink,
            "allocatedAdmin" => $allocatedAdmin,
            "usedAdmin" => 0,
            "remainingAdmin" => $allocatedAdmin,
            "blackListedBrowserTime" => [],
            "adminBrowserDetails" => $adminBrowserDetails,
            "permittedFileTypes" => $permittedFileTypes,
            'downloadAbleOrNot' => $_POST['downloadAbleOrNot'],
            'adminName' => $_POST['adminName'],
            'adminEmailId' => $_POST['adminEmailId'],
            'adminContactNumber' => $_POST['adminContactNumber'],
            "allocatedSpace" => $allocateSpaceInKB,
            "usedSpace" => 0,
            "remainingSpace" => $allocateSpaceInKB,
            "defaultLanguage" => $_POST['defaultLanguage'],
            "active" => 1
        ));

        //append created object to school.json
        if(is_array($schoolJsonData))
            $schoolJsonData = $schoolJsonData + $insert ;
        else
            $schoolJsonData = $insert;
        $jsonAppendData = json_encode($schoolJsonData);
        file_put_contents('jsonFiles/school.json', $jsonAppendData);
    }
    // channel edition json logic
    function channelEdit($channelId)
    {
        global $schoolJsonData;
        $allocateSpaceInKB = $_POST['allocatedSpace'] * 1073741824;   // 1GB = 1073741824‬ Bytes
        $permittedFileTypes = [];
        foreach($_POST["permittedFileTypes"] as $key=>$value)
        {
            $catch = json_decode($value);
            if(is_array($catch))
            {
                foreach($catch as $nk=>$nv)
                {
                    $permittedFileTypes[] = $nv;
                }
            }
            else
            {
                $permittedFileTypes[] = $value;
            }
        }
        $schoolJsonData[$channelId]['modifyDate'] = date("Y-m-d H:i:s");
        $schoolJsonData[$channelId]['displayName'] = $_POST['displayName'];
        $schoolJsonData[$channelId]['allocatedAdmin'] = $_POST['allocatedAdmin'] * 1;
        $schoolJsonData[$channelId]['remainingAdmin'] = $_POST['allocatedAdmin'] - $schoolJsonData[$channelId]['usedAdmin'];
        $schoolJsonData[$channelId]['allocatedSpace'] = $allocateSpaceInKB;
        $schoolJsonData[$channelId]['remainingSpace'] = $allocateSpaceInKB - $schoolJsonData[$channelId]['usedSpace'];
        $schoolJsonData[$channelId]['permittedFileTypes'] = $permittedFileTypes;
        $schoolJsonData[$channelId]['downloadAbleOrNot'] = $_POST['downloadAbleOrNot'];
        $schoolJsonData[$channelId]['adminName'] = $_POST['adminName'];
        $schoolJsonData[$channelId]['adminEmailId'] = $_POST['adminEmailId'];
        $schoolJsonData[$channelId]['adminContactNumber'] = $_POST['adminContactNumber'];
        $schoolJsonData[$channelId]['defaultLanguage'] = $_POST['defaultLanguage'];
        $schoolJsonData[$channelId]['active'] = intval($_POST['activeOrNot']);
        $jsonAppendData = json_encode($schoolJsonData);
        file_put_contents('jsonFiles/school.json', $jsonAppendData);
    }    
?>