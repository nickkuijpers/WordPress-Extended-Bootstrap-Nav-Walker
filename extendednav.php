<?php

/*
|--------------------------------------------------------------------------
| Custom Menu
|--------------------------------------------------------------------------
|
| A way of easily changing classes of the Menu
|
*/
function custom_menu( $menu ){
	wp_nav_menu(
	    array(
	        'theme_location'  	=> $menu['menuname'],      
	        'container'         => $menu['container'],
	        'container_id'      => $menu['container_id'],
	        'container_class'   => $menu['container_class'],
	        'menu_class'        => $menu['menu_class'],
	        'fallback_cb'       => 'extended_nav::fallback',                  
	        'walker'            => new extended_nav(
	        	$menu['depth'],
	        	$menu['level_0_li'],
	        	$menu['level_0_a'],
	        	$menu['level_0_li_submenu'],
	        	$menu['level_0_a_submenu'],
	        	$menu['level_0_ul_submenu'],
	        	$menu['level_1_li'],
	        	$menu['level_1_a'],        	
	        	$menu['level_1_li_submenu'],
	        	$menu['level_1_a_submenu'],
	        	$menu['level_1_ul_submenu'],
	        	$menu['level_2_li'],
	        	$menu['level_2_a']
	        ),
      	)
    ); 
};

/*
|--------------------------------------------------------------------------
| Rewrite the use of the WordPress navigation 
|--------------------------------------------------------------------------
|
| A WordPress nav walker for implementing the Bootstrap 3 Navigation
|
*/

class extended_nav extends Walker_Nav_Menu {

	/**
	 * Initializing required attributes and values for the navigation tree
	 *
	 * @return void
	 */
	function __construct( $depth,
			$level_0_li,
			$level_0_a,
			$level_0_li_submenu,
			$level_0_a_submenu,
			$level_0_ul_submenu,
			$level_1_li,
			$level_1_a,			
			$level_1_li_submenu,
			$level_1_a_submenu,
			$level_1_ul_submenu,
			$level_2_li,
			$level_2_a
		){
					
		/**
		 * Receiving fields
		 *
		 * @return void
		 */

		$this->depth = $depth;

		$this->level_0_li = $level_0_li;
    	$this->level_0_a = $level_0_a;
    	$this->level_0_li_submenu = $level_0_li_submenu;
    	$this->level_0_a_submenu = $level_0_a_submenu;
    	$this->level_0_ul_submenu = $level_0_ul_submenu;
    	$this->level_1_li = $level_1_li;
    	$this->level_1_a = $level_1_a;    	
    	$this->level_1_li_submenu = $level_1_li_submenu;
    	$this->level_1_a_submenu = $level_1_a_submenu;
    	$this->level_1_ul_submenu = $level_1_ul_submenu;
    	$this->level_2_li = $level_2_li;
    	$this->level_2_a = $level_2_a;


		/*
		|--------------------------------------------------------------------------
		| Initializing required attributes and values
		|--------------------------------------------------------------------------
		|
		| You see a overview of the default menu structuur for better
		| initializing the required attributes and values
		|
		*/

        // <div class="collapse navbar-collapse" id="collapse">
	         	// <ul class="nav navbar-nav menu">		
						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
 						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
						// <li class="menu-flex">
        					$this->level_0_li = $this->level_0_li;	


	        					// <a href="http://...">
 									$this->level_0_a = $this->level_0_a;

 										// menu title

 								// </a>

 						// </li>
				        // <li class="menu-flex"><a href="http://...">Menu Title</a></li>
						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
 						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
				        // <li class="dropdown dropdown-hover-1 menu-flex">
								$this->level_0_li_submenu = $this->level_0_li_submenu;

					        	// <a class="dropdown-toggle dropdown-toggle-1" data-toggle="dropdown" role="button" aria-expanded="false">Wie zijn wij</a>
									$this->level_0_a_submenu = $this->level_0_a_submenu;	

					        	// <ul class="dropdown-menu dropdown-menu-1">
				         			$this->level_0_ul_submenu = $this->level_0_ul_submenu;

				         				// <li><a href="http://...">Menu item</a></li>
				         				// <li><a href="http://...">Menu item</a></li>
						        		// <li><a href="http://...">Menu item</a></li>
						        		// <li>
				         					$this->level_1_li = $this->level_1_li;
         						
					         					// <a href="http://...">						         					
	         										$this->level_1_a = $this->level_1_a;

	         											// menu title

	         									// </a>

	         							// </li>
										// <li><a href="http://...">Menu item</a></li>
										// <li><a href="http://...">Menu item</a></li>
										// <li><a href="http://...">Menu item</a></li>			         				        
							        	// <li class="dropdown-hover-2">
	         								$this->level_1_li_submenu = $this->level_1_li_submenu;

							        			// <a class="trigger right-cart" href="http://...">Menu item</a>		        				                        	
		         									$this->level_1_a_submenu = $this->level_1_a_submenu;

						                        // <ul class="dropdown-menu dropdown-menu-2 sub-menu">
		         									$this->level_1_ul_submenu = $this->level_1_ul_submenu;

							                           	// <li><a href="/">Dropdown item</a></li>
							                           	// <li><a href="/">Dropdown item</a></li>
		         										// <li><a href="/">Dropdown item</a></li>
			         									// <li>
								         					$this->level_2_li = $this->level_2_li;
				         						
									         					// <a href="http://...">						         					
					         										$this->level_2_a = $this->level_2_a;

					         											// menu title

					         									// </a>

					         							// </li>
							                           	// <li><a href="/">Dropdown item</a></li>
		         										// <li><a href="/">Dropdown item</a></li>
		         										// <li><a href="/">Dropdown item</a></li>
						                        // </ul>	                        
						        		// </li>		        		
						         		// <li><a href="http://...">Menu item</a></li>
						         		// <li><a href="http://...">Menu item</a></li>
						         		// <li><a href="http://...">Menu item</a></li>
						         		// <li><a href="http://...">Menu item</a></li>
			         			// </ul>
		         		// </li>
        				// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
        				// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
						// <li class="menu-flex"><a href="http://...">Menu Title</a></li>
       			// </ul>
       	// </div>

	}

