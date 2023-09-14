<?php
$title = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ut tempore illum beatae qui eum rerum quam sunt, eveniet esse ducimus perspiciatis sapiente magni placeat recusandae fuga distinctio nostrum voluptates corrupti! Ipsum odio non adipisci officiis nostrum velit quia, at dolores facere illo placeat hic et animi ullam! Impedit in repellat consequatur cumque voluptate eligendi ut modi officia laboriosam ducimus consectetur reiciendis nam consequuntur nihil, excepturi libero molestiae, officiis ex. Sint minima possimus saepe non ut molestias officia impedit hic quo delectus eos dignissimos, amet nihil dolores quis consequuntur dolor suscipit unde magni cumque! Eveniet voluptate assumenda ut nam ipsa? ";
if (strlen($title) < 30) {
  return $title;
} else {

  $new = wordwrap($title, 200);
  $new = explode("\n", $new);

  $new = $new[0] . '...';

  echo $new;
}
