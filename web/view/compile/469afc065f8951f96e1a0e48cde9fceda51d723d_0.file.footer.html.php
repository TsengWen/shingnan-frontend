<?php
/* Smarty version 3.1.28, created on 2018-02-05 16:29:03
  from "C:\xampp\htdocs\frontend_shingnan\web\view\common\footer.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5a78783f5acba1_16803003',
  'file_dependency' => 
  array (
    '469afc065f8951f96e1a0e48cde9fceda51d723d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frontend_shingnan\\web\\view\\common\\footer.html',
      1 => 1517843015,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a78783f5acba1_16803003 ($_smarty_tpl) {
?>
<!-- footer -->
<footer class="bg-gray p-3">
    <div class="d-flex justify-content-around align-items-center">
        <img src="../img/logo_2.png" style="height: 90px;">
        <span style="color: #ffffff; font-size: 20px;">【長榮店】
            <br>地址: 台南市東區長榮路三段6號
            <br>TEL: (06) 235-1007</span>
        <span style="color: #ffffff; font-size: 20px;">【永康店】
            <br>地址: 台南市永康區中山南路153號
            <br>TEL: (06) 2011-281</span>
    </div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php echo '<script'; ?>
 src="../plugins/jquery/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/tether/js/tether.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../plugins/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 100) {        // If page is scrolled more than 100px
                $('#go-top-btn').fadeIn(200);    // Fade in the arrow
            } else {
                $('#go-top-btn').fadeOut(200);   // Else fade out the arrow
            }
        });

        $('#go-top-btn').click(function () {      // When arrow is clicked
            $('body, html').animate({
                scrollTop: 0                       // Scroll to top of body
            }, 500);
        });
    });
<?php echo '</script'; ?>
><?php }
}
