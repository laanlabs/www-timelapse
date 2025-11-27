<?php
/*
Plugin Name: Quick Page/Post Redirect
Plugin URI: http://fischercreativemedia.com/wordpress-plugins/quick-pagepost-redirct-plugin/
Description: Redirect Pages or Posts to another location quickly. Adds a redirect box to the page or post edit page where you can specify the redirect Location and type. Location can be to another WordPress page/post or an external URL. UPDATE: Page or post NO LONGER needs to be published for this to work correctly - however you do need to publish it and then save it as a draft so WordPress creates the proper meta for it.
Author: Don Fischer
Author URI: http://www.fischercreativemedia.com/
Version: 1.7

Version info:
1.7 - Small fix to correct the Meta Redirect - moved "exit" command to end of "addmetatohead_theme" function. And also fix Page redirect. (9/8/2009)
1.6.1 - Small fix to correct the same problem as 1.6 for Category and Archive pages (9/1/2009) 
1.6 - Fix wrongful redirect when the first blog post on home page (main blog page) has a redirect set up - this was redirecting the 
	  entire page incorrectly. (9/1/2009)
1.5 - Re-Write plugin core function to hook WP at a later time to take advantage of the POST function - no sense re-creating the wheel. 
	  Can have page/post as draft and still redirect - but ONLY after the post/page has first been published and 
	  then re-saved as draft (this will hopefully be a fix for a later version). (8/31/2009)
1.4 - Add exit after header redirect function - needed on some servers and browsers. (8/19/2009)
1.3 - Add Meta Re-fresh option (7/26/2009)
1.2 - Add easy Post/Page Edit Box (7/25/2009)
1.1 - Fix redirect for off site links (7/7/2009)
1.0 - Plugin Release (7/1/2009)

    Copyright (C) 2009 Donald J. Fischer

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Actions
//----------
	add_action('admin_menu', 'add_edit_box_ppr');
	add_action('save_post', 'ppr_save_postdata', 1, 2); // save the custom fields
	add_action('wp','ppr_do_redirect', 1, 2);
	
// Variables
//----------
	global $wpdb;
	global $wp_query;
	
// Functions
//----------
	function addmetatohead_theme(){
		global $ppr_url;
		$meta_code = '<meta http-equiv="refresh" content="0; URL='.$ppr_url.'" />';
		echo $meta_code;
		exit;//stop loading page so meta can do it's job without rest of page loading.
	}

	function ppr_do_redirect(){
		global $post,$wp_query,$ppr_url,$ppr_active,$ppr_url,$ppr_type;
		if($wp_query->is_single || $wp_query->is_page ):
			$thisidis_current= $post->ID;
			$ppr_active=get_post_meta($thisidis_current,'pprredirect_active',true);
			$ppr_url=get_post_meta($thisidis_current,'pprredirect_url',true);
			$ppr_type=get_post_meta($thisidis_current,'pprredirect_type',true);
			
			if( $ppr_active==1 && $ppr_url!='' ):
				if($ppr_type===0){$ppr_type='200';}
				if($ppr_type===''){$ppr_type='302';}
					if($ppr_type=='meta'):
						//metaredirect
						add_action('wp_head', "addmetatohead_theme",1);
					elseif($ppr_url!=''):
						//check for http:// - as full url - then we can just redirect if it is //
						if( strpos($ppr_url, 'http://')=== 0 || strpos($ppr_url, 'https://')=== 0){
							$offsite=$ppr_url;
							header('Status: '.$ppr_type);
							header('Location: '.$offsite, true, $ppr_type);
							exit; //stop loading page
						}elseif(strpos($ppr_url, 'www')=== 0){ // check if they have full url but did not put http://
							$offsite='http://'.$ppr_url;
							header("Status: $ppr_type");
							header("Location: $offsite", true, $ppr_type);
							exit; //stop loading page
						}elseif(is_numeric($ppr_url)){ // page/post number
							if($ppr_postpage=='page'){ //page
								$onsite=get_bloginfo('url').'/?page_id='.$ppr_url;
								header("Status: $ppr_type");
								header("Location: $onsite", true, $ppr_type);
								exit; //stop loading page
							}else{ //post
								$onsite=get_bloginfo('url').'/?p='.$ppr_url;
								header("Status: $ppr_type");
								header("Location: $onsite", true, $ppr_type);
								exit; //stop loading page
							}
						//check permalink or local page redirect
						}else{	// we assume they are using the permalink / page name??
							$onsite=get_bloginfo('url'). $ppr_url;
							header("Location: $onsite", true, $ppr_type);
							exit; //stop loading page
						}
						
					endif;
			endif;
		endif;
	}
	
//=======================================
// Add options to post/page edit pages
//=======================================
	// Adds a custom section to the Post and Page edit screens
	function add_edit_box_ppr() {
		if( function_exists( 'add_meta_box' )) {
			add_meta_box( 'edit-box-ppr', __( 'Quick Page/Post Redirect', 'sp' ), 'edit_box_ppr_1', 'page', 'normal', 'high' ); //for page
			add_meta_box( 'edit-box-ppr', __( 'Quick Page/Post Redirect', 'sp' ), 'edit_box_ppr_1', 'post', 'normal', 'high' ); //for post
		}
	}

	// Prints the inner fields for the custom post/page section 
	function edit_box_ppr_1() {
		global $post;
		$ppr_option1='';
		$ppr_option2='';
		$ppr_option3='';
		$ppr_option4='';
		$ppr_option5='';
		// Use nonce for verification ... ONLY USE ONCE!
		echo '<input type="hidden" name="pprredirect_noncename" id="pprredirect_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
		// The actual fields for data entry
		if(get_post_meta($post->ID, 'pprredirect_active', true)!=''){$pprediractive="checked";}else{$pprediractive="";}
		echo '<input type="checkbox" name="pprredirect_active" value="1" '.$pprediractive.' /> ';
		echo '<label for="pprredirect_active">' . __(" Active?", 'sp' ) . '</label> (check to turn on) <b>NOTE:</b> The page or post needs to be published for the redirect to happen <i><b>UNLESS</b></i> you publish it first, then save it as a Draft..<br /><br />';
		
		echo '<label for="pprredirect_url">' . __(" Redirect URL:", 'sp' ) . '</label><br />';
		if(get_post_meta($post->ID, 'pprredirect_url', true)!=''){$pprredirecturl=get_post_meta($post->ID, 'pprredirect_url', true);}else{$pprredirecturl="";}
		echo '<input type="text" style="width:75%;margin-top:2px;margin-bottom:2px;" name="pprredirect_url" value="'.$pprredirecturl.'" /><br />(i.e., <code>http://example.com</code> or <code>/somepage/</code> or <code>p=15</code> or <code>155</code>. Use <b>FULL URL</b> <i>including</i> <code>http://</code> for all external <i>and</i> meta redirects. )<br /><br />';
	
		echo '<label for="pprredirect_type">' . __(" Type of Redirect:", 'sp' ) . '</label> ';
		if(get_post_meta($post->ID, 'pprredirect_type', true)!=''){$pprredirecttype=get_post_meta($post->ID, 'pprredirect_type', true);}else{$pprredirecttype="";}
		switch($pprredirecttype):
			case "":
				$ppr_option2=" selected";//default
				break;
			case "301":
				$ppr_option1=" selected";
				break;
			case "302":
				$ppr_option2=" selected";
				break;
			case "307":
				$ppr_option3=" selected";
				break;
			case "meta":
				$ppr_option5=" selected";
				break;
		endswitch;
		
		echo '<select style="margin-top:2px;margin-bottom:2px;" name="pprredirect_type"><option value="301" '.$ppr_option1.'>301 Permanent</option><option value="302" '.$ppr_option2.'>302 Temporary</option><option value="307" '.$ppr_option3.'>307 Temporary</option><option value="meta" '.$ppr_option5.'>Meta Redirect</option></select> (Default is 302)<br /><br />';
	
	}
	// When the post is saved, saves our custom data
	function ppr_save_postdata($post_id, $post) {
		if(isset($_POST['pprredirect_active']) || isset($_POST['pprredirect_url']) || isset($_POST['pprredirect_type']) ):
			// verify authorization
			if(isset($_POST['pprredirect_noncename'])){
				if ( !wp_verify_nonce( $_POST['pprredirect_noncename'], plugin_basename(__FILE__) )) {
					return $post->ID;
				}
			}
		
			// check allowed to editing
			if ( 'page' == $_POST['post_type'] ) {
				if ( !current_user_can( 'edit_page', $post->ID ))
					return $post->ID;
			} else {
				if ( !current_user_can( 'edit_post', $post->ID ))
					return $post->ID;
			}
		
			// find & save the form data
			// Put it into an array
			$mydata['pprredirect_active'] = $_POST['pprredirect_active'];
			$mydata['pprredirect_url'] = $_POST['pprredirect_url'];
			if($mydata['pprredirect_url']!=''){
				$mydata['pprredirect_type'] = $_POST['pprredirect_type'];
			}
			
			// Add values of $mydata as custom fields
			foreach ($mydata as $key => $value) { //Let's cycle through the $mydata array!
				if( $post->post_type == 'revision' ) return; //don't store custom data twice
				$value = implode(',', (array)$value); //if $value is an array, make it a CSV (unlikely)
				if(get_post_meta($post->ID, $key, FALSE)) { //if the custom field already has a value
					update_post_meta($post->ID, $key, $value);
				} else { //if the custom field doesn't have a value
					add_post_meta($post->ID, $key, $value);
				}
				if(!$value) delete_post_meta($post->ID, $key); //delete if blank
			}
		endif;
	}

?>