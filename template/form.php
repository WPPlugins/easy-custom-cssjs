<?php
if (!defined('ABSPATH'))
       exit; // 

if (!current_user_can('manage_options'))
       return;

if ($_POST) {
       $retrieved_nonce = $_REQUEST['_wpnonce'];
       if (!wp_verify_nonce($retrieved_nonce, 'spcc_form_submit_action'))
              die('Failed security check');
}
if (isset($_POST['main_custom_style'])) {

       $main_custom_style = $_POST['main_custom_style'];
       spcc_set_custom_css($main_custom_style);
       $success = true;
}

if (isset($_POST['main_custom_style_lg'])) {
       $main_custom_style = $_POST['main_custom_style_lg'];
       spcc_set_custom_css($main_custom_style, 'lg');
       $success = true;
}

if (isset($_POST['main_custom_style_md'])) {
       $main_custom_style = $_POST['main_custom_style_md'];
       spcc_set_custom_css($main_custom_style, 'md');
       $success = true;
}

if (isset($_POST['main_custom_style_sm'])) {
       $main_custom_style = $_POST['main_custom_style_sm'];
       spcc_set_custom_css($main_custom_style, 'sm');
       $success = true;
}

if (isset($_POST['main_custom_style_xs'])) {
       $main_custom_style = $_POST['main_custom_style_xs'];
       spcc_set_custom_css($main_custom_style, 'xs');
       $success = true;
}


if (isset($_POST['main_custom_style_less'])) {
       $main_custom_style = $_POST['main_custom_style_less'];
       spcc_set_custom_css($main_custom_style, 'less');
       $success = true;
}

if (isset($_POST['main_custom_style_sass'])) {
       $main_custom_style = $_POST['main_custom_style_sass'];
       spcc_set_custom_css($main_custom_style, 'sass');
       $success = true;
}
if (isset($_POST['main_custom_js'])) {
       $main_custom_style = '"' . $_POST['main_custom_js'] . '"';
       spcc_set_custom_css($main_custom_style, 'js');
       $success = true;
}

if (isset($_POST['main_custom_js_footer'])) {
       $main_custom_style = '"' . $_POST['main_custom_js_footer'] . '"';
       spcc_set_custom_css($main_custom_style, 'footer_js');
       $success = true;
}

if (isset($success)) {
       ?>
       <div class="updated">
           <p>
               <strong>Changes have been saved.</strong>
           </p>
       </div>
       <?php
}

$custom_css = esc_textarea(spcc_get_custom_css());
$custom_css_lg = esc_textarea(spcc_get_custom_css('lg'));
$custom_css_md = esc_textarea(spcc_get_custom_css('md'));
$custom_css_sm = esc_textarea(spcc_get_custom_css('sm'));
$custom_css_xs = esc_textarea(spcc_get_custom_css('xs'));

$custom_css_less = esc_textarea(spcc_get_custom_css('less'));
$custom_css_sass = esc_textarea(spcc_get_custom_css('sass'));
$custom_js = esc_textarea(trim(spcc_get_custom_css('js'), '"'));
$custom_js_footer = esc_textarea(trim(spcc_get_custom_css('footer_js'), '"'));

$current_tab = 'main';

if ($_REQUEST['tab'] == 'responsive')
       $current_tab = 'responsive';

if ($_REQUEST['tab'] == 'less')
       $current_tab = 'less';

if ($_REQUEST['tab'] == 'sass')
       $current_tab = 'sass';

if ($_REQUEST['tab'] == 'js')
       $current_tab = 'js';

