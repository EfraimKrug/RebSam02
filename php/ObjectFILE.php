<?php
#error_reporting(E_ALL);
######################################################
## File Object
## Directory Object
######################################################
include 'ObjectSTRING.php';
######################################################
## FileObject Object
## ----------------
##	$fO = new FileObject($fname = "ObjectFILE.php", $mode = "r")
##	@param1: $fname - file to work with
##  @param2: $mode - read/write/append
######################################################

interface FileInterface
{
	public function openFile();
	public function readLine();
	public function setFileName();
	public function getFileName();
}

class FileObject implements FileInterface
{
		var $FileName = "";
		var $FileHandle;

	 function FileObject($fname = "ObjectFILE.php", $mode = "r")
	{
		$this->FileName = $fname;		
	}

################################################
# rewindFile() - starts from beginning		#
#	@effects: $this->FileHandle
################################################
function rewindFile(){
	rewind($this->FileHandle);
}

################################################
# testExistance($fname)						#
#	tries to open the file "r" 				#
#	@effect: NONE
################################################
function testExistance($fname){
	$FileHandle = fopen($fname, "r");
	return $FileHandle;
	}
	

################################################
# openFile($mode)							#
#	@effect: opens the file for mode...		#
#		(default - read)					#
#	@require: FileHandle must be set		#
################################################
function openFile($mode = "r"){
	if($mode == "w"){
		$this->FileHandle = fopen($this->FileName, "w") or exit("WHAT? You have GOT to be kidding!");
		}
	elseif ($mode == "a"){
		$this->FileHandle = fopen($this->FileName, "a") or exit("WHAT? You have GOT to be kidding!");
		}	
	else {
		$this->FileHandle = fopen($this->FileName, "r") or exit("WHAT? You have GOT to be kidding!");
		}
	return $this->FileHandle;
	}


################################################
# closeFile()								#
#	@effect: closes file					#
#   @require: $this->FileHandle must be set #
################################################
function closeFile(){
	fclose($this->FileHandle);
	$this->FileHandle = 0;
	}
	

################################################
# readLine()								#
#	@effect: reads file line by line		#
#	@effect: moves position of FileHandle	#
################################################
function readLine(){
	if(!feof($this->FileHandle)){
		return fgets($this->FileHandle);
		}
	else {
		return False;
		}
	}

################################################
# writeLine($line)							#
#	@effect: writes to file					#
################################################
function writeLine($line = ""){
	return fwrite($this->FileHandle, $line);
	}
	

################################################
# get/set $this->FilleName					#
#	@effect: as expected					#
################################################
function setFileName($file = "PHPObject.php"){
	$this->FileName = $file;
	}

function getFileName(){
	return $this->FileName;
	}

################################################
# printFunction									#
# 	Specifically for printing functions from	#
#	a .php file									#
#	@effect: moves FilePointer					#
#	@effect: print function						#
#	@param function name to print				#
################################################
function printFunction($functionName){
	$sO = new StringObject;
	$this->rewindFile();
	
	$fName = "\/\/" . $functionName;
	$printSwitch = 0;
	echo "<table>";
	while ($line = $this->readLine()){
		$sO->setString($line);
		if($sO->match("/\/\//")){
			$printSwitch = 0;
			}
		if($sO->match("/^" . $fName . "/")){
			$printSwitch = 1;
			}
		if($printSwitch > 0){
			echo "<TR><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><TD><font color=green>" . $line . "</font></TD></TR>";
			}
		}
	echo "</table>";
	}
//FileObject End Class
}



################################################
# test2()									#
# 	test harness...							#
################################################
function test2(){
	echo "<br>================================================";
	echo "<br>== F I L E   -   O B J E C T    -     T E S T ==";
	echo "<br>================================================";
	$fO = new FileObject;
	if(@$fO->testExistance("MYFILE.txt")){
		echo "MYFILE.txt EXISTS!!";
		}
	else {
		echo "<br>Maybe it doesn't exist so much...";
		}
	}
################################################
# fileObjectTest()							#
# 	test harness...							#
################################################

function fileObjectTest(){
	echo "<br>================================================";
	echo "<br>== F I L E   -   O B J E C T    -     T E S T ==";
	echo "<br>================================================";
	echo "<pre>";
	printFunction("FileObject");
	$fO = new FileObject;
	$sO = new StringObject;
	$targetList = array("<br>" => "{BR}");
	printFunction("openFile");
	printFunction("readLine");
	printFunction("closeFile");
	while($line = $fO->readLine()){
		$sO->setString($line);
		$line = $sO->replaceTargetList($targetList);
		echo "<br>" . $line;
		}
	$fO->closeFile();
	echo "</pre>";
	}
	
######################################################
## Directory Object
## ----------------
##	$fO = new DirectoryObject($dname)
## 	carries 3 directories - called 'current', 'target', 'root'
## 	
##	@param1: $dname - determines where to get the 
##				directory names... "current" grabs the 
##				directory the running program is running in
######################################################
interface DirectoryInterface
{
	public function openDirectory();
	public function setRootDirectory($dir);
	public function getRootDirectory();
	public function setCurrentDirectory($dir);
	public function getCurrentDirectory();
	public function setTargetDirectory($dir);
	public function getTargetDirectory();

