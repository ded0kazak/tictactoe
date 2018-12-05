<html>
<head>
<link href = "http://tictac/views/style.css" rel="stylesheet">
</head>
<body>




<?php if(isset($params['winner'])) echo "<pre> " . $params['winner'] . "</pre><script src='http://tictac/views/canvas.js'></script>"?>
        <pre><a href="/">Начать заново</a></pre>
<div id="field">
    <form method="post">
        <?php foreach ($params['collection']->getItems() as $item):?>
            <?php if ($item->getPosition() % sqrt(count($params['collection']->getItems())) == 1) echo "<div>"?>
            <div class="line"><input type = 'submit' class = "<?=$item->getName()?>" name="puzzle" value = <?=$item->getPosition()?> ></div>
            <?php if ($item->getPosition() % sqrt(count($params['collection']->getItems())) == 0) echo "</div>"?>
        <?php endforeach; ?>
    </form>
</div>



</body>
</html>