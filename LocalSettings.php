<?php
# This file was automatically generated by the MediaWiki 1.23.5
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
    exit;
}

# Source the secrets settings file
# If environment variables are set we will use a secrets file that
# will pick them up. If not then you are responsible for creating
# this file. there is a secrets.php-dist file for your convienence.
if ( getenv('SECRETS_SET') == 'YES' ) {
    require_once('../env_secrets.php');
}
else {
    require_once('../secrets.php');
}

# If a debug.php file exists then lets pull it in.
if ( file_exists('../debug.php') ) {
    require_once('../debug.php');
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "MozillaWiki";
$wgMetaNamespace = "MozillaWiki";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScript = "/index.php";
$wgArticlePath = "/$1";
$wgUsePathInfo = false;
$wgScriptPath = "";
$wgScriptExtension = ".php";

## The protocol and server name to use in fully-qualified URLs
#$wgServer           = "https://wiki.mozilla.org";
$wgServer = $SECRETS_wgServer;

## The relative URL path to the skins directory
$wgStylePath = "$wgScriptPath/skins";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
#$wgLogo = "$wgStylePath/common/images/$SECRETS_wgLogo";
$wgLogo = "$wgStylePath/../assets/logos/$SECRETS_wgLogo";

# The relative URL path to the favicon
$wgFavicon = "$wgStylePath/../assets/favicon.ico";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "infra-webops@mozilla.com";
$wgPasswordSender = "wiki@mozilla.com";
$wgAdditionalMailParams = "-f no-reply@mozilla.com"; #bug 891341

$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype     = "mysql";
$wgDBserver   = $SECRETS_wgDBserver;
$wgDBname     = $SECRETS_wgDBname;
$wgDBuser     = $SECRETS_wgDBuser;
$wgDBpassword = $SECRETS_wgDBpassword;

# MySQL specific settings
#$wgDBprefix = "wikimo_";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
# This should be initilized as an array if you need it:
#+ $wgMemCachedServers = array('192.168.1.1', '192.168.1.2');
if (!empty($SECRETS_wgMemCachedServers)) {
    $wgMainCacheType = CACHE_MEMCACHED;
    $wgUseMemCached = true;
    $wgMemCachedServers = $SECRETS_wgMemCachedServers;
    $wgSessionsInMemcached = true;
} else {
    $wgMainCacheType = CACHE_NONE;
    $wgMemCachedServers = array();
}

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## The file system path of the folder where uploaded files will be stored.
$wgUploadDirectory = "$IP/../images";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

$wgSecretKey = $SECRETS_wgSecretKey;

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = $SECRETS_wgUpgradeKey;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = "vector";
## Do not use these skins
$wgSkipSkins = array( 'cavendish', 'chick', 'standard', 'cologneblue', 'modern', 'myskin', 'nostalgia', 'sandstone', 'simple', 'gmo' );

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = -1;

###
### Only allow logged-in users to edit
###

# Bug 1051201

// Custom user group rights
// All users, including non-logged in ones
$wgGroupPermissions['*']['read']              = true;
$wgGroupPermissions['*']['edit']              = false;
$wgGroupPermissions['*']['createpage']        = false;
$wgGroupPermissions['*']['createtalk']        = false;
$wgGroupPermissions['*']['createaccount']     = true;
$wgGroupPermissions['*']['patrolmarks']       = false;
$wgGroupPermissions['*']['editmyusercss']     = false;
$wgGroupPermissions['*']['editmyuserjs']      = false;
$wgGroupPermissions['*']['editmywatchlist']   = false;
$wgGroupPermissions['*']['viewmywatchlist']   = false;
$wgGroupPermissions['*']['editmyprivateinfo'] = true;
$wgGroupPermissions['*']['viewmyprivateinfo'] = true;
$wgGroupPermissions['*']['editmyoptions']     = false;
$wgGroupPermissions['*']['writeapi']          = false;

// Logged in users
$wgGroupPermissions['user']['edit']               = true;
// createpage and create talk should be turned off if ConfirmAccount is turned off.
$wgGroupPermissions['user']['createpage']         = true;
$wgGroupPermissions['user']['createtalk']         = true;
$wgGroupPermissions['user']['move']               = false;
$wgGroupPermissions['user']['movefile']           = false;
$wgGroupPermissions['user']['move-subpages']      = false;
$wgGroupPermissions['user']['move-rootuserpages'] = false;
$wgGroupPermissions['user']['upload']             = false;
$wgGroupPermissions['user']['reupload']           = false;
$wgGroupPermissions['user']['reupload-shared']    = false;
$wgGroupPermissions['user']['patrolmarks']        = false;
$wgGroupPermissions['user']['editmyusercss']      = true;
$wgGroupPermissions['user']['editmyuserjs']       = true;
$wgGroupPermissions['user']['editmywatchlist']    = true;
$wgGroupPermissions['user']['viewmywatchlist']    = true;
$wgGroupPermissions['user']['editmyprivateinfo']  = true;
$wgGroupPermissions['user']['viewmyprivateinfo']  = true;
$wgGroupPermissions['user']['editmyoptions']      = true;
$wgGroupPermissions['user']['purge']              = false;
$wgGroupPermissions['user']['minoredit']          = false;
$wgGroupPermissions['user']['writeapi']           = true;
$wgGroupPermissions['user']['sendemail']          = true;

// members of implicit autoconfirm group
$wgGroupPermissions['autoconfirmed']['createpage']          = true;
$wgGroupPermissions['autoconfirmed']['createtalk']          = true;
$wgGroupPermissions['autoconfirmed']['move']                = true;
$wgGroupPermissions['autoconfirmed']['movefile']            = true;
$wgGroupPermissions['autoconfirmed']['move-subpages']       = true;
$wgGroupPermissions['autoconfirmed']['move-rootuserpages']  = false;
$wgGroupPermissions['autoconfirmed']['upload']              = true;
$wgGroupPermissions['autoconfirmed']['reupload']            = true;
$wgGroupPermissions['autoconfirmed']['reupload-own']        = true;
$wgGroupPermissions['autoconfirmed']['reupload-shared']     = false;
$wgGroupPermissions['autoconfirmed']['editsemiprotected']   = false;
$wgGroupPermissions['autoconfirmed']['patrolmarks']         = true;
$wgGroupPermissions['autoconfirmed']['purge']               = true;
$wgGroupPermissions['autoconfirmed']['minoredit']           = false;
$wgGroupPermissions['autoconfirmed']['writeapi']            = true;

// members of confirm group
$wgGroupPermissions['confirm']['createpage']                = true;
$wgGroupPermissions['confirm']['createtalk']                = true;
$wgGroupPermissions['confirm']['move']                      = true;
$wgGroupPermissions['confirm']['movefile']                  = true;
$wgGroupPermissions['confirm']['move-subpages']             = true;
$wgGroupPermissions['confirm']['move-rootuserpages']        = true;
$wgGroupPermissions['confirm']['upload']                    = true;
$wgGroupPermissions['confirm']['reupload']                  = true;
$wgGroupPermissions['confirm']['reupload-own']              = true;
$wgGroupPermissions['confirm']['reupload-shared']           = true;
$wgGroupPermissions['confirm']['editsemiprotected']         = true;
$wgGroupPermissions['confirm']['patrolmarks']               = true;
$wgGroupPermissions['confirm']['purge']                     = true;
$wgGroupPermissions['confirm']['writeapi']                  = true;
$wgGroupPermissions['confirm']['autoconfirmed']             = true;
$wgGroupPermissions['confirm']['confirm']                   = true;
$wgGroupPermissions['confirm']['minoredit']                 = true;
$wgGroupPermissions['confirm']['import']                    = false;
$wgGroupPermissions['confirm']['deletedhistory']            = true;

// members for canmove group
$wgGroupPermissions['canmove']['canmove']                   = true;

// members of confirmaccount group
$wgGroupPermissions['accountapprovers']['confirmaccount']   = true;

// members of bureaucrat group
$wgGroupPermissions['bureaucrat']['move-rootuserpages']     = true;
$wgGroupPermissions['bureaucrat']['createaccount']          = true;
$wgGroupPermissions['bureaucrat']['bigdelete']              = false;
$wgGroupPermissions['bureaucrat']['deletedhistory']         = true;
$wgGroupPermissions['bureaucrat']['deletedtext']            = true;
$wgGroupPermissions['bureaucrat']['undelete']               = false;
$wgGroupPermissions['bureaucrat']['browsearchive']          = true;
$wgGroupPermissions['bureaucrat']['block']                  = true;
$wgGroupPermissions['bureaucrat']['blockemail']             = true;
$wgGroupPermissions['bureaucrat']['unblockself']            = false;
$wgGroupPermissions['bureaucrat']['userrights']             = false;
$wgGroupPermissions['bureaucrat']['userrights-interwiki']   = false;
$wgGroupPermissions['bureaucrat']['markbotedits']           = true;
$wgGroupPermissions['bureaucrat']['editusercss']            = true;
$wgGroupPermissions['bureaucrat']['edituserjs']             = true;
$wgGroupPermissions['bureaucrat']['viewsuppressed']         = false;
$wgGroupPermissions['bureaucrat']['unwatchedpages']         = true;
$wgGroupPermissions['bureaucrat']['nominornewtalk']         = true;
$wgGroupPermissions['bureaucrat']['noratelimit']            = true;
$wgGroupPermissions['bureaucrat']['ipblock-exempt']         = true;
$wgGroupPermissions['bureaucrat']['proxyunbannable']        = true;
$wgGroupPermissions['bureaucrat']['autopatrol']             = true;
$wgGroupPermissions['bureaucrat']['autoconfirmed']          = true;
$wgGroupPermissions['bureaucrat']['nuke']                   = false;
$wgGroupPermissions['bureaucrat']['delete']                 = false;
$wgGroupPermissions['bureaucrat']['rollback']               = false;
$wgGroupPermissions['bureaucrat']['patrol']                 = false;

// members of sysop group
$wgGroupPermissions['sysop']['createaccount']         = true;
$wgGroupPermissions['sysop']['upload_by_url']         = true;
$wgGroupPermissions['sysop']['editprotected']         = true;
$wgGroupPermissions['sysop']['bigdelete']             = true;
$wgGroupPermissions['sysop']['undelete']              = true;
$wgGroupPermissions['sysop']['protect']               = true;
$wgGroupPermissions['sysop']['unblockself']           = true;
$wgGroupPermissions['sysop']['userrights-interwiki']  = true;
$wgGroupPermissions['sysop']['editinterface']         = true;
$wgGroupPermissions['sysop']['suppressrevision']      = false;
$wgGroupPermissions['sysop']['viewsuppressed']        = false;
$wgGroupPermissions['sysop']['deletelogentry']        = false;
$wgGroupPermissions['sysop']['deleterevision']        = true;
$wgGroupPermissions['sysop']['deletedhistory']        = true;
$wgGroupPermissions['sysop']['deletedtext']           = true;
$wgGroupPermissions['sysop']['importupload']          = true;
$wgGroupPermissions['sysop']['import']                = true;
$wgGroupPermissions['sysop']['apihighlimits']         = true;
$wgGroupPermissions['sysop']['suppressredirect']      = true;
$wgGroupPermissions['sysop']['interwiki']             = true;

// members of Mozilla Wiki team
$wgGroupPermissions['team']['autoconfirmed']  = true;
$wgGroupPermissions['team']['team']           = true;
$wgGroupPermissions['team']['confirmaccount'] = true;

// Mozilla Wiki module owner and peers
$wgGroupPermissions['module']['autoconfirmed']    = true;
$wgGroupPermissions['module']['module']           = true;
$wgGroupPermissions['module']['deletelogentry']   = true;
$wgGroupPermissions['module']['suppressrevision'] = true;
$wgGroupPermissions['module']['hideuser']         = true;
$wgGroupPermissions['module']['suppressionlog']   = true;
$wgGroupPermissions['module']['viewsuppressed']   = true;
$wgGroupPermissions['module']['userrights']       = true;

// Anti-spam group
$wgGroupPermissions['antispam']['delete']           = true;
$wgGroupPermissions['antispam']['block']            = true;
$wgGroupPermissions['antispam']['blockemail']       = true;
$wgGroupPermissions['antispam']['nuke']             = true;
$wgGroupPermissions['antispam']['rollback']         = true;
$wgGroupPermissions['antispam']['patrol']           = true;
$wgGroupPermissions['antispam']['ipblock-exempt']   = true;
$wgGroupPermissions['antispam']['noratelimit']      = true;
$wgGroupPermissions['antispam']['proxyunbannable']  = true;

// Emeriti group. purely symbolic to recognize those who were
// sysops and bureaucrats before the great reset of 2014
$wgGroupPermissions['emeritus']['emeritus']         = true;

// Now let's set which groups can add users to groups
// Note that groups which may only grant some rights (like bureaucrats in this example) need to have the userrights privilege set to false, otherwise they will still be able to add all groups (except in 1.11).
// allow every group to add/remove all levels "below" them
$wgAddGroups['bureaucrat'] = array( 'confirm', 'bot', );
$wgRemoveGroups['bureaucrat'] = array( 'confirm', 'bot' );
$wgAddGroups['sysop'] = array( 'confirm', 'bot', 'bureaucrat' );
$wgRemoveGroups['sysop'] = array( 'confirm', 'bot', 'bureaucrat' );
$wgAddGroups['team'] = array( 'confirm', 'bot', 'bureaucrat', 'sysop' );
$wgRemoveGroups['team'] = array( 'confirm', 'bot', 'bureaucrat', 'sysop' );
// Note: We don't need module group here because that group has userrights = true

// Let's update $wgRestrictionLevels while we're at it
// DEFAULT: array( '', 'autoconfirmed', 'sysop' )
$wgRestrictionLevels[] = 'team';
$wgRestrictionLevels[] = 'module';
$wgRestrictionLevels[] = 'confirm';

//Site customization: $wgSemiprotectedRestrictionLevels
//DEFAULT is array( 'autoconfirmed' )
$wgSemiprotectedRestrictionLevels[] = 'confirm';

// FOR DEPLOYMENT ONLY, We need to override some settings so user group adjustments can be made
// REMOVE these lines after appropriate users have been added to team and module groups
//$wgGroupPermissions['sysop']['userrights'] = true;
// END FOR DEPLOYMENT ONLY


$wgEmailConfirmToEdit = true;

###
### Extra moz namespaces
###

$wgExtraNamespaces =
    array(
        100 => "Mozilla2",
        101 => "Mozilla2_Talk",
        102 => "Calendar",
        103 => "Calendar_Talk",
        104 => "DocShell",
        105 => "DocShell_Talk",
        106 => "Gecko",
        107 => "Gecko_Talk",
        108 => "PluginFutures",
        109 => "PluginFutures_Talk",
        110 => "SVG",
        111 => "SVG_Talk",
        112 => "XUL",
        113 => "XUL_Talk",
        114 => "L10n",
        115 => "L10n_Talk",
        116 => "Update",
        117 => "Update_Talk",
        118 => "SVGDev",
        119 => "SVGDev_Talk",
        120 => "Specifications",
        121 => "Specifications_Talk",
        122 => "Bugzilla",
        123 => "Bugzilla_Talk",
        124 => "DOM",
        125 => "DOM_Talk",
        126 => "Tinderbox",
        127 => "Tinderbox_Talk",
        128 => "MailNews",
        129 => "MailNews_Talk",
        130 => "Minimo",
        131 => "Minimo_Talk"
        # 132 - 141 - Semantic MediaWiki extension
    );

$wgNamespacesToBeSearchedDefault = array(
    -1 => 0, 1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 10 => 0,
    0 => 1, 9 => 1, 11 => 1,
    100 => 1, 101 => 1,
    102 => 1, 103 => 1,
    104 => 1, 105 => 1,
    106 => 1, 107 => 1,
    108 => 1, 109 => 1,
    110 => 1, 111 => 1,
    112 => 1, 113 => 1,
    114 => 1, 115 => 1,
    116 => 1, 117 => 1,
    118 => 1, 119 => 1,
    120 => 1, 121 => 1,
    122 => 1, 123 => 1,
    124 => 1, 125 => 1,
    126 => 1, 127 => 1,
    128 => 1, 129 => 1,
    130 => 1, 131 => 1,
);

# Enable subpages in all namespaces
$wgNamespacesWithSubpages = array_fill(0, 200, true);

# This require pulls in all extensions (including dependancies) that have been installed with composer
require_once("$IP/../vendor/autoload.php");

require_once("$IP/../extensions/SpamBlacklist/SpamBlacklist.php");
$wgSpamBlacklistFiles = array(
//          database    title
        "DB: $wgDBname Spam_blacklist",
);

require_once("$IP/../extensions/SyntaxHighlighter/SyntaxHighlighter.php");

require_once("$IP/../extensions/WikiEditor/WikiEditor.php");
# Enables use of WikiEditor by default but still allow users to disable it in preferences
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;
# Displays the Preview and Changes tabs
$wgDefaultUserOptions['wikieditor-preview'] = 1;
// Make default the user option to prompt for an edit summary if none is provided
// does not affect users who have already set this option
// bug 1080898
$wgDefaultUserOptions['forceeditsummary'] = true;

#require_once("$IP/../extensions/Urchin/Urchin.php");
require_once("$IP/../extensions/LabeledSectionTransclusion/lst.php");
require_once("$IP/../extensions/LabeledSectionTransclusion/lsth.php");
require_once("$IP/../extensions/Renameuser/SpecialRenameuser.php");
require_once("$IP/../extensions/ParserFunctions/ParserFunctions.php");
require_once("$IP/../extensions/ImageMap/ImageMap.php");

$wgFFmpegLocation = '/usr/bin/ffmpeg';
require("$IP/../extensions/OggHandler/OggHandler.php");

$smwgNamespaceIndex = 132;
$smwgQMaxSize = 40;
$smwgQMaxDepth = 20;

enableSemantics('wiki-dev.allizom.org');
$smwgEnabledEditPageHelp = false;
include_once("$IP/../extensions/SemanticForms/SemanticForms.php");
##
# ask API feature will be available at api.php?action=<$wgSMWAskAPI_ActionName>
# Default it 'ask'
##
global $wgSMWAskAPI_ActionName;
$wgSMWAskAPI_ActionName = 'ask';

require_once("$IP/../extensions/SMWAskAPI/SMWAskAPI.php");

# Bug 638134
require_once("$IP/../extensions/UrlGetParameters/UrlGetParameters.php");

# Bug 674544
require_once("$IP/../extensions/NoTitle/NoTitle.php");

# Bug 677659
require_once("{$IP}/../extensions/CreateBox/CreateBox.php");

# Bug 675064
require_once("$IP/../extensions/SemanticWatchlist/SemanticWatchlist.php");

# Bug 721366 and 731672
require_once("$IP/../extensions/Bugzilla/Bugzilla.php");

# Bug 772192 & 838391
require_once("$IP/../extensions/Smartsheet-MediaWiki-Extension/SmartsheetIframe.php");

require_once("$IP/../extensions/Nuke/Nuke.php");

require_once("$IP/../extensions/ConfirmEdit/ConfirmEdit.php");
$wgCaptchaTriggers['edit']          = false;
$wgCaptchaTriggers['create']        = false;
$wgCaptchaTriggers['addurl']        = false;
$wgCaptchaTriggers['createaccount'] = true;
$wgCaptchaTriggers['badlogin']      = true;
require_once("$IP/../extensions/ConfirmEdit/ReCaptcha.php");
$wgCaptchaClass = 'ReCaptcha';
$wgReCaptchaPublicKey = $SECRETS_wgReCaptchaPublicKey;
$wgReCaptchaPrivateKey = $SECRETS_wgReCaptchaPrivateKey;

# bug 832030
require_once("$IP/../extensions/googleAnalytics/googleAnalytics.php");
$wgGoogleAnalyticsAccount = $SECRETS_wgGoogleAnalyticsAccount;

# bug 855309
require_once("$IP/../extensions/SubPageList/SubPageList.php");

$wgAllowExternalImages  = true;

######### Bug 397718 ############
$wgMimeDetectorCommand= "file -bi"; #use external mime detector (Linux)
#################################

# This should be initilized as an array if you need it:
#+ $wgSquidServers = array('192.168.1.1', '192.168.1.2');
if (!empty($SECRETS_wgSquidServers)) {
    $wgUseSquid = true;
    $wgSquidServers = $SECRETS_wgSquidServers;
}

$wgCacheDirectory = "/tmp/wikimo-cache";

$wgShowIPinHeader = false;
$wgFileExtensions   = array( 'gz', 'tar', 'png', 'gif', 'jpg', 'jpeg', 'ppt', 'pdf', 'doc', 'xls', 'zip', 'ics', 'mp3', 'ogg', 'odt', 'odp', 'svg', 'odt', 'ods', 'odg', 'webm' );

$wgAllowTitlesInSVG = true;

// Don't convert, just serve and let the browser render/save/whatever
$wgSVGConverter = 'rsvg';

$wgWhitelistRead = array( 'Main Page', 'Special:Userlogin', 'Special:Userlogout', '-', 'MediaWiki:Monobook.css', 'MediaWiki:Monobook.js' );

$wgAutoConfirmAge =  5 * 3600 * 24; // 5 days to pass isNewbie()
$wgAutoConfirmCount = 10;   // and have ten edits

$wgShowExceptionDetails = false;
$wgShowSQLErrors = false;

# use these for maintenance
#$wgReadOnly = 'Wiki.mozilla.org is undergoing maintenance until 9AM PDT, no file uploads will work until then';
#$wgSiteNotice = 'Wiki.mozilla.org is undergoing maintenance until 9AM PDT, no file uploads will work until then';
#$wgReadOnly = 'Wiki.mozilla.org is undergoing an upgrade between between 20:30-22:30 UTC (13:30-15:30 PT).  No file uploads will work until the maintenance is complete.'
#$wgSiteNotice = 'Wiki.mozilla.org is undergoing an upgrade between between 20:30-22:30 UTC (13:30-15:30 PT).  No file uploads will work until the maintenance is complete.'

$wgRCMaxAge = 31536000; // one year

require_once("$IP/../extensions/RSS/RSS.php");
$wgRSSUrlWhitelist = array( 'http://benjamin.smedbergs.us/weekly-updates.fcgi/project/firefox/feed',
                            'http://blog.wikimedia.org/feed/',
                            'https://blog.mozilla.org/feed/',
                            'https://hacks.mozilla.org/feed/',
                            'https://quality.mozilla.org/feed/',
                            'https://blog.lizardwrangler.com/feed/',
                            'https://brendaneich.com/feed/',
                          );

# bug 1008487
require_once("$IP/../extensions/ConfirmAccount/ConfirmAccount.php");
#$wgConfirmAccountRequestFormItems = array(
#    # Let users make names other than their "real name"
#    'UserName'        => array( 'enabled' => true ),
#    # Real name of user
#    'RealName'        => array( 'enabled' => true ),
#    # Biographical info
#    'Biography'       => array( 'enabled' => true, 'minWords' => 10 ),
#    # Interest checkboxes (defined in MediaWiki:requestaccount-areas)
#    'AreasOfInterest' => array( 'enabled' => false),
#    # CV/resume attachment option
#    'CV'              => array( 'enabled' => false),
#    # Additional non-public info for reviewer
#    'Notes'           => array( 'enabled' => true ),
#    # Option to place web URLs that establish the user
#    'Links'           => array( 'enabled' => true ),
#    # Terms of Service checkbox
#    'TermsOfService'  => array( 'enabled' => false),
#);
#$wgAccountRequestMinWords = 10;
$wgConfirmAccountRequestFormItems['Biography'] = array( 'enabled' => true, 'minWords' => 15 );
# Make the username of the real name?
$wgUseRealNamesOnly = false;
$wgAccountRequestToS = true;
$wgAllowAccountRequestFiles = false;
$wgAccountRequestThrottle = 50;
#$wgConfirmAccountContact = 'wikimo-admins@mozilla.org';
$wgConfirmAccountSaveInfo = false;

# Need to set this explicitly to match the value in php.ini
# Otherwise, pages w/ semanticwiki bits barf
$wgMemoryLimit = "256M";

# Controls the title displayed by subpages
$wgRestrictDisplayTitle = false;

// Implicitly add all users to 'inactive' group whose accounts:
//  * are older than 6 months, and
//  * have less than 1 edit.
// don't wipe out existing autopromote autoconfirm
$wgAutopromote['inactive'] = array( '&',
    array( APCOND_AGE, 60 * 60 * 24 * 30 * 6 ),
    array( '!', array( APCOND_EDITCOUNT, 1 ) ),
);

// TRUE in this case revokes the permission.
$wgRevokePermissions['inactive']['createpage']    = true;
$wgRevokePermissions['inactive']['createtalk']    = true;
$wgRevokePermissions['inactive']['move']          = true;
$wgRevokePermissions['inactive']['movefile']      = true;
$wgRevokePermissions['inactive']['move-subpages'] = true;
$wgRevokePermissions['inactive']['upload']        = true;
$wgRevokePermissions['inactive']['reupload']      = true;
$wgRevokePermissions['inactive']['reupload-own']  = true;

// Bug 1065007
require_once("$IP/../extensions/Gadgets/Gadgets.php");

// Bug 1074949
require_once("$IP/../extensions/Interwiki/Interwiki.php");

// Bug 1077182
require_once("$IP/../extensions/Sandstone/Sandstone.php");

// Bug 1082298
$wgPFEnableStringFunctions = true;

require_once("$IP/../extensions/Widgets/Widgets.php");

require_once "$IP/../extensions/TitleBlacklist/TitleBlacklist.php";
// EOF
