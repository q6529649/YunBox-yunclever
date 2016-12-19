<?php function kadima_scripts() {
    wp_enqueue_style('bootstrap', '//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('default', get_template_directory_uri() . '/css/default.css');
    wp_enqueue_style('animations', '//cdn.bootcss.com/animations/2.1/css/animations.min.css');
    //wp_enqueue_style('theme-animtae', get_template_directory_uri() . '/css/theme-animtae.css');
    wp_enqueue_style('font-awesome', '//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('font-family', get_template_directory_uri() . '/css/font-family.css');
    wp_enqueue_style('nprogress', get_template_directory_uri() . '/css/outdatedbrowser.min.css');
    wp_enqueue_style('nprogress', get_template_directory_uri() . '/css/nprogress.css');
    wp_enqueue_style('base', get_template_directory_uri() . '/css/base.css');
    wp_enqueue_style('jquery.fullpage.min', get_template_directory_uri() . '/css/jquery.fullpage.min.css');
    wp_enqueue_style('feature-carousel', get_template_directory_uri() . '/css/feature-carousel.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    // Js
    wp_enqueue_script('menu', get_template_directory_uri() .'/js/menu.js', array('jquery'));
    wp_enqueue_script('jquery.min', '///cdn.bootcss.com/jquery/3.1.1/jquery.min.js');
    wp_enqueue_script('bootstrap-js', '//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_enqueue_script('kadima-theme-script', get_template_directory_uri() .'/js/kadima_theme_script.js');

    if(is_front_page()){
      wp_enqueue_script('outdatedbrowser.min', get_template_directory_uri() .'/js/outdatedbrowser.min.js');
      wp_enqueue_script('nprogress', get_template_directory_uri() .'/js/nprogress.js');
      wp_enqueue_script('jquery.big-counter', get_template_directory_uri() .'/js/jquery.big-counter.js');
      wp_enqueue_script('jquery.html5Loader.min', get_template_directory_uri() .'/js/jquery.html5Loader.min.js');
      wp_enqueue_script('jquery.easings.min', get_template_directory_uri() .'/js/jquery.easings.min.js');
      wp_enqueue_script('jquery.fullPage.min', get_template_directory_uri() .'/js/jquery.fullPage.min.js');
      wp_enqueue_script('jquery.sudoslider.min', get_template_directory_uri() .'/js/jquery.sudoslider.min.js');
      wp_enqueue_script('jquery.featureCarousel.min', get_template_directory_uri() .'/js/jquery.featureCarousel.min.js');
      wp_enqueue_script('jquery.cloud9carousel.js', get_template_directory_uri() .'/js/jquery.cloud9carousel.js');
    }
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action('wp_enqueue_scripts', 'kadima_scripts');
?>
