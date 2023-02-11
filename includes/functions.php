<?php

function loadStyleSheets()
{

    $stylesheets = '
        
            <!-- swiper css link  -->
            <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
        
            <!-- font awesome cdn link  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

            <!-- toast notification cdn link  -->
            <link rel="stylesheet" href="' . systemVariable('SITE_DIR') . 'assets/vendors/toastify/toastify.css">
        
            <!-- custom css file link  -->
            <link rel="stylesheet" href="' . systemVariable('SITE_DIR') . 'assets/css/style002.css">


            <link rel="stylesheet" href="' . systemVariable('SITE_DIR') . 'assets/css/addon.css">
            
        ';

    return $stylesheets;
}

function loadScripts()
{

    $scripts = '
            <!-- jquery js -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            
            <!-- toast notification js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

            <script src="' . systemVariable('SITE_DIR') . 'assets/js/functions.js"></script>
        ';

    return $scripts;
}

function loadFooterScripts($load_base = true)
{
    $footer_scripts = '

            <!-- swiper js link  -->
            <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

            <!-- toast notification js link  -->
            <script src="' . systemVariable('SITE_DIR') . 'assets/vendors/toastify/toastify.js"></script>
';
    if ($load_base) {
        echo '<!-- base js link  --> 
            <script src="' . systemVariable('SITE_DIR') . 'assets/js/base.js"></script>';
    }
    echo ' <!-- custom js file link  -->
            <script src="' . systemVariable('SITE_DIR') . 'assets/js/addon.js"></script>
        
    ';

    return minify_html($footer_scripts);
}


function loadMetaData(...$meta_unique_name)
{
    if (array_key_exists(0, $meta_unique_name)) {

        $meta = '
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="canonical" href="' . SITE_HOME . '" />
        ';

        $metas_query = WHERE('metas', 'meta_unique_name', $meta_unique_name[0]);
        $run_query = runQuery($metas_query);

        while ($row = mysqli_fetch_assoc($run_query)) {
            $meta .= "\n";
            $meta .= '<meta ' . $row['attr_type'] . '="' . $row['attr_value'] . '" content="' . $row['content'] . '">';
        }
    } else {
        $meta = '
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="canonical" href="' . SITE_HOME . '" />
        ';
    }


    return $meta;
}

function loadTitleAndFavicon(...$basic)
{

    // $title = $basic[0] . ' — ' . systemVariable('SITE_NAME') ?? systemVariable('SITE_NAME');
    if (isset($basic[0])) {
        $title = $basic[0] . ' — ' . systemVariable('SITE_NAME');
    } else {
        $title = systemVariable('SITE_NAME');
    }
    $favicon = $basic[1] ?? systemVariable('SITE_DIR') . systemVariable('SITE_ICON');
    $favicon = str_replace('\\', '/', $favicon);

    $compound = '
            <title>' . $title . '</title>
            <link rel="shortcut icon" href="' . $favicon . '">
            <link rel="apple-touch-icon image_src" href="' . $favicon . '">
            <link rel="icon" href="' . $favicon . '">
        ';

    return $compound;
}

function loadJQuery()
{
    $jquery = '
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    ';
    return $jquery;
}


function loadCopyright()
{

    $copyright_year = date('Y');

    $copyright = '
        <div class="credit">
            copyright &copy; ' . $copyright_year . ' ' . systemVariable('SITE_NAME') . ' | all rights reserved. | 
            Powered by <a style="color: yellow;" href="https://www.lyncdigit.com" target="_blank">Lyncdigit</a>
        </div>
    ';

    return $copyright;
}

function pre($object)
{
    $object = json_decode($object, true);
    echo "<pre>";
    print_r($object);
    echo "<pre/>";
}

function get_conn()
{
    require_once ___INC___ . 'config.php';

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die('Error connecting to MySQL server.');

    mysqli_select_db($conn, DB) or die('Error selecting database.');

    return $conn;
}

function SELECT($table_name)
{
    $query = "SELECT * FROM $table_name";
    return $query;
}

function DELETE($table_name, $column_name, $value)
{
    $query = "DELETE FROM `$table_name` WHERE `$table_name`.`$column_name` = '$value'";
    return $query;
}

function WHERE($table_name, $column_name, $value)
{

    $query = SELECT($table_name) . " WHERE `$table_name`.`$column_name` = '$value'";

    return $query;
}

function runQuery($query)
{
    $run_query = mysqli_query(get_conn(), $query);
    return $run_query;
}

function systemVariable($variable_name)
{
    // $query = "SELECT * FROM `system` WHERE `system`.`variable` = '$variable_name'";
    $query = WHERE('systemv', 'variable', $variable_name);
    $run_query = runQuery($query);
    $fetch = mysqli_fetch_assoc($run_query);
    return $fetch['value'];
}

// function getImage($image_name)
// {
//     // $query = "SELECT * FROM `images` WHERE `images`.`image_name` = '$image_name'";
//     $query = WHERE('images', 'image_name', $image_name);
//     $run_query = runQuery($query);
//     $fetch = mysqli_fetch_assoc($run_query);
//     return $fetch;
// }


