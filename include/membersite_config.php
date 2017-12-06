<?PHP
require_once("./include/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('user11.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('user11@user11.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time

    //$username = "u24950p19155_1pagex";
    //$password = "12345";

    //$username = "u24950p19155";
    //$password = "BINDrrGC";
    //$dbname = "u24950p19155_melody";
    
$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'',
                      /*database name*/'melody',
                      /*table name*/'users');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>