$url = esc_url(menu_page_url('spcc_custom_css', FALSE));
?><div class="wrap sppc_wrap">

    <h2 id="main-title">Custom CSS/js </h2>
    <h2 class="nav-tab-wrapper woo-nav-tab-wrapper sppc_tab">
        <a href="<?php echo $url; ?>&tab=main" class="nav-tab<?php echo $current_tab == 'main' ? ' nav-tab-active' : ''; ?>">General Style</a>
        <a href="<?php echo $url; ?>&tab=responsive" class="nav-tab<?php echo $current_tab == 'responsive' ? ' nav-tab-active' : ''; ?>">Responsive</a>
        <a href="<?php echo $url; ?>&tab=less" class="nav-tab<?php echo $current_tab == 'less' ? ' nav-tab-active' : ''; ?>">LESS</a>
        <a href="<?php echo $url; ?>&tab=sass" class="nav-tab<?php echo $current_tab == 'sass' ? ' nav-tab-active' : ''; ?>">SASS</a>
        <a href="<?php echo $url; ?>&tab=js" class="nav-tab<?php echo $current_tab == 'js' ? ' nav-tab-active' : ''; ?>">Javascript</a>
    </h2>

    <?php if ($current_tab == 'main'): ?>

           <form method="post">
               <h4>
                   <small>
                       For all Screen
                   </small>

                   General Stylesheet
               </h4>
               <?php wp_nonce_field('spcc_form_submit_action'); ?>
               <div id="editor" class="mh200"><?php echo $custom_css; ?></div>
               <input type="hidden" id="spcc_style" name="main_custom_style" value=""><br>
               <button type="submit" class="button button-primary save" name="save_changes">Save Changes</button>
           </form>


    <?php elseif ($current_tab == 'responsive'): ?>
           <h3>Targeting custom screen sizes</h3>
           <form method="post">
               <?php wp_nonce_field('spcc_form_submit_action'); ?>
               <h4>
                   <small>
                       Minimum Screen Size: <strong>1200px</strong>
                   </small>

                   LG - Large Screen
               </h4>

               <div id="editor_lg" class="mh200"><?php echo $custom_css_lg; ?></div>
               <input type="hidden" id="spcc_style_lg" name="main_custom_style_lg" value=""><br>

               <h4>
                   <small>
                       Minimum Screen Size: <strong>992px</strong>
                   </small>

                   MD - Medium Screen
               </h4>
               <div id="editor_md" class="mh200"><?php echo $custom_css_md; ?></div>
               <input type="hidden" id="spcc_style_md" name="main_custom_style_md" value=""><br>

               <h4>
                   <small>
                       Minimum Screen Size: <strong>768px</strong>
                   </small>

                   SM - Small Screen
               </h4>

               <div id="editor_sm" class="mh200"><?php echo $custom_css_sm; ?></div>
               <input type="hidden" id="spcc_style_sm" name="main_custom_style_sm" value=""><br>


               <h4>
                   <small>
                       Maximum Screen Size: <strong>768px</strong>
                   </small>

                   XS - Extra Small Screen
               </h4>

               <div id="editor_xs" class="mh200"><?php echo $custom_css_xs; ?></div>
               <input type="hidden" id="spcc_style_xs" name="main_custom_style_xs" value=""><br>

               <button type="submit" class="button button-primary save" name="save_changes">Save Changes</button>
           </form>
    <?php elseif ($current_tab == 'less'): ?>
           <!--<h3>Apply your own style in <a href="http://www.lesscss.org/" target="_blank">LESS</a> language</h3>-->

           <form method="post">
               <h4>

                   Enter "LESS" here
               </h4>
               <?php wp_nonce_field('spcc_form_submit_action'); ?>
               <div id="editor_less" class="mh200"><?php echo $custom_css_less; ?></div>
               <input type="hidden" id="spcc_style_less" name="main_custom_style_less" value=""><br>
               <button type="submit" class="button button-primary save" name="save_changes">Save Changes</button>
           </form>

    <?php elseif ($current_tab == 'sass'): ?>
           <!--<h3>Apply your own style in <a href="http://sass-lang.com/" target="_blank">SASS</a> language</h3>-->

           <form method="post">
               <h4>

                   Enter "SASS" here
               </h4>
               <?php wp_nonce_field('spcc_form_submit_action'); ?>
               <div id="editor_sass" class="mh200"><?php echo $custom_css_sass; ?></div>
               <input type="hidden" id="spcc_style_sass" name="main_custom_style_sass" value=""><br>
               <button type="submit" class="button button-primary save" name="save_changes">Save Changes</button>
           </form>

    <?php elseif ($current_tab == 'js'): ?>


           <form method="post">
               <h4>
                   Enter Custom JS here
                   <small>
                      Add Without document.ready wrap
                   </small>
               </h4><br>
               <?php wp_nonce_field('spcc_form_submit_action'); ?>
               <h4><b> Add Js in Header </b></h4>
               <div id="editor_js" class="mh200"><?php echo $custom_js; ?></div>
               <input type="hidden" id="spcc_style_js" name="main_custom_js" value=""><br>
               <h4><b> Add Js in Footer </b></h4>
               <div id="editor_js_footer" class="mh200"><?php echo $custom_js_footer; ?></div>
               <input type="hidden" id="spcc_style_js_footer" name="main_custom_js_footer" value=""><br>
               <button type="submit" class="button button-primary save" name="save_changes">Save Changes</button>
           </form>

    <?php endif; ?>

</div>
<div class="spcc_promo text-center clearfix">
    <div class="col-md-5">
        <h2>Find all shortcut <a href="https://ace.c9.io/demo/keyboard_shortcuts.html">Here</a> for editor.</h2>
        <h2>Don't Forget to Rate Me!!. <a href="https://wordpress.org/support/view/plugin-reviews/easy-custom-cssjs">Click Here</a></h2>
        <h2>Get more Detail about this plugin. <a href="http://sunilprajapati.in/easy-custom-cssjs/">Click Here</a></h2>
        <h2>FindOut My Other plugins. <a href="https://profiles.wordpress.org/sunil25393#content-plugins">Click Here</a></h2>
    </div>
    <div class="col-md-3">
        <h2>
            <a href="https://wordpress.org/plugins/woo-donation/"> Donation Plugin For Woocommerce</a></h2>
        <a href="https://wordpress.org/plugins/woo-donation/">
            <img src="http://sunilprajapati.in/wp-content/uploads/2016/05/banner-772x250-1.png" alt="woo-donation" style="    width: 100%;">
        </a>
    </div>
    <div class="col-md-3">
        <h2>
            <a href="https://wordpress.org/plugins/filterize-gallery/"> Filterize Gallery</a></h2>
        <a href="https://wordpress.org/plugins/filterize-gallery/">
            <img src="http://sunilprajapati.in/wp-content/uploads/2016/07/banner-772x250.png" alt="woo-donation" style="    width: 100%;">
        </a>
    </div>
</div>


