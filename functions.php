<?php
function print_asset($path) {
  echo file_get_contents(get_template_directory_uri() . $path);
}
add_action('after_setup_theme', 'assomast_setup');
function assomast_setup()
{
  load_theme_textdomain('assomast', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('automatic-feed-links');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form'));
  global $content_width;
  if (!isset($content_width)) {
    $content_width = 1920;
  }
  register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'assomast')));
}
add_action('wp_enqueue_scripts', 'assomast_load_scripts');
function assomast_load_scripts()
{
  $random = rand(1, 1000000); // remove in production to enable caching of custom styles
  wp_enqueue_style('assomast-style', get_stylesheet_uri());
  wp_enqueue_style('assomast', get_template_directory_uri() . '/assomast.css', [], $random);
  wp_enqueue_script('jquery');
}
add_action('wp_footer', 'assomast_footer_scripts');
function assomast_footer_scripts()
{
?>
  <script>
    jQuery(document).ready(function($) {
      var deviceAgent = navigator.userAgent.toLowerCase();
      if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios");
        $("html").addClass("mobile");
      }
      if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");
      } else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
      } else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
      } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
      } else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
      }
    });
  </script>
<?php
}
add_filter('document_title_separator', 'assomast_document_title_separator');
function assomast_document_title_separator($sep)
{
  $sep = '|';
  return $sep;
}
add_filter('the_title', 'assomast_title');
function assomast_title($title)
{
  if ($title == '') {
    return '...';
  } else {
    return $title;
  }
}
add_filter('the_content_more_link', 'assomast_read_more_link');
function assomast_read_more_link()
{
  if (!is_admin()) {
    return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
  }
}
add_filter('excerpt_more', 'assomast_excerpt_read_more_link');
function assomast_excerpt_read_more_link($more)
{
  if (!is_admin()) {
    global $post;
    return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
  }
}
add_filter('intermediate_image_sizes_advanced', 'assomast_image_insert_override');
function assomast_image_insert_override($sizes)
{
  unset($sizes['medium_large']);
  return $sizes;
}
add_action('widgets_init', 'assomast_widgets_init');
function assomast_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Sidebar Widget Area', 'assomast'),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
}
add_action('wp_head', 'assomast_pingback_header');
function assomast_pingback_header()
{
  if (is_singular() && pings_open()) {
    printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
  }
}
add_action('comment_form_before', 'assomast_enqueue_comment_reply_script');
function assomast_enqueue_comment_reply_script()
{
  if (get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
function assomast_custom_pings($comment)
{
?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter('get_comments_number', 'assomast_comment_count', 0);
function assomast_comment_count($count)
{
  if (!is_admin()) {
    global $id;
    $get_comments = get_comments('status=approve&post_id=' . $id);
    $comments_by_type = separate_comments($get_comments);
    return count($comments_by_type['comment']);
  } else {
    return $count;
  }
}