function getComponent($component_name)
{
    include_once ___INC___ . 'components/' . $component_name . ".php";
}

function getPage($page_name)
{
    include_once ___INC___ . 'pages/' . $page_name . ".php";
}

function getSidebar($select_menu = 'home')
{
    include_once ___INC___ . 'components/side_nav.php';
    get_sidebar($select_menu);
}

function is_trashed_or_deleted($any_row)
{
    if ($any_row['is_trashed'] == 0 && $any_row['is_deleted'] == 0) {
        return false;
    } else {
        return true;
    }
}

// tentative function
function getDirectingAuthoritiesList(){
    $query = SELECT('users')." WHERE `users`.`user_type` != 2 AND `users`.`user_type` != 6;";
    $run_query = runQuery($query);
    return $run_query;
}

// tentative function
function getPrioritiesList(){
    $query = SELECT('priorities');
    $run_query = runQuery($query);
    return $run_query;
}

function getComplaintsList(){
    $query = WHERE('complaints', 'is_deleted', 0)." ORDER BY `id` DESC;";
    $run_query = runQuery($query);
    return $run_query;
}

function getComplaintDetails($refno){
    $query = WHERE('complaints', 'refno', $refno);
    $run_query = runQuery($query);
    // if($run_query == null){
    //     return array('status' => 'failed', 'message' => "No such Complaint found!");
    // }
    // $fetch = mysqli_fetch_assoc($run_query);
    // if($fetch['is_deleted'] == 1){
    //     return array('status' => 'failed', 'message' => "No such Complaint found!");
    // }
    // return $fetch;
    return $run_query;
}

if (!defined('SITE_HOME')) {
    define('SITE_HOME', systemVariable('SITE_HOME'));
}

if (!defined('SITE_DIR')) {
    define('SITE_DIR', systemVariable('SITE_DIR'));
}











































// Admin Functions
if (!defined('___ADMIN_DIR___')) {
    define('___ADMIN_DIR___', SITE_DIR . 'admin/');
}


// function adminVariable($variable_name)
// {
//     // if (session_status() === PHP_SESSION_NONE) {
//     //     session_start();
//     // }
//     $query = WHERE('admins', 'user_auth', $_SESSION[USER_GLOBAL_VAR]);
//     $run_query = runQuery($query);
//     $fetch = mysqli_fetch_assoc($run_query);
//     return $fetch[$variable_name];
// }


// function createQueryForSEO($object, $table_name, $id)
// {

//     $meta_unique_name = $table_name . "_" . $id;
//     $updated_by = $object['updated_by'];
//     $meta_keywords = $object['meta-keywords'];
//     $meta_description = $object['meta-description'];

//     $dup_request = $object;

//     $meta_field_ids = array();
//     $meta_names = array();
//     $meta_properties = array();

//     foreach ($dup_request as $key => $value) {
//         if (startsWith($key, 'name-content-')) {
//             $field_id = getMetaFieldId($key, 'name-content-');
//             array_push($meta_field_ids, $field_id);
//         } else if (startsWith($key, 'property-content-')) {
//             $field_id = getMetaFieldId($key, 'property-content-');
//             array_push($meta_field_ids, $field_id);
//         }
//     }

//     for ($i = 0; $i < count($meta_field_ids); $i++) {
//         $field_id = $meta_field_ids[$i];
//         if (array_key_exists('name-' . $field_id, $dup_request)) {
//             $meta_names[$dup_request['name-' . $field_id]] = $dup_request['name-content-' . $field_id];
//         } else if (array_key_exists('property-' . $field_id, $dup_request)) {
//             $meta_properties[$dup_request['property-' . $field_id]] = $dup_request['property-content-' . $field_id];
//         }
//     }

//     $sql = "INSERT INTO `metas` (`meta_unique_name`, `attr_type`, `attr_value`, `content`, `updated_by`) VALUES ('$meta_unique_name', 'name', 'keywords', '$meta_keywords', '$updated_by'), ('$meta_unique_name', 'name', 'description', '$meta_description', '$updated_by'),";
//     foreach ($meta_names as $key => $value) {
//         $sql .= " ('$meta_unique_name', 'name', '$key', '$value', '$updated_by'),";
//     }

//     foreach ($meta_properties as $key => $value) {
//         $sql .= " ('$meta_unique_name', 'property', '$key', '$value', '$updated_by'),";
//     }

//     $sql = substr($sql, 0, (strlen($sql) - 1));
//     $sql .= ";";

//     return $sql;
// }

// function setMetaData($query, $table_name, $id)
// {
//     $meta_unique_name = $table_name . "_" . $id;
//     $remove_old_data = DELETE('metas', 'meta_unique_name', $meta_unique_name);
//     $remove_old_data = runQuery($remove_old_data);
//     if ($remove_old_data == 1) {
//         $new_seo = runQuery($query);
//     }
// }

// function getMetaData($meta_unique_name)
// {
//     $metas = WHERE('metas', 'meta_unique_name', $meta_unique_name);
//     $metas = runQuery($metas);
//     return $metas;
// }

