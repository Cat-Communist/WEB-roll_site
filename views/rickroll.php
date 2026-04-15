<?php
    $is_image = preg_match("#^/rickroll/image#", $url);
    $is_info = preg_match("#^/rickroll/info#", $url);
?>

<p>Рикролл</p>

<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link {{title == "Рикролл" ? "active"}}" aria-current="page" href="/rickroll/image">Картинка</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{title == "active" ? "active"}}" href="/rickroll/info">Описание</a>
  </li>
</ul>

<?php if ($is_image) {
    require "../views/rickroll_image.php";
} else if ($is_info) { 
    require "../views/rickroll_info.php";
} ?>