	/*
	|--------------------------------------------------------------------------
	| Creation of the UL attributes
	|--------------------------------------------------------------------------
	|
	| Initializing UL attributes and values
	|
	*/	
	public function start_lvl( &$output, $depth = 0, $args = array() ) {		
		$indent = str_repeat( "\t", $depth );		

		/**
		 * level 0 ul with children
		 *
		 * @return void
		 */
		if ( $args->has_children && $depth == 0 ) {

			$level_0_ul_submenu = '';
			foreach ( $this->level_0_ul_submenu as $attr => $value ){
				$level_0_ul_submenu .= $attr . '="' . $value . '"';
			}
			$output .= '<ul '. $level_0_ul_submenu . '>';

		/**
		 * // level 1 with children
		 *
		 * @return void
		 */
		} elseif ( $args->has_children && $depth == 1 ){
			
			$level_1_ul_submenu = '';
			foreach ( $this->level_1_ul_submenu as $attr => $value ){
				$level_1_ul_submenu .= $attr . '="' . $value . '"';
			}
			$output .= '<ul '. $level_1_ul_submenu . '>';
		
		} else {
			$output .= '<ul>';
		}
		
	}

	/*
	|--------------------------------------------------------------------------
	| Creation of the LI attributes
	|--------------------------------------------------------------------------
	|
	| Initializing LI attributes and values
	|
	| @param string $output Passed by reference. Used to append additional content.
	| @param object $item Menu item data object.
	| @param int $depth Depth of menu item. Used for padding.
	| @param int $current_page Menu item ID.
	| @param object $args
	|
	*/	
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {		
		
		/**
		 * Initializing default attributes
		 *
		 * @return void
		 */			

		// classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$defaultclasses = '';
		foreach( $classes as $class ){
			$defaultclasses .= $class . ' ';
		}	

		// id
		$defaultid = esc_attr( apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args ) );				