// function getMetaSingle($meta_unique_name, $property_type)
// {
//     $meta = SELECT('metas') . " WHERE `metas`.`meta_unique_name` = '$meta_unique_name' AND `metas`.`attr_value` = '$property_type';";
//     $meta = runQuery($meta);
//     $meta = mysqli_fetch_assoc($meta);
//     return $meta;
// }

function updatesystemVariable($variable_name, $variable_value, $current_admin)
{

    $current_system_variable_value = systemVariable($variable_name);

    // if ($current_system_variable_value != $variable_value) {
    //     addNewAdminUpdate($current_admin, 'Updated the Site General Settings. They have changed the ' . $variable_name . ' from "' . systemVariable($variable_name) . '" to "' . $variable_value . '"');
    // }

    $query = "UPDATE `systemv` SET `value` = '$variable_value' WHERE `systemv`.`variable` = '$variable_name';";
    $run_query = runQuery($query);
    return $run_query;
}

function updatesystemVariables($list_of_variables, $current_admin)
{

    foreach ($list_of_variables as $key => $value) {
        updatesystemVariable($key, $value, $current_admin);
    }
}














// Ajax Requester & Secure
function getAjaxRequester()
{
    $requester_script = "
        <script>
            function ajax_request(data, is_serialized = true) {

                const api_url = \"" . SITE_DIR . "includes/api.php\";
                const api_key = \"".md5('MTDNG-PDDGD-MHMV4-F2MBY-RCXKK')."\";
            
            
                data += \"&api_key=\" + api_key;
            
                var type_of_data = is_serialized ? 'json' : 'text';
            
                return $.ajax({
                    url: api_url,
                    method: \"post\",
                    data: data,
                    // dataType: \"json\"
                    dataType: type_of_data
                });
            
            }
        </script>
    ";

    return $requester_script;
}

function secure_API_KEY($request)
{
    if (array_key_exists('api_key', $request)) {
        unset($request['api_key']);
    }
    return $request;
}













// API functions
function api_test($request)
{
    return $request;
}


function login($request)
{

    $query = WHERE('users', 'userid', $request['userid']);
    $run_query = runQuery($query);


    $response = array();

    if (mysqli_num_rows($run_query) > 0) {

        $fetch = mysqli_fetch_assoc($run_query);

        if ($fetch['is_active'] != 1) {
            $response['status'] = 'failed';
            $response['message'] = "Your account has been deactivated!";
            return $response;
        }

        if ($fetch['is_deleted'] == 1) {
            $response['status'] = 'failed';
            $response['message'] = "No such User Found!";
            return $response;
        }

        if (password_verify($request['password'], $fetch['password']) == 1) {
            $response['status'] = 'success';
            $response['message'] = "Login Successfull!";
            session_start();
            $_SESSION[USER_GLOBAL_VAR] = $fetch['userid'];
        } else {
            $response['status'] = 'failed';
            $response['message'] = "Incorrect Credentials!";
        }
    } else {
        $response['status'] = 'failed';
        $response['message'] = "No such User Found!";
    }
    return $response;
}





























// Misc functions
function prefix_0($no)
{
    return ($no < 10 && $no > 0) ? $no = '0' . $no : $no;
}

function rectify_location($location, $admin_url = false)
{
    $first_four = substr($location, 0, 7);
    $first_five = substr($location, 0, 8);
    if ($first_four == 'http://' || $first_five == 'https://') {
        return $location;
    } else {
        if (!$admin_url) {
            return SITE_DIR . $location;
        } else {
            return ___ADMIN_DIR___ . $location;
        }
    }
}

function getRandomId($length, $type = 'alpha_numeric')
{
    switch ($type) {
        case 'alpha_numeric':
            $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            break;
        case 'alpha':
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            break;
        case 'alpha_uppercase':
            $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 'alpha_uppercase_numeric':
            $str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            break;
        case 'alpha_lowercase':
            $str = 'abcdefghijklmnopqrstuvwxyz';
            break;
        case 'alpha_lowercase_numeric':
            $str = '0123456789abcdefghijklmnopqrstuvwxyz';
            break;
        case 'numeric':
            $str = '0123456789';
            break;
        default:
            break;
    }
    return substr(str_shuffle($str), 0, $length);
}

function minify_html($html)
{
    $minified_html = preg_replace('/\s+/', ' ', $html);
    $minified_html = str_replace("\t", "", $html);
    $minified_html = str_replace("\n", "", $minified_html);
    return $minified_html;
}

function minifier($code)
{
    $search = array(
        // Remove whitespaces after tags
        '/\>[^\S ]+/s',
        // Remove whitespaces before tags
        '/[^\S ]+\</s',
        // Remove multiple whitespace sequences
        '/(\s)+/s',
        // Removes comments
        '/<!--(.|\s)*?-->/'
    );
    $replace = array('>', '<', '\\1');
    $code = preg_replace($search, $replace, $code);
    return $code;
}

function startsWith($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function getMetaFieldId($string, $startString)
{
    return str_replace($startString, '', $string);
}

function json_validator($data)
{
    if (!empty($data)) {
        return is_string($data) &&
            is_array(json_decode($data, true)) ? true : false;
    }
    return false;
}