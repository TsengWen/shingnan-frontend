<?php
/* Smarty version 3.1.28, created on 2018-02-09 15:43:18
  from "C:\xampp\htdocs\shingnan-frontend\web\view\common\navigationbar.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5a7db38617eca7_48198819',
  'file_dependency' => 
  array (
    'f4db1cf89ad89b3743434f4ea6f4b94634568f5c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\shingnan-frontend\\web\\view\\common\\navigationbar.html',
      1 => 1518183360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a7db38617eca7_48198819 ($_smarty_tpl) {
?>
<!-- brand navbar -->
<nav class="navbar navbar-light bg-gray fixed-top">
    <a class="navbar-brand" href="indexController.php?action=view" style="width: 100px;">
        <img src="../img/logo.png" style="width: 99px; height: 37px;">
    </a>
</nav>
<!-- web navbar -->
<nav class="navbar navbar-toggleable-md navbar-light bg-light2 fixed-top fixed-top2">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarLink">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand invisible" href="javascript:">興南</a>
    <div class="collapse navbar-collapse" id="navbarLink">
        <ul class="navbar-nav mx-auto mr-auto">
            <li class="nav-item">
                <a class="nav-link nav-link-text" href="javascript:">
                    <span class="nav-span">ABOUT US</span>
                    <span>關於我們</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-text" href="javascript:">
                    <span class="nav-span">WHAT'S NEWS</span>
                    <span>最新消息</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-text" href="brandController.php?action=view">
                    <span class="nav-span">BRAND</span>
                    <span>品牌介紹</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-text" href="buyController.php?action=view">
                    <span class="nav-span">BUY</span>
                    <span>眼鏡選購</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-text" href="javascript:">
                    <span class="nav-span">EDUCATION</span>
                    <span>衛教專區</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-text" href="javascript:">
                    <span class="nav-span">MEMBERS</span>
                    <span>會員專區</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-text" href="javascript:">
                    <span class="nav-span">CONTACT US</span>
                    <span>聯絡我們</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link nav-link-text" href="javascript:">
                    <span class="nav-span">LOGIN</span>
                    <span>登入</span>
                </a>
            </li>
        </ul>
    </div>
</nav><?php }
}
