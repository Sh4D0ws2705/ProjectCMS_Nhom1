<?php
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Bắt đầu submenu
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="dropdown-menu">';
    }

    // Bắt đầu một mục menu
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Gán class cho <li> dựa trên độ sâu và có dropdown hay không
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';

        // Thêm class 'dropdown' cho các mục có submenu
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown';
        }

        // Gộp class vào chuỗi
        $class_names = join(' ', array_filter($classes));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        // Xây dựng phần mở <li>
        $output .= '<li' . $class_names . '>';

        // Kiểm tra theme_location và áp dụng class cho <a>
        $link_class = 'nav-link';
        
        // Kiểm tra nếu theme_location là 'top-menu', thì thêm class 'text-white'
        if (isset($args->theme_location) && $args->theme_location == 'top-menu') {
            $link_class .= ' text-white'; // Chỉ áp dụng màu trắng cho top menu
        }

        if (in_array('menu-item-has-children', $classes)) {
            $link_class .= ' dropdown-toggle';
        }

        // Xây dựng phần <a> với <small> bên trong nếu theme_location là 'top-menu'
        $attributes = ' class="' . esc_attr($link_class) . '"';
        $attributes .= ' href="' . esc_url($item->url) . '"';
        if (in_array('menu-item-has-children', $classes)) {
            $attributes .= ' data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
        }

        $item_output = '<a' . $attributes . '>';
        
        // Nếu theme_location là 'top-menu', thêm thẻ <small>
        if (isset($args->theme_location) && $args->theme_location == 'top-menu') {
            $item_output .= '<small class="text-white mx-2">' . esc_html($item->title) . '</small>';
        } else {
            $item_output .= esc_html($item->title); // Nếu không phải top-menu, chỉ hiển thị tiêu đề
        }
        
        $item_output .= '</a>';

        $output .= $item_output;
    }

    // Kết thúc một mục menu
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }
}
