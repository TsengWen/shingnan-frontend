<?php
/* Smarty version 3.1.28, created on 2018-02-06 17:09:35
  from "C:\xampp\htdocs\shingnan-frontend\web\view\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5a79d33f65eb88_72282369',
  'file_dependency' => 
  array (
    '7d7ea52cbdfa43516b3362bcc2daf490c558ecdb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shingnan-frontend\\web\\view\\index.html',
      1 => 1517933313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/resource.html' => 1,
    'file:common/navigationbar.html' => 1,
    'file:common/footer.html' => 1,
  ),
),false)) {
function content_5a79d33f65eb88_72282369 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common/resource.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>

<body>
  <div class="container-fluid content p-0">
    <!-- navigationbar -->
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common/navigationbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- main-content -->
    <!-- carousel -->
    <div id="carouselCover" class="carousel slide mw-100" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['images']->value['index_img_0'];?>
">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['images']->value['index_img_1'];?>
">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['images']->value['index_img_2'];?>
">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselCover" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselCover" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- image navbar -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-light2 d-flex justify-content-around">
      <div id="navbarImg">
        <div class="navbar-nav">
          <a class="nav-item nav-link mx-5" href="javascript:" style="color: black;">ABOUT US</a>
          <a class="nav-item nav-link mx-5" href="javascript:" style="color: black;">WHAT'S NEWS</a>
          <a class="nav-item nav-link mx-5" href="javascript:" style="color: black;">BRAND</a>
          <a class="nav-item nav-link mx-5" href="buyController.php?action=view" style="color: black;">BUY</a>
          <a class="nav-item nav-link mx-5" href="javascript:" style="color: black;">EDUCATION</a>
        </div>
      </div>
    </nav>
    <!-- image gallery -->
    <div class="row-cus">
      <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 22+1 - (3) : 3-(22)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 3, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
      <div class="column">
        <img src="<?php if ($_smarty_tpl->tpl_vars['images']->value[('index_img_').($_smarty_tpl->tpl_vars['i']->value)]) {
echo $_smarty_tpl->tpl_vars['images']->value[('index_img_').($_smarty_tpl->tpl_vars['i']->value)];
} else { ?>../img/01.jpg<?php }?>" style="width: 100%;">
        <div class="gallery-overlay">
          <p class="gallery-text">Welcome to the Jungle!</p>
        </div>
      </div>
      <?php }
}
?>

    </div>
    <!-- got top button -->
    <button id="go-top-btn">TOP</button>
  </div>
  <!-- footer -->
  <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>

</html><?php }
}
