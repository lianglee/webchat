<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
//setting up path so we can use it in entire file 
//if your component folder have upper and lower case characters please use same here.
define('__WEB_CHAT__', ossn_route()->com . 'WebChat/');

//this function is used to initilize webchat
function web_chat() {
   ossn_register_page('webchat', 'webchat_template_page');
   ossn_register_page('chat_api', 'chat_api');
   if(ossn_isLoggedin()) {
		$icon          = ossn_site_url('components/OssnMessages/images/messages.png');
		ossn_register_sections_menu('newsfeed', array(
				'name' => 'webchat',
				'text' => ossn_print('com:webchat:menu'),
				'url' => ossn_site_url('webchat'),
				'parent' => 'links',
				'icon' => $icon
		));
	}
}
function webchat_template_page(){
    	$content = ossn_plugin_view('webchat/webchat_page');
		$title = 'Chat';
    	echo ossn_view_page($title, $content, 'webchat_page_template');	
}
function chat_api(){
    	$content = ossn_plugin_view('webchat/chat_api');
		$title = 'Chat_API';
    	echo ossn_view_page($title, $content, 'chat_api_template');	
}

ossn_register_callback('ossn', 'init', 'web_chat');

