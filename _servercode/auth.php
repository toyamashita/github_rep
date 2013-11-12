<?php

	$bookListFileName;
	$errorBookListFileName = "booklistsampleerror.xml";
	$userListFileName = "userlist.txt";
	
	$user = isset($_POST['user']) ? trim($_POST['user']) : '';
	$password = isset($_POST['password']) ? trim($_POST['password']) : '';

	$isAuthenticate = false;
	
	
	$fp = fopen($userListFileName, 'r');
	if ($fp){
		if (flock($fp, LOCK_SH)){
			while (!feof($fp)) {
				$line = fgets($fp);				
				$tabpos = strpos($line, "\t");
				
				if($tabpos !== false){
					$data = explode("\t", $line);
								
					
					/*print(trim($data[0]));
					print(trim($data[1]));
					print(":");*/
					
					if($user === trim($data[0]) && $password === trim($data[1])){
						$isAuthenticate = true;
						$bookListFileName = trim($data[2]);
						break;
					}
				}
			}
			flock($fp, LOCK_UN);
		}else{
			print('ファイルロックに失敗しました');
		}
	}
	
	/*print($isAuthenticate);*/
	
	if($isAuthenticate){
		print(mb_convert_encoding(file_get_contents($bookListFileName), 'UTF-8', 'auto'));		
	}else{
		print(mb_convert_encoding(file_get_contents($errorBookListFileName), 'UTF-8', 'auto'));		
	}

?>