		/**
		 * level 0 li with children
		 *
		 * @return void
		 */
		if ( $args->has_children && $depth == 0 ) {			

			$level_0_li_submenu = '';
			foreach ( $this->level_0_li_submenu as $attr => $value ){
				switch( $attr ){
					case 'class':												
						$level_0_li_submenu .= $attr . '="' . $defaultclasses . $value . '"';
					break;
					case 'id':						
						$level_0_li_submenu .= $attr . '="' . $defaultid . $value . '"';
					break;
					default:
						$level_0_li_submenu .= $attr . '="' . $value . '"';
					break;
				}
			}
			$output .= '<li ' . $level_0_li_submenu .'>';

		/**
		 * level 1 li with children
		 *
		 * @return void
		 */
		} elseif ( $args->has_children && $depth == 1 ){		

			$level_1_li_submenu = '';
			foreach ( $this->level_1_li_submenu as $attr => $value ){
				switch( $attr ){
					case 'class':												
						$level_1_li_submenu .= $attr . '="' . $defaultclasses . $value . '"';
					break;
					case 'id':						
						$level_1_li_submenu .= $attr . '="' . $defaultid . $value . '"';
					break;
					default:
						$level_1_li_submenu .= $attr . '="' . $value . '"';
					break;
				}
			}
			$output .= '<li ' . $level_1_li_submenu .'>';
		
		/**
		 * level 1 li without children
		 *
		 * @return void
		 */
		} elseif ( $depth == 1 ){
			
			$level_1_li = '';
			foreach ( $this->level_1_li as $attr => $value ){
				switch( $attr ){
					case 'class':												
						$level_1_li .= $attr . '="' . $defaultclasses . $value . '"';
					break;
					case 'id':						
						$level_1_li .= $attr . '="' . $defaultid . $value . '"';
					break;
					default:
						$level_1_li .= $attr . '="' . $value . '"';
					break;
				}
			}
			$output .= '<li ' . $level_1_li .'>';

		/**
		 * level 2 li without children
		 *
		 * @return void
		 */
		} elseif ( $depth == 2 ){
			
			$level_2_li = '';
			foreach ( $this->level_2_li as $attr => $value ){
				switch( $attr ){
					case 'class':												
						$level_2_li .= $attr . '="' . $defaultclasses . $value . '"';
					break;
					case 'id':						
						$level_2_li .= $attr . '="' . $defaultid . $value . '"';
					break;
					default:
						$level_2_li .= $attr . '="' . $value . '"';
					break;
				}
			}
			$output .= '<li ' . $level_2_li .'>';

		/**
		 * level 0 li without children
		 *
		 * @return void
		 */	
		} else {
			
			$level_0_li = '';
			foreach ( $this->level_0_li as $attr => $value ){
				switch( $attr ){
					case 'class':												
						$level_0_li .= $attr . '="' . $defaultclasses . $value . '"';
					break;
					case 'id':						
						$level_0_li .= $attr . '="' . $defaultid . $value . '"';
					break;
					default:
						$level_0_li .= $attr . '="' . $value . '"';
					break;
				}
			}
			$output .= '<li ' . $level_0_li .'>';

		}
		
 
		/**
		 **********************************************
		 * Lets create the A
		 **********************************************
		 */		

		/**
		 * Initializing default attributes
		 *
		 * @return void
		 */	
		$atts = array();
		$atts['title']  = ! empty( $item->title )	? $item->title	: '';
		$atts['target'] = ! empty( $item->target )	? $item->target	: '';
		$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';		
		$atts['href'] 	= ! empty( $item->url ) ? $item->url : '';			

	
		/**
		 * level 0 a with children
		 *
		 * @return void
		 */	
		if ( $args->has_children && $depth == 0 ) {			

			$level_0_a_submenu = '';
			foreach ( $this->level_0_a_submenu as $attr => $value ){			
				$atts[$attr] = $value;
			}
		
		/**
		 * level 1 a with children
		 *
		 * @return void
		 */	
		} elseif ( $args->has_children && $depth == 1 ){
			
			$level_1_a_submenu = '';
			foreach ( $this->level_1_a_submenu as $attr => $value ){			
				$atts[$attr] = $value;
			}

		/**
		 * level 1 a without children
		 *
		 * @return void
		 */	
		} elseif ( $depth == 1 ){
			
			$level_1_a = '';
			foreach ( $this->level_1_a as $attr => $value ){			
				$atts[$attr] = $value;
			}

		/**
		 * level 2 a without children
		 *
		 * @return void
		 */	
		} elseif ( $depth == 2 ){
			
			$level_2_a = '';
			foreach ( $this->level_2_a as $attr => $value ){			
				$atts[$attr] = $value;
			}
		
		/**
		 * level 0 a without children
		 *
		 * @return void
		 */	
		} else {
			
			$level_0_a = '';
			foreach ( $this->level_0_a as $attr => $value ){			
				$atts[$attr] = $value;
			}		

		}

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = '';
		$item_output .= '<a'. $attributes .'>';		
			$item_output .= apply_filters( 'the_title', $item->title, $item->ID );			
		$item_output .= '</a>';
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}

 

	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {

        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $this->depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo $fb_output;
		}
	}
}

?>