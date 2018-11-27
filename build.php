<?php
if(file_exists("SuprDiscordBot.zip"))
	unlink("SuprDiscordBot.zip");
$zip=new ZipArchive();
$zip->open("SuprDiscordBot.zip",ZipArchive::CREATE+ZipArchive::EXCL+ZipArchive::CHECKCONS)||die("Failed to create zipfile\n");
foreach(scandir("target")as$f)
{
	$p="target/$f";
	if(is_file($p))
		$zip->addFile($p,"SuprDiscordBot.jar");
}
foreach(["LICENSE","readme.url","start.bat","start.sh"]as$f)
	$zip->addFile($f,$f);
foreach(["scripts","scripts/disabled"]as$d)
	foreach(scandir($d)as$f)
	{
		$p="$d/$f";
		if(is_file($p))
			$zip->addFile($p,$p);
	}
$zip->close();
