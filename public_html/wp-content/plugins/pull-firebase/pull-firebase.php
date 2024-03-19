<?php

/*
 * Plugin Name: Pull Firebase
 * Description: Update post using Firebase
 * Plugin URI: 
 * Author:
 * Author URI:
 */


if (!defined('ABSPATH')) {
  die();
}

class PullFirebasePlugin {
  // methods
  function __construct() {
    // add_action('init', array($this, ));
    add_action('admin_menu', array($this, 'add_menu'));
    add_action( 'admin_init', array($this, 'add_ajax_actions') );
    // add_action('wp_ajax_get_fb_data', array($this, 'get_fb_data'));


  }
  function register() {
    add_action('admin_enqueue_scripts', array($this, 'enqueue'));
  }
  function activate() {
    // generate a CPT
    // flush rewrite rules 
  }
  function deactivate() {
    // flush rewrite rules
  }
  function uninstall() {
    // delete CPT
    // delete all the plugin data 
  }
  function enqueue() {
    wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__));
    wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
  }
  function add_menu()
  {
    add_menu_page('Firebase Post', 'Firebase Post', 'administrator', 'firebase_post', array($this, 'show_page_menu'), '', 30.1);
  }
  function show_page_menu()
  {
    // echo '<button id="firebase-plugin-button" class="button-primary">press button</button>';
    // create_new_post_function();
    echo '<form method="post" action=""><input type="submit" name="button1" id="firebase-plugin-button" class="button" value="new button" /></form>';
    
  }
  function add_ajax_actions() {
    add_action('wp_ajax_nopriv_get_fb_data', array($this, 'get_fb_data'));
    add_action('wp_ajax_get_fb_data', array($this, 'get_fb_data'));
  }
  function get_fb_data() {
    echo 'in post: ';
    if(isset($_POST)) {
      $testing = $_POST['db_data'];
      echo $testing;
      echo "decoding ";
      // $new = str_replace("\\", "",$testing);
      // $new = json_decode($new);
      // $new = json_decode(html_entity_decode(stripslashes($testing)));
      // echo json_decode(html_entity_decode(stripslashes($testing), true));
      $new = json_decode(json_encode($testing));
      echo json_last_error();
      echo $new;
      die();
    } else {
      echo ' fail';
    }
    die();
  }
}

if (class_exists('PullFirebasePlugin')) {
  $pullFirebasePlugin = new PullFirebasePlugin();
  $pullFirebasePlugin->register();
}


// echo base64_encode($svg);

