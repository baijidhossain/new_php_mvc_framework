<?php

$menus = $this->db->query( "SELECT m.* FROM navigation AS m JOIN nav_permission AS p ON p.nav_id=m.id WHERE p.group_id IN (?) ORDER BY m.sort,m.id", implode( ",", $this->auth->userinfo['group_ids'] ) )->fetchAll();


$menu_items = [];

foreach ( $menus as $menu ) {
	$menu_items[ $menu['parent_id'] ][] = $menu;
}


function getMenu( $menu_items, $key, $sub = false, $level = 0 ) {
	echo( $sub ? '<ul class="sub-menu list-unstyled">' : '' );

	foreach ( $menu_items[ $key ] as $item ) {
		$li_class = ( isset( $menu_items[ $item['id'] ] ) ? 'nav-item sidebar-group' : 'nav-item' );
		$li_class .= ( strtolower( rtrim( $item['nav_path'], '/' ) ) == strtolower( CUR_REQUEST_PATH ) ? ' active'
			: '' );

		if ( isset( $menu_items[ $item['id'] ] ) ) {
			$paths = array_map( function( $item ) {
				return rtrim( $item, '/' );
			}, array_column( $menu_items[ $item['id'] ], 'nav_path' ) );

			if ( in_array( CUR_REQUEST_PATH, $paths ) ) {
				$li_class .= ' active';
			}
		}

		$li_pull_icon = ( isset( $menu_items[ $item['id'] ] ) ? '<i class="fa-solid fa-angle-down text-center"></i>' : '' );

		if ( stripos( $item['nav_path'], "/Index" ) !== false ) {
			$link = APP_URL . DS . rtrim( strtolower( $item['nav_path'] ), "index" );
		} else {
			$link = APP_URL . DS . strtolower( $item['nav_path'] );
		}


		echo '<li class="' . $li_class . '">';

		// if level is 0, then it's a main menu item else it's a sub menu item
		if ( $level === 0 ) {
			echo '<a href="' . $link . '" class="nav-link">';
			echo '<div class="group-header">';
			echo $sub ? '' : '<i class="' . $item['nav_icon'] . ' me-1"></i>';
			echo '<span>' . $item['nav_name'] . '</span>';
			echo '</div>';

			echo $li_pull_icon;
		} else {
			echo '<a href="' . $link . '">';
			echo '<span>' . $item['nav_name'] . '</span>';
			echo isset( $menu_items[ $item['id'] ] ) ? '<i class="fa-solid fa-angle-right float-end"></i>' : '';

		}
		echo '</a>';


		if ( isset( $menu_items[ $item['id'] ] ) ) {
			getMenu( $menu_items, $item['id'], true, $level + 1 );
		}

		echo '</li>';
	}

	echo( $sub ? '</ul>' : '' );
}

?>

<div class="horizontal-main sidebar-menu">
    <div class="container">
        <nav class="horizontal-menu">
            <div class="horizontal-overlapbg"></div>
            <ul class="horizontal-menu-list list-unstyled nav">
				<?php getMenu( $menu_items, 0 ); ?>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="group-header">
                            <i class="fa-solid fa-layer-group me-1"></i><span>Pages</span>
                        </div>
                        <i class="fa-solid fa-angle-down text-center"></i>
                    </a>
                    <ul class="sub-menu list-unstyled">
                        <li>
                            <a href="#/level1">
                                <span>Level 1</span>
                                <i class="fa-solid fa-angle-right float-end"></i>
                            </a>
                            <ul class="sub-menu list-unstyled">
                                <li><a href="#/level2">Level 2</a></li>
                                <li><a href="#/level2">Level 2</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Level 1</a></li>
                        <li><a href="#">Level 1</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