	public function setRootDirectoryName($dirName);
	public function getRootDirectoryName();
	public function setCurrentDirectoryName($dirName);
	public function getCurrentDirectoryName();
	public function setTargetDirectoryName($dirName);
	public function getTargetDirectoryName();

	public function printDirectoryObject();
	public function listDirectory($dir);
}

//DirectoryObject Class
class DirectoryObject implements DirectoryInterface
{
		var $RootDirectoryName = "";
		var $RootDirectory = "";
		var $CurrentDirectoryName = "";
		var $CurrentDirectory = "";
		var $TargetDirectoryName = "";
		var $TargetDirectory = "";
		
		var $DirectoryHandle;

	 function DirectoryObject($dname = "current")
	{
		$this->RootDirectoryName = $dname;
		$this->CurrentDirectoryName = $dname;
		if($dname == "current"){
			chroot("c:/");
			$this->RootDirectoryName = dirname(__FILE__);
			$this->CurrentDirectoryName = dirname(__FILE__);
			}
	}

	function getRealCurrentDirectoryName(){
		return dirname(__FILE__);
		}

	function getRootDirectory(){
		return $this->RootDirectory;
		}
	function getCurrentDirectory(){
		return $this->CurrentDirectory;
		}
	function getTargetDirectory(){
		return $this->TargetDirectory;
		}
	function setTargetDirectory($dir){
		$this->TargetDirectory = $dir;
		}
	function setRootDirectory($dir){
		$this->RootDirectory = $dir;
		}
	function setCurrentDirectory($dir){
		$this->CurrentDirectory = $dir;
		}

	function getRootDirectoryName(){
		return $this->RootDirectoryName;
		}
	function getCurrentDirectoryName(){
		return $this->CurrentDirectoryName;
		}
	function setRootDirectoryName($dirName){
		$this->RootDirectoryName = $dirName;
		}
	function setCurrentDirectoryName($dirName){
		$this->CurrentDirectoryName = $dirName;
		}
	function getTargetDirectoryName(){
		return $this->TargetDirectoryName;
		}
	function setTargetDirectoryName($dirName){
		$this->TargetDirectoryName = $dirName;
		}

################################################
# openDirectory()							   #
# opens whatever name is loaded in CurrentName #
################################################

function openDirectory(){
	$this->CurrentDirectory = opendir($this->CurrentDirectoryName);
}

################################################
# isDirectory()							     #
# checks if current directory is a directory #
################################################
function isDirectory($dir){
	if($dir == "current"){
		chdir($this->CurrentDirectoryName);
		if(@is_dir($this->CurrentDirectoryName)){
			return true;
			}
		return false;
		}
	if($dir == "target"){
		chdir($this->TargetDirectoryName);
		if(@is_dir($this->TargetDirectoryName)){
			return true;
			}
		return false;
		}

}

#################################################
# listDirectory()							   	#
# prints directory listing						#
# @param $dirID - indicates which directory		#
#################################################

function listDirectory($dirID){
	if($dirID == "current"){
		$dir = $this->CurrentDirectory;
	} else if($dirID == "target"){
		$this->TargetDirectory = opendir($this->TargetDirectoryName);
		$dir = $this->TargetDirectory;
	} else if ($dirID == "root"){
		$this->RootDirectory = opendir($this->RootDirectoryName);
		$dir = $this->RootDirectory;
	}
	$count = 1;
		 while (($element=readdir($dir))!= false) {
				if(is_dir($element)){
					echo "<br>[$count] DIRECTORY: {" . $element . "}";
					}
				else {
					echo "<br>[$count] " . $this->CurrentDirectoryName . "/" . $element;
				}
			$count++;
			}
	if($dirID == "target"){
		closeDir($this->TargetDirectory);
	} else if ($dirID == "root"){
		closeDir($this->RootDirectory);
	}
}

#################################################
# printDirectoryObject()					   	#
# prints directory object - debugging			#
#################################################

function printDirectoryObject(){
	echo "<br>Printing Directory Object<br>";
	echo  "<br>Root: " . $this->RootDirectoryName;
	echo  "<br>Current: " . $this->CurrentDirectoryName;
	echo  "<br>Target: " . $this->TargetDirectoryName;
	}

#################################################
# createDirectory()							   	#
# creates new directory inside of target		#
#################################################

function createDirectory($NewDirectory){
	$dir = $this->getTargetDirectoryName() . "/" . $NewDirectory;
	if(!@mkdir($dir)){
		$this->listDirectory("target");
		die ("<br>Can not make directory: $dir");
		}
	}			
}		// end object
	
#################################################
# directoryObjectTest()					   	#
# test harness								#
#################################################

function directoryObjectTest(){
	$dO = new DirectoryObject("c:/wamp/www");
	$dO->printDirectoryObject();
	$dO->openDirectory();
	$dO->printDirectoryObject();
	$dO->listDirectory("current");
	$dO->buildSiteStructure("defaultSite2");
	#$dO->printDirectoryObject();
	
}
// begin 
//fileObjectTest();
//test2();
//directoryObjectTest();
?>