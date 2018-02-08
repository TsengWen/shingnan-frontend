<?php
/* Smarty version 3.1.28, created on 2018-02-06 17:09:34
  from "C:\xampp\htdocs\shingnan-frontend\web\view\buy.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5a79d33e4efc11_78776490',
  'file_dependency' => 
  array (
    'c35d3b69a3d8adc8ad9bcdffb746da5ceb473ae9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shingnan-frontend\\web\\view\\buy.html',
      1 => 1517933034,
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
function content_5a79d33e4efc11_78776490 ($_smarty_tpl) {
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
        <div class="buy-class">經典復古</div>
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
        <!-- got top button -->
        <button id="go-top-btn">TOP</button>
    </div>
    <!-- footer -->
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>

</html><?php }
}
