<?php
/* Smarty version 3.1.28, created on 2018-02-05 16:29:03
  from "C:\xampp\htdocs\frontend_shingnan\web\view\common\navigationbar.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5a78783f596569_70067187',
  'file_dependency' => 
  array (
    'fa79b970cd6132dc0ad6f720d0242b2815229269' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frontend_shingnan\\web\\view\\common\\navigationbar.html',
      1 => 1517844531,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a78783f596569_70067187 ($_smarty_tpl) {
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
                <a class="nav-link nav-link-text" href="javascript:">
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
