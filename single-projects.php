<?php
/**
 * The template for displaying all project posts
 *
 * Displays all of the head element and everything up until the "page-content" div.
 *
 * @package WordPress
 * @subpackage Molecule
 * @since Molecule 1.0
 */

?>
<?php get_template_part( 'template-parts/head', 'meta' ); ?>

    <body <?php body_class(); ?> >
    
    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'molecule' ); ?></a>

        <header id="masthead" class="header-global">

            <?php if ( is_active_sidebar( 'topbar-left' ) || is_active_sidebar( 'topbar-right' ) )  : ?>

            <div id="molecule-topbar">
                
                <div class="grid">

                    <div class="row">

                        <div class="c6">

                            <div class="topbar-left">

                                <?php dynamic_sidebar( 'topbar-left' ); ?>

                            </div><!-- end .topbar-left -->
                            
                        </div><!-- end .c6 -->

                        <div class="c6">

                            <div class="topbar-right">
                                
                                <?php dynamic_sidebar( 'topbar-right' ); ?>

                            </div><!-- end .topbar-right -->
                            
                        </div><!-- end .c6 -->

                    </div><!-- end .row -->

                </div><!-- end .grid -->

            </div><!-- end #molecule-topbar -->

            <?php endif; ?>

                <?php if ( get_header_image() ) : ?>

                <?php
                    /**
                     * Filter the default molecule custom header sizes attribute.
                     *
                     * @since Molecule 1.0
                     *
                     * @param string $custom_header_sizes sizes attribute
                     * for Custom Header. Default '(max-width: 709px) 85vw,
                     * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
                     */
                    $custom_header_sizes = apply_filters( 'molecule_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
                ?>

            <div class="header-top" style="background:url('<?php header_image(); ?>')">

        <?php else : ?>

            <div class="header-top">
                        
            <?php endif; // End header image check. ?>

                <div class="grid">

                    <div class="row">
                        
                        <div class="c12">
                        
                            <div class="logo">

                                <?php molecule_the_custom_logo(); ?>

                                <?php if ( display_header_text() ) {
       
                                if ( is_front_page() && is_home() ) : ?>
                                 
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                
                                    <?php else : ?>
                                       
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    
                                    <?php endif;

                                    $description = get_bloginfo( 'description', 'display' );
                                    
                                    if ( $description || is_customize_preview() ) : ?>
                                        <p class="site-description"><?php echo $description; ?></p>
                                    
                                    <?php endif; 

                                } ?>

                            </div><!-- end .logo -->

                        </div><!-- end .c12 -->

                    </div><!-- end .row -->

                </div><!-- end .grid -->

                <div class="main-navigation-row">

                    <div class="grid wfull">

                        <div class="row">
                            
                            <div class="c12">
                        
                                <div class="site-header-main">

                                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                                
                                <button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'molecule' ); ?></button>

                                    <div id="site-header-menu" class="site-header-menu">
                                    
                                        <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'molecule' ); ?>">

                                            <?php
                                                wp_nav_menu( array(
                                                    'theme_location' => 'primary',
                                                    'menu_class'     => 'primary-menu',
                                                 ) );
                                            ?>

                                        </nav><!-- .main-navigation -->

                                    </div><!-- .site-header-menu -->

                                </div><!-- end .site-header-main -->

                                <?php endif; ?><!-- end has_nav_menu -->

                            </div><!-- end .c12 -->

                        </div><!-- end .row -->

                    </div><!-- end .grid -->

                </div><!-- main nav row -->

            </div><!-- end .header-top -->

            </div><!-- for interior pages -->
            
            <?php if ( !is_front_page() ) : ?><!-- if an interior page -->

            <div class="grid wfull">

                <div class="row">

                    <div class="custom-header">

                        <div class="header-pattern"></div>

                            <?php 

                                // If the current page is a static page or post
                                if ( is_singular('projects') ) {

                                if ( has_post_thumbnail() ) {

                                 the_post_thumbnail( 'header-image', array( 'alt' => the_title_attribute( 'echo=0' ), 'class' => "custom-header-image" ) ); 

                                } else {  
                                    $image = get_template_directory_uri() .'/assets/img/header_placeholder.png'; 
                                    $alt = get_bloginfo( 'description' );
                                    echo '<img src="'.$image.'" alt="'.$alt.'" />';
                                }
                               
                            } ?>

                            <?php if ( is_singular('projects') ) { ?>

                            <div class="custom-headings">

                                <div class="custom-headings-inner">

                                    <h1 class="page-title"><span class="entry-title"><?php the_title(); ?></span></h1>
                                    
                                </div>
                                
                            </div><!-- end .custom-headings -->

                            <?php } ?>    

                    </div><!-- end .custom-header -->        

                </div><!-- end .row -->

            </div><!-- end .grid -->

            <?php endif; ?>

        </header><!-- end .header-global -->
       
        <main class="page-content">

            <div class="grid wfull">

                <div class="row">

                    <div class="c12">

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <div class="entry-content">

                                <?php

                                    the_content();

                                    wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'molecule' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span>',
                                        'link_after'  => '</span>',
                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'molecule' ) . ' </span>%',
                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                    ) );

                                ?>

                            </div><!-- .entry-content -->

                            <footer class="entry-footer">

                                <?php
                                    edit_post_link(
                                        sprintf(
                                            /* translators: %s: Name of current post */
                                            __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'molecule' ),
                                            get_the_title()
                                        ),
                                        '<span class="edit-link">',
                                        '</span>'
                                    );
                                ?>

                            </footer><!-- .entry-footer -->

                        </article><!-- #post-## -->

                    </div><!-- end .c12 -->

                </div><!-- end .row -->

            </div><!-- end .grid .wfull -->

<?php get_footer(); ?>