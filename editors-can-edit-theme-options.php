<?php

add_filter('user_has_cap', function($allcaps, $caps, $args, $user){
    if('edit_theme_options' !== $args[0]){
        return $allcaps; // Bail if we're not asking about edit theme options.
    }
    if(!empty($allcaps['edit_theme_options'])){
        return $allcaps; // Bail for users who can already edit theme options.
    }
    $user = get_userdata($args[1]);
    if(!in_array('editor', $user->roles)){
        return $allcaps; // Bail for users who aren't editors.
    }
    $allcaps['edit_theme_options'] = true;
    return $allcaps;
}, 10, 4);
