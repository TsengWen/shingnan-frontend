<?php
/* Smarty version 3.1.28, created on 2018-02-09 15:41:27
  from "C:\xampp\htdocs\shingnan-frontend\web\view\buy.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5a7db31760b833_73645432',
  'file_dependency' => 
  array (
    'c35d3b69a3d8adc8ad9bcdffb746da5ceb473ae9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shingnan-frontend\\web\\view\\buy.html',
      1 => 1518186375,
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
function content_5a7db31760b833_73645432 ($_smarty_tpl) {
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
        <img class="img-fluid p-5" src="../img/cover.png" alt="Big img">
        <div class="buy-class">選品牌</div>
        <div class="row mx-auto mb-3" style="width: 70%;">
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="w-100"></div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="w-100"></div>
            <div class="col" style="text-align: right; padding-top: 5px; padding-bottom: 5px;">
                <a class="btn btn-warning" href="#">...more</a>
            </div>
        </div>
        <?php
$_from = $_smarty_tpl->tpl_vars['styles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_style_0_saved_item = isset($_smarty_tpl->tpl_vars['style']) ? $_smarty_tpl->tpl_vars['style'] : false;
$_smarty_tpl->tpl_vars['style'] = new Smarty_Variable();
$__foreach_style_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_style_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['style']->value) {
$__foreach_style_0_saved_local_item = $_smarty_tpl->tpl_vars['style'];
?>
        <div class="buy-class"><?php echo $_smarty_tpl->tpl_vars['style']->value['styleName'];?>
</div>
        <div class="row mx-auto mb-3" style="width: 70%;">
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="w-100"></div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="col" style="padding: 5px;">
                <img class="rounded" src="../img/01.jpg" style="width: 100%;">
            </div>
            <div class="w-100"></div>
            <div class="col" style="text-align: right; padding-top: 5px; padding-bottom: 5px;">
                <a class="btn btn-warning" href="javascript:">...more</a>
            </div>
        </div>
        <?php
$_smarty_tpl->tpl_vars['style'] = $__foreach_style_0_saved_local_item;
}
}
if ($__foreach_style_0_saved_item) {
$_smarty_tpl->tpl_vars['style'] = $__foreach_style_0_saved_item;
}
?>
        <!-- got top button -->
        <button id="go-top-btn">TOP</button>
    </div>
    <!-- footer -->
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>

</html><?php }
}
