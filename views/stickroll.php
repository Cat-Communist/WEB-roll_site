<?php 
    $is_image = preg_match("#^/stickroll/image#", $url);
    $is_info = preg_match("#^/stickroll/info#", $url);
?>

<p>Стикролл</p>
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link <?= $is_image ? "active" : '' ?>" aria-current="page" href="/stickroll/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= $is_info ? "active" : '' ?>" href="/stickroll/info">Описание</a>
  </li>
</ul>

<?php
    if ($is_image) {
        require "../views/stickroll_image.php";
    } else if ($is_info) {
        require "../views/stickroll_info.php";
    }
?>