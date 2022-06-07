<?php

    function get_sidebar($selected_menu = 'home', $loc){

        $icons = array(
            'home' => '<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                style="user-select: auto;">
                <path
                    d="M924.8 385.6a446.7 446.7 0 0 0-96-142.4 446.7 446.7 0 0 0-142.4-96C631.1 123.8 572.5 112 512 112s-119.1 11.8-174.4 35.2a446.7 446.7 0 0 0-142.4 96 446.7 446.7 0 0 0-96 142.4C75.8 440.9 64 499.5 64 560c0 132.7 58.3 257.7 159.9 343.1l1.7 1.4c5.8 4.8 13.1 7.5 20.6 7.5h531.7c7.5 0 14.8-2.7 20.6-7.5l1.7-1.4C901.7 817.7 960 692.7 960 560c0-60.5-11.9-119.1-35.2-174.4zM482 232c0-4.4 3.6-8 8-8h44c4.4 0 8 3.6 8 8v80c0 4.4-3.6 8-8 8h-44c-4.4 0-8-3.6-8-8v-80zM270 582c0 4.4-3.6 8-8 8h-80c-4.4 0-8-3.6-8-8v-44c0-4.4 3.6-8 8-8h80c4.4 0 8 3.6 8 8v44zm90.7-204.5l-31.1 31.1a8.03 8.03 0 0 1-11.3 0L261.7 352a8.03 8.03 0 0 1 0-11.3l31.1-31.1c3.1-3.1 8.2-3.1 11.3 0l56.6 56.6c3.1 3.1 3.1 8.2 0 11.3zm291.1 83.6l-84.5 84.5c5 18.7.2 39.4-14.5 54.1a55.95 55.95 0 0 1-79.2 0 55.95 55.95 0 0 1 0-79.2 55.87 55.87 0 0 1 54.1-14.5l84.5-84.5c3.1-3.1 8.2-3.1 11.3 0l28.3 28.3c3.1 3.1 3.1 8.1 0 11.3zm43-52.4l-31.1-31.1a8.03 8.03 0 0 1 0-11.3l56.6-56.6c3.1-3.1 8.2-3.1 11.3 0l31.1 31.1c3.1 3.1 3.1 8.2 0 11.3l-56.6 56.6a8.03 8.03 0 0 1-11.3 0zM846 582c0 4.4-3.6 8-8 8h-80c-4.4 0-8-3.6-8-8v-44c0-4.4 3.6-8 8-8h80c4.4 0 8 3.6 8 8v44z"
                    style="user-select: auto;"></path>
                </svg>',
            'file-a-complaint' => '<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                style="user-select: auto;">
                <path
                    d="M854.6 288.6L639.4 73.4c-6-6-14.1-9.4-22.6-9.4H192c-17.7 0-32 14.3-32 32v832c0 17.7 14.3 32 32 32h640c17.7 0 32-14.3 32-32V311.3c0-8.5-3.4-16.7-9.4-22.7zM790.2 326H602V137.8L790.2 326zm1.8 562H232V136h302v216a42 42 0 0 0 42 42h216v494zM544 472c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8v108H372c-4.4 0-8 3.6-8 8v48c0 4.4 3.6 8 8 8h108v108c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V644h108c4.4 0 8-3.6 8-8v-48c0-4.4-3.6-8-8-8H544V472z"
                    style="user-select: auto;"></path>
                </svg>',
            'all-complaints' => '<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                style="user-select: auto;">
                <path
                    d="M912 192H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zm0 284H328c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h584c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8zM104 228a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0zm0 284a56 56 0 1 0 112 0 56 56 0 1 0-112 0z"
                    style="user-select: auto;"></path>
                </svg>',
            'search-complaint' => '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                xmlns="http://www.w3.org/2000/svg" style="user-select: auto;">
                <circle cx="11" cy="11" r="8" style="user-select: auto;"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65" style="user-select: auto;"></line>
                </svg>',
            'settings' => '<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                style="user-select: auto;">
                <path
                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"
                    style="user-select: auto;"></path>
                </svg>',
            'support' => '<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                style="user-select: auto;">
                <path
                    d="M12 2C6.486 2 2 6.486 2 12v4.143C2 17.167 2.897 18 4 18h1a1 1 0 0 0 1-1v-5.143a1 1 0 0 0-1-1h-.908C4.648 6.987 7.978 4 12 4s7.352 2.987 7.908 6.857H19a1 1 0 0 0-1 1V18c0 1.103-.897 2-2 2h-2v-1h-4v3h6c2.206 0 4-1.794 4-4 1.103 0 2-.833 2-1.857V12c0-5.514-4.486-10-10-10z"
                    style="user-select: auto;"></path>
                </svg>',
            'logout' => '<svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em"
                xmlns="http://www.w3.org/2000/svg" style="user-select: auto;">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" style="user-select: auto;"></path>
                <polyline points="16 17 21 12 16 7" style="user-select: auto;"></polyline>
                <line x1="21" y1="12" x2="9" y2="12" style="user-select: auto;"></line>
                </svg>'
        );

        echo '<section class="left-nav-section" id="left-nav-section"><ul>';
        echo sidebar_menu_item('Dashboard', $loc, $icons['home'], $selected_menu=='home');
        echo sidebar_menu_item('File a Complaint', $loc.'file-a-complaint', $icons['file-a-complaint'], $selected_menu=='file-a-complaint');
        echo sidebar_menu_item('All Complaints', $loc.'all-complaints', $icons['all-complaints'], $selected_menu=='all-complaints');
        echo sidebar_menu_item('Search Complaint', $loc.'search-complaint', $icons['search-complaint'], $selected_menu=='search-complaint');
        echo sidebar_menu_item('Settings', $loc.'settings', $icons['settings'], $selected_menu=='settings');
        echo sidebar_menu_item('Support', $loc.'support', $icons['support'], $selected_menu=='support');
        echo sidebar_menu_item('Logout', $loc.'logout', $icons['logout'], $selected_menu=='logout');
        echo '<a href="#collapse_expand" id="collapse_expand">
                <li>
                    <div class="menu-item-icon" id="collapse-icon">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="user-select: auto;"><path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" style="user-select: auto;"></path></svg>
                        <!-- <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="user-select: auto;"><path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" style="user-select: auto;"></path></svg> -->
                    </div>
                    <div class="menu-item-name">
                        Collapse</div>
                </li>
            </a>';
        echo ' </ul></section>';
    }

    function sidebar_menu_item($menu_name, $link, $icon, $current_menu=false){
        $menu_link = 'href="'.$link.'" ';
        $current_menu_attr =  $current_menu ? 'class="current-menu"' : '';
        $menu_item = '
            <a '.$menu_link.$current_menu_attr.'>
                <li>
                    <div class="menu-item-icon">
                        '.$icon.'
                    </div>
                    <div class="menu-item-name">
                        '.$menu_name.'</div>
                </li>
            </a>
        ';
        return $menu_item;
    }

    function get_header($loc='./'){
        $header = '<header>
            <div class="project-title-container">
                <div class="logo-img">
                    <div class="img-holder">
                        <img src="'.$loc.'images/logo.png" alt="Logo">
                    </div>
                </div>
                <div class="project-title">
                    shikayaat
                </div>
            </div>
            <div class="control-menu">
                <ul class="control-menu-list">
                    <li><a href="'.$loc.'">home</a></li>
                    <li><a href="'.$loc.'about">about</a></li>
                    <li><a href="'.$loc.'sales">sales</a></li>
                    <li><a href="'.$loc.'support">support</a></li>
                    <li><a href="'.$loc.'settings">connect2sazad</a></li>
                    <li><a href="'.$loc.'logout">logout</a></li>
                </ul>
            </div>
        </header>';
        echo $header;
    }

?>