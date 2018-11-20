<?php 

/*
      invoke in agent
*/

define("GIT", "/usr/bin/git");
define("DIR", "/home/c/ca23438/main_dev/public_html");
define("BRANCH", "master");
$result = "";
include('Git.php');

$name = shell_exec(GIT . " config user.name 'EXAMPLE HOSTING'");
//echo $name."\n";
$email = shell_exec(GIT . " config user.email 'dev@clientlab.ru'");
//echo $email."\n";

//chdir(DIR);
$repo = Git::open(DIR);  // -or- Git::create('/path/to/repo')

$status = shell_exec(GIT . " status");

$repo->add('.');
$repo->commit('HOSTING changes'.print_r($status,1));
$repo->push('origin', BRANCH);
//echo "commited";

?>