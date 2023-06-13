<div class="sidebar-menu">

    <ul class="nav flex-column">
        <li class="header"><span>MAIN</span></li>
		<?php

		$menus = $this->db->query( "SELECT m.* FROM navigation AS m JOIN nav_permission AS p ON p.nav_id=m.id WHERE p.group_id IN (?) ORDER BY m.sort,m.id", implode( ",", $this->auth->userinfo['group_ids'] ) )->fetchAll();

		$menu_items = [];

		foreach ( $menus as $menu ) {
			$menu_items[ $menu['parent_id'] ][] = $menu;
		}

		getMenu( $menu_items, 0, false );

		function getMenu( $menu_items, $key, $sub = false ) {
			echo( $sub ? '<ul class="group-items list-unstyled ps-2">' : '' );

			foreach ( $menu_items[ $key ] as $item ) {
				$li_class = ( isset( $menu_items[ $item['id'] ] ) ? 'nav-item sidebar-group' : 'nav-item' );
				$li_class .= ( strtolower( rtrim( $item['nav_path'], '/' ) ) == strtolower( CUR_REQUEST_PATH ) ? ' active' : '' );

				if ( isset( $menu_items[ $item['id'] ] ) ) {
					$paths = array_map( function( $item ) {
						return rtrim( $item, '/' );
					}, array_column( $menu_items[ $item['id'] ], 'nav_path' ) );

					if ( in_array( CUR_REQUEST_PATH, $paths ) ) {
						$li_class .= ' active';
					}
				}

				$li_pull_icon = ( isset( $menu_items[ $item['id'] ] ) ? '<i class="fa fa-angle-right float-end"></i>' : '' );

				if ( stripos( $item['nav_path'], "/Index" ) !== false ) {
					$link = APP_URL . DS . rtrim( strtolower( $item['nav_path'] ), "index" );
				} else {
					$link = APP_URL . DS . strtolower( $item['nav_path'] );
				}

				echo '<li class="' . $li_class . '"> 
			              <a href="' . $link . '" class="nav-link"> 
                              <div class="group-header">';

				echo $sub ? '' : '<i class="' . $item['nav_icon'] . ' me-3"></i>';

				echo '<span>' . $item['nav_name'] . '</span>'
				     . $li_pull_icon .
				     '</div>
			              </a>';

				if ( isset( $menu_items[ $item['id'] ] ) ) {
					getMenu( $menu_items, $item['id'], true );
				}

				echo '</li>';
			}

			echo( $sub ? '</ul>' : '' );
		}
        
		?>
    </ul>
</div>
