# WordPress-Extended-Bootstrap-Nav-Walker
A extended WordPress nav walker for manipulating classes based on the created navigation.

I have extended the awesome method of https://github.com/twittem/wp-bootstrap-navwalker for manipulating the WordPress navigation. 

This function will give you the possibility of manipulating the classes the WordPress navigation creates. Please see the preview attached.

## Installing

The only requirement is to require the extendednav.php in your functions.php and use the function custom_menu() in your theme.

```

<nav class="navbar navbar-default navfix" role="navigation">
  <a href="javascript:void(0)" id="nav-toggle" class="navigation-toggle">
    <span class="icon-bar top-menu"></span>
    <span class="icon-bar mid-menu"></span>
    <span class="icon-bar bottom-menu"></span>
  </a>
  <div class="menu-bg"></div>
  <div class="menu-bar fixed-menu">
    <div class="collapse navbar-collapse" id="collapse">
     <?php                    
      custom_menu( 
        array(
          // the name of the menu
          'menuname'        => 'primary_navigation',
          // the depth of the menu
          'depth'           => 3,
          // the container type, <div> or <nav>
          'container'       => 'div',                  
          // the container class
          'container_class' => 'collapse navbar-collapse',
          // the container id
          'container_id'    => 'collapse',
          // the class of the main ul
          'menu_class'    => 'nav navbar-nav menu',
          
          /**
           * level 0 attributes and values without submenu
           *
           * @return void
           */
          'level_0_li'              => array(
                'class' =>  'menu-flex active',
          ),                  
          'level_0_a'               => array(
                'class' =>  '',
          ),
          
          /**
           * level 0 attributes and values with submenu
           *
           * @return void
           */
          'level_0_li_submenu'      => array(
              'class'           => 'dropdown dropdown-hover-1 menu-flex',                      
          ), 
          'level_0_a_submenu'       => array(
              'class'           => 'dropdown-toggle dropdown-toggle-1',
              'data-toggle'     => 'dropdown',
              'role'            => 'button',
              'aria-expanded'   => 'false',
          ),
          'level_0_ul_submenu'      =>  array(
              'class'           => 'dropdown-menu dropdown-menu-1',
          ),
          /**
           * level 1 attributes and values without submenu
           *
           * @return void
           */
          'level_1_li'            =>  array(
              'class'   =>  '',
          ), 
          'level_1_a'             =>  array(
              'class'   => '',
          ),                  
          /**
           * level 1 attributes and values with submenu
           *
           * @return void
           */
          'level_1_li_submenu'     =>  array(
              'class'   => 'dropdown-hover-2',
          ),
          'level_1_a_submenu'      =>  array(
              'class'   => 'trigger right-caret',
          ),
          'level_1_ul_submenu'     =>  array(
              'class'   => 'dropdown-menu dropdown-menu-2 sub-menu',
          ),
          /**
           * level 2 attributes and values without submenu
           *
           * @return void
           */
          'level_2_li'            =>  array(
              'class'   =>  '',
          ),
          'level_2_a'             =>  array(
              'class'   =>  '',
          ),
        ) 
      );                
      ?>               
    </div>
  </div>          
</nav>

```