// $f_icon = 'data:image/svg+xml;base64,PHN2ZwogIHg9IjBweCIKICB5PSIwcHgiCiAgdmlld0JveD0iMCAwIDEwMCAxMDAiCiAgeG1sbnM6aT0iaHR0cDovL25zLmFkb2JlLmNvbS9BZG9iZUlsbHVzdHJhdG9yLzEwLjAvIgo+CiAgPHBhdGgKICAgIGZpbGw9IiMwMDAwMDAiCiAgICBkPSJNMzUuMzA3LDI4LjIxMmMxLjE1OS00LjIwOCwyLjY3LTcuNjg4LDQuNTM2LTEwLjQzNGMxLjg2My0yLjc0Niw0LjA5NC01LjQwNCw2LjY5LTcuOTc4ICAgIGMyLjU5NC0yLjU2OSw0LjQyMi00LjI0Myw1LjQ4LTUuMDI0QzUzLjA3MSwzLjk5NCw1My45MjcsMy40MDMsNTQuNTgyLDNjLTIuNTY5LDcuNTEtMy43OTIsMTMuOTk3LTMuNjY3LDE5LjQ2NCAgICBjMC4xMjYsNS40NjgsMS4yMzYsOS44OTIsMy4zMjcsMTMuMjY4YzIuMDkyLDMuMzc2LDUuMTI4LDUuODk2LDkuMTA5LDcuNTZjMC45MDgsMC4zNTQsMS43MzYsMC41OCwyLjQ5NSwwLjY3OSAgICBjMy41NzksMC4yNTEsNC4zODItMy42MjcsMi40MTktMTEuNjM5Yy0xLjA1OC00LjI4Ny0yLjE0My03LjUzNS0zLjI1LTkuNzU0YzguMjYzLDUuNDkyLDE0LjQ3NywxMi41MSwxOC42MzMsMjEuMDU0ICAgIGM0LjE1Nyw4LjU0NCw1LjI3NywxNy4xNDcsMy4zNjMsMjUuODEzYy0wLjc1NiwzLjM4MS0xLjkzOCw2LjQ1MS0zLjU1Myw5LjIyM2MtMS42MTIsMi43NzYtMy4yNjQsNS4wMDUtNC45NTEsNi42OTMgICAgYy0xLjY4OCwxLjY4OC0zLjg4MSwzLjI5Ny02LjU3Niw0LjgzN2MtMi42OTYsMS41MzUtNC45LDIuNjU3LTYuNjE0LDMuMzYxYy0xLjcxNSwwLjcwOC00LjAwOCwxLjU2NS02Ljg3OSwyLjU2OSAgICBjLTEuMjA5LDAuMzA1LTIuMjcsMC41MDctMy4xNzUsMC42MDRjLTAuOTA4LDAuMTA0LTEuNjc3LDAuMTY5LTIuMzA2LDAuMTkyYy0wLjYzMSwwLjAyNS0xLjEyMi0wLjEwMy0xLjQ3NS0wLjM3OSAgICBjLTAuMzU0LTAuMjc0LTAuNjMtMC41MTctMC44MzEtMC43MThjLTAuMjAyLTAuMjAyLTAuMjY2LTAuNTkyLTAuMTg5LTEuMTcyYzAuMDc2LTAuNTgxLDAuMTUyLTEuMDU5LDAuMjI3LTEuNDM4ICAgIGMwLjA3Ni0wLjM3OSwwLjMwMy0wLjk2OSwwLjY4MS0xLjc3NWMwLjM3Ny0wLjgwOCwwLjY4LTEuNDYyLDAuOTA2LTEuOTY0YzAuMjI5LTAuNTAzLDAuNTkzLTEuMjM1LDEuMDk4LTIuMTk1ICAgIGMxLjEwNi0yLjIxNSwyLjA1Mi00LjI0MiwyLjgzNC02LjA4M2MwLjc4LTEuODQyLDEuMjk3LTMuNTkzLDEuNTUxLTUuMjU1YzAuODU2LTUuMDM1LDAuMTk5LTkuNjc2LTEuOTY3LTEzLjkxICAgIGMtMi4xNjktNC4yMzEtNS4yNDEtOC4zNjUtOS4yMjItMTIuMzk2YzEuMDA2LDEuOTY0LDEuMzMzLDUuOTM2LDAuOTgyLDExLjkwNWMtMC4zNTIsNS45NzUtMS4zMzQsMTAuNjIxLTIuOTQ4LDEzLjk0NyAgICBjLTAuNzU2LDEuNTExLTEuNjM2LDMuMDM2LTIuNjQ2LDQuNTcyYy0xLjAwOCwxLjU0LTIuMjE3LDMuMDkxLTMuNjI2LDQuNjUxYy0xLjQxMywxLjU2NC0yLjg1LDIuODExLTQuMzA5LDMuNzQgICAgYy0xLjQ2NCwwLjkzNS0zLjAyNCwxLjUyNS00LjY4OCwxLjc3NWMtMS42NjQsMC4yNTYtMy4yNzgtMC4xNDctNC44MzgtMS4yMDRjLTMuNTI5LTIuMjcxLTYuMTc0LTUuMDA3LTcuOTM4LTguMjA1ICAgIGMtMS43NjQtMy4xOTktMi44NzItNi4yMTEtMy4zMjQtOS4wMzFjLTAuMjUzLTEuNTE2LTAuMzc5LTMuMTAxLTAuMzc5LTQuNzYzYzAtMS42NjQsMC4xOS0zLjgwNSwwLjU2Ni02LjQyOSAgICBjMC4zNzktMi42MTgsMS4zNi01LjMxNCwyLjk0OC04LjA4NWMxLjU5LTIuNzcxLDMuNjkxLTUuMzE1LDYuMzE0LTcuNjM4Yy0wLjcwOCwxLjYxNC0wLjk3MiwzLjUwMy0wLjc5NSw1LjY2OSAgICBjMC4xNzUsMi4xNzEsMC41NTQsNC4yMjMsMS4xMzUsNi4xNjJjMC41NzksMS45NDMsMS42LDMuNDg3LDMuMDYxLDQuNjVjMS40NjIsMS4xNjEsMy4xNSwxLjQ4NSw1LjA2NCwwLjk4MyAgICBjMC45MDgtMC4yMDEsMS42ODgtMC41MDYsMi4zNDItMC45MWMwLjY1NS0wLjQwNCwxLjE4NC0wLjkxNSwxLjU5LTEuNTQ5YzAuNC0wLjYzMSwwLjc0My0xLjIzMSwxLjAxOS0xLjgxMiAgICBjMC4yNzgtMC41OCwwLjQyOC0xLjM3MywwLjQ1NS0yLjM4MmMwLjAyNC0xLjAwOCwwLjA0OS0xLjg1LDAuMDc0LTIuNTM0YzAuMDI1LTAuNjc5LTAuMDY0LTEuNjc0LTAuMjYzLTIuOTgzICAgIGMtMC4yMDItMS4zMTQtMC4zNTQtMi4zMDgtMC40NTMtMi45ODdjLTAuMTA0LTAuNjc5LTAuMzAzLTEuNzYyLTAuNjA2LTMuMjUzYy0wLjMwMi0xLjQ4Ni0wLjUwNC0yLjUzLTAuNjA1LTMuMTM1ICAgIEMzMy45NDYsMzYuNjEzLDM0LjE0NiwzMi40MiwzNS4zMDcsMjguMjEyeiIKICAgIGlkPSJwYXRoMiIKICAvPgo8L3N2Zz4=';
// $icon_data_in_base64 = base64_encode($svg);
// $icon_data_in_base64 = "PHN2ZwogIHg9IjBweCIKICB5PSIwcHgiCiAgdmlld0JveD0iMCAwIDEwMCAxMDAiCj4KICA8cGF0aAogICAgZmlsbD0iYmxhY2siCiAgICBkPSJNMzUuMzA3LDI4LjIxMmMxLjE1OS00LjIwOCwyLjY3LTcuNjg4LDQuNTM2LTEwLjQzNGMxLjg2My0yLjc0Niw0LjA5NC01LjQwNCw2LjY5LTcuOTc4ICAgIGMyLjU5NC0yLjU2OSw0LjQyMi00LjI0Myw1LjQ4LTUuMDI0QzUzLjA3MSwzLjk5NCw1My45MjcsMy40MDMsNTQuNTgyLDNjLTIuNTY5LDcuNTEtMy43OTIsMTMuOTk3LTMuNjY3LDE5LjQ2NCAgICBjMC4xMjYsNS40NjgsMS4yMzYsOS44OTIsMy4zMjcsMTMuMjY4YzIuMDkyLDMuMzc2LDUuMTI4LDUuODk2LDkuMTA5LDcuNTZjMC45MDgsMC4zNTQsMS43MzYsMC41OCwyLjQ5NSwwLjY3OSAgICBjMy41NzksMC4yNTEsNC4zODItMy42MjcsMi40MTktMTEuNjM5Yy0xLjA1OC00LjI4Ny0yLjE0My03LjUzNS0zLjI1LTkuNzU0YzguMjYzLDUuNDkyLDE0LjQ3NywxMi41MSwxOC42MzMsMjEuMDU0ICAgIGM0LjE1Nyw4LjU0NCw1LjI3NywxNy4xNDcsMy4zNjMsMjUuODEzYy0wLjc1NiwzLjM4MS0xLjkzOCw2LjQ1MS0zLjU1Myw5LjIyM2MtMS42MTIsMi43NzYtMy4yNjQsNS4wMDUtNC45NTEsNi42OTMgICAgYy0xLjY4OCwxLjY4OC0zLjg4MSwzLjI5Ny02LjU3Niw0LjgzN2MtMi42OTYsMS41MzUtNC45LDIuNjU3LTYuNjE0LDMuMzYxYy0xLjcxNSwwLjcwOC00LjAwOCwxLjU2NS02Ljg3OSwyLjU2OSAgICBjLTEuMjA5LDAuMzA1LTIuMjcsMC41MDctMy4xNzUsMC42MDRjLTAuOTA4LDAuMTA0LTEuNjc3LDAuMTY5LTIuMzA2LDAuMTkyYy0wLjYzMSwwLjAyNS0xLjEyMi0wLjEwMy0xLjQ3NS0wLjM3OSAgICBjLTAuMzU0LTAuMjc0LTAuNjMtMC41MTctMC44MzEtMC43MThjLTAuMjAyLTAuMjAyLTAuMjY2LTAuNTkyLTAuMTg5LTEuMTcyYzAuMDc2LTAuNTgxLDAuMTUyLTEuMDU5LDAuMjI3LTEuNDM4ICAgIGMwLjA3Ni0wLjM3OSwwLjMwMy0wLjk2OSwwLjY4MS0xLjc3NWMwLjM3Ny0wLjgwOCwwLjY4LTEuNDYyLDAuOTA2LTEuOTY0YzAuMjI5LTAuNTAzLDAuNTkzLTEuMjM1LDEuMDk4LTIuMTk1ICAgIGMxLjEwNi0yLjIxNSwyLjA1Mi00LjI0MiwyLjgzNC02LjA4M2MwLjc4LTEuODQyLDEuMjk3LTMuNTkzLDEuNTUxLTUuMjU1YzAuODU2LTUuMDM1LDAuMTk5LTkuNjc2LTEuOTY3LTEzLjkxICAgIGMtMi4xNjktNC4yMzEtNS4yNDEtOC4zNjUtOS4yMjItMTIuMzk2YzEuMDA2LDEuOTY0LDEuMzMzLDUuOTM2LDAuOTgyLDExLjkwNWMtMC4zNTIsNS45NzUtMS4zMzQsMTAuNjIxLTIuOTQ4LDEzLjk0NyAgICBjLTAuNzU2LDEuNTExLTEuNjM2LDMuMDM2LTIuNjQ2LDQuNTcyYy0xLjAwOCwxLjU0LTIuMjE3LDMuMDkxLTMuNjI2LDQuNjUxYy0xLjQxMywxLjU2NC0yLjg1LDIuODExLTQuMzA5LDMuNzQgICAgYy0xLjQ2NCwwLjkzNS0zLjAyNCwxLjUyNS00LjY4OCwxLjc3NWMtMS42NjQsMC4yNTYtMy4yNzgtMC4xNDctNC44MzgtMS4yMDRjLTMuNTI5LTIuMjcxLTYuMTc0LTUuMDA3LTcuOTM4LTguMjA1ICAgIGMtMS43NjQtMy4xOTktMi44NzItNi4yMTEtMy4zMjQtOS4wMzFjLTAuMjUzLTEuNTE2LTAuMzc5LTMuMTAxLTAuMzc5LTQuNzYzYzAtMS42NjQsMC4xOS0zLjgwNSwwLjU2Ni02LjQyOSAgICBjMC4zNzktMi42MTgsMS4zNi01LjMxNCwyLjk0OC04LjA4NWMxLjU5LTIuNzcxLDMuNjkxLTUuMzE1LDYuMzE0LTcuNjM4Yy0wLjcwOCwxLjYxNC0wLjk3MiwzLjUwMy0wLjc5NSw1LjY2OSAgICBjMC4xNzUsMi4xNzEsMC41NTQsNC4yMjMsMS4xMzUsNi4xNjJjMC41NzksMS45NDMsMS42LDMuNDg3LDMuMDYxLDQuNjVjMS40NjIsMS4xNjEsMy4xNSwxLjQ4NSw1LjA2NCwwLjk4MyAgICBjMC45MDgtMC4yMDEsMS42ODgtMC41MDYsMi4zNDItMC45MWMwLjY1NS0wLjQwNCwxLjE4NC0wLjkxNSwxLjU5LTEuNTQ5YzAuNC0wLjYzMSwwLjc0My0xLjIzMSwxLjAxOS0xLjgxMiAgICBjMC4yNzgtMC41OCwwLjQyOC0xLjM3MywwLjQ1NS0yLjM4MmMwLjAyNC0xLjAwOCwwLjA0OS0xLjg1LDAuMDc0LTIuNTM0YzAuMDI1LTAuNjc5LTAuMDY0LTEuNjc0LTAuMjYzLTIuOTgzICAgIGMtMC4yMDItMS4zMTQtMC4zNTQtMi4zMDgtMC40NTMtMi45ODdjLTAuMTA0LTAuNjc5LTAuMzAzLTEuNzYyLTAuNjA2LTMuMjUzYy0wLjMwMi0xLjQ4Ni0wLjUwNC0yLjUzLTAuNjA1LTMuMTM1ICAgIEMzMy45NDYsMzYuNjEzLDM0LjE0NiwzMi40MiwzNS4zMDcsMjguMjEyeiIKICAgIGlkPSJwYXRoMiIKICAvPgo8L3N2Zz4=";
$icon_data_in_base64 = "PHN2ZwoKICB2aWV3Qm94PSIwIDAgMTAwIDEwMCIKPgogIDxwYXRoCiAgICBmaWxsPSJibGFjayIKICAgIGQ9Ik0zNS4zMDcsMjguMjEyYzEuMTU5LTQuMjA4LDIuNjctNy42ODgsNC41MzYtMTAuNDM0YzEuODYzLTIuNzQ2LDQuMDk0LTUuNDA0LDYuNjktNy45NzggICAgYzIuNTk0LTIuNTY5LDQuNDIyLTQuMjQzLDUuNDgtNS4wMjRDNTMuMDcxLDMuOTk0LDUzLjkyNywzLjQwMyw1NC41ODIsM2MtMi41NjksNy41MS0zLjc5MiwxMy45OTctMy42NjcsMTkuNDY0ICAgIGMwLjEyNiw1LjQ2OCwxLjIzNiw5Ljg5MiwzLjMyNywxMy4yNjhjMi4wOTIsMy4zNzYsNS4xMjgsNS44OTYsOS4xMDksNy41NmMwLjkwOCwwLjM1NCwxLjczNiwwLjU4LDIuNDk1LDAuNjc5ICAgIGMzLjU3OSwwLjI1MSw0LjM4Mi0zLjYyNywyLjQxOS0xMS42MzljLTEuMDU4LTQuMjg3LTIuMTQzLTcuNTM1LTMuMjUtOS43NTRjOC4yNjMsNS40OTIsMTQuNDc3LDEyLjUxLDE4LjYzMywyMS4wNTQgICAgYzQuMTU3LDguNTQ0LDUuMjc3LDE3LjE0NywzLjM2MywyNS44MTNjLTAuNzU2LDMuMzgxLTEuOTM4LDYuNDUxLTMuNTUzLDkuMjIzYy0xLjYxMiwyLjc3Ni0zLjI2NCw1LjAwNS00Ljk1MSw2LjY5MyAgICBjLTEuNjg4LDEuNjg4LTMuODgxLDMuMjk3LTYuNTc2LDQuODM3Yy0yLjY5NiwxLjUzNS00LjksMi42NTctNi42MTQsMy4zNjFjLTEuNzE1LDAuNzA4LTQuMDA4LDEuNTY1LTYuODc5LDIuNTY5ICAgIGMtMS4yMDksMC4zMDUtMi4yNywwLjUwNy0zLjE3NSwwLjYwNGMtMC45MDgsMC4xMDQtMS42NzcsMC4xNjktMi4zMDYsMC4xOTJjLTAuNjMxLDAuMDI1LTEuMTIyLTAuMTAzLTEuNDc1LTAuMzc5ICAgIGMtMC4zNTQtMC4yNzQtMC42My0wLjUxNy0wLjgzMS0wLjcxOGMtMC4yMDItMC4yMDItMC4yNjYtMC41OTItMC4xODktMS4xNzJjMC4wNzYtMC41ODEsMC4xNTItMS4wNTksMC4yMjctMS40MzggICAgYzAuMDc2LTAuMzc5LDAuMzAzLTAuOTY5LDAuNjgxLTEuNzc1YzAuMzc3LTAuODA4LDAuNjgtMS40NjIsMC45MDYtMS45NjRjMC4yMjktMC41MDMsMC41OTMtMS4yMzUsMS4wOTgtMi4xOTUgICAgYzEuMTA2LTIuMjE1LDIuMDUyLTQuMjQyLDIuODM0LTYuMDgzYzAuNzgtMS44NDIsMS4yOTctMy41OTMsMS41NTEtNS4yNTVjMC44NTYtNS4wMzUsMC4xOTktOS42NzYtMS45NjctMTMuOTEgICAgYy0yLjE2OS00LjIzMS01LjI0MS04LjM2NS05LjIyMi0xMi4zOTZjMS4wMDYsMS45NjQsMS4zMzMsNS45MzYsMC45ODIsMTEuOTA1Yy0wLjM1Miw1Ljk3NS0xLjMzNCwxMC42MjEtMi45NDgsMTMuOTQ3ICAgIGMtMC43NTYsMS41MTEtMS42MzYsMy4wMzYtMi42NDYsNC41NzJjLTEuMDA4LDEuNTQtMi4yMTcsMy4wOTEtMy42MjYsNC42NTFjLTEuNDEzLDEuNTY0LTIuODUsMi44MTEtNC4zMDksMy43NCAgICBjLTEuNDY0LDAuOTM1LTMuMDI0LDEuNTI1LTQuNjg4LDEuNzc1Yy0xLjY2NCwwLjI1Ni0zLjI3OC0wLjE0Ny00LjgzOC0xLjIwNGMtMy41MjktMi4yNzEtNi4xNzQtNS4wMDctNy45MzgtOC4yMDUgICAgYy0xLjc2NC0zLjE5OS0yLjg3Mi02LjIxMS0zLjMyNC05LjAzMWMtMC4yNTMtMS41MTYtMC4zNzktMy4xMDEtMC4zNzktNC43NjNjMC0xLjY2NCwwLjE5LTMuODA1LDAuNTY2LTYuNDI5ICAgIGMwLjM3OS0yLjYxOCwxLjM2LTUuMzE0LDIuOTQ4LTguMDg1YzEuNTktMi43NzEsMy42OTEtNS4zMTUsNi4zMTQtNy42MzhjLTAuNzA4LDEuNjE0LTAuOTcyLDMuNTAzLTAuNzk1LDUuNjY5ICAgIGMwLjE3NSwyLjE3MSwwLjU1NCw0LjIyMywxLjEzNSw2LjE2MmMwLjU3OSwxLjk0MywxLjYsMy40ODcsMy4wNjEsNC42NWMxLjQ2MiwxLjE2MSwzLjE1LDEuNDg1LDUuMDY0LDAuOTgzICAgIGMwLjkwOC0wLjIwMSwxLjY4OC0wLjUwNiwyLjM0Mi0wLjkxYzAuNjU1LTAuNDA0LDEuMTg0LTAuOTE1LDEuNTktMS41NDljMC40LTAuNjMxLDAuNzQzLTEuMjMxLDEuMDE5LTEuODEyICAgIGMwLjI3OC0wLjU4LDAuNDI4LTEuMzczLDAuNDU1LTIuMzgyYzAuMDI0LTEuMDA4LDAuMDQ5LTEuODUsMC4wNzQtMi41MzRjMC4wMjUtMC42NzktMC4wNjQtMS42NzQtMC4yNjMtMi45ODMgICAgYy0wLjIwMi0xLjMxNC0wLjM1NC0yLjMwOC0wLjQ1My0yLjk4N2MtMC4xMDQtMC42NzktMC4zMDMtMS43NjItMC42MDYtMy4yNTNjLTAuMzAyLTEuNDg2LTAuNTA0LTIuNTMtMC42MDUtMy4xMzUgICAgQzMzLjk0NiwzNi42MTMsMzQuMTQ2LDMyLjQyLDM1LjMwNywyOC4yMTJ6IgogIC8+Cjwvc3ZnPg==";


// Events: 5

function create_new_post_function()
{
  // global $user_ID;
  // $new_post = array(
  //   'post_title' => 'My New Post',
  //   'post_content' => 'new content here Lorem ipsum dolor sit amet...',
  //   'post_status' => 'publish',
  //   'post_date' => date('Y-m-d H:i:s'),
  //   // 'post_author' => $user_ID,
  //   'post_type' => 'post',
  //   'post_category' => [5]
  // );
  // $post_id = wp_insert_post($new_post);
  echo "created new post";

}

function post_function() {
  if (isset($_POST['button1'])) {
    create_new_post_function();
  }
}
add_action('init', 'post_function');


  // add_action('wp_ajax_nopriv_get_fb_data', 'get_fb_data');
  // add_action('wp_ajax_get_fb_data', 'get_fb_data');
  // function get_fb_data() {
  //   echo 'in post';
  //   if(isset($_POST)) {
  //     echo 'in in data ';
  //     $testing = $_POST['db_data'];
  //     echo $testing;
  //     die();
  //   } else {
  //     echo ' fail';
  //   }
  //   die();
  // }