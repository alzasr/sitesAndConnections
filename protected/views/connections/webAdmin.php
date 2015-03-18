<?php
/* @var $connection WebAdmin */

if ($connection->url == 'https://cp.beget.ru/') {
    ?>
    <form action="https://cp.beget.ru/login_.php" method="post" target="_blank">
        <input type="hidden" name="name" value="<?= $connection->login ?>" />
        <input type="hidden" name="password" value="<?= $connection->password ?>" />
        <input type="hidden" name="ssl" value="on" />
        <input type="submit" type="button" value="<?= $connection ?>" />
        <input type="hidden" name="submit" />
    </form>
<?php } else { ?>
    <a href="<?= $connection->url ?>" target="_blank"><?= $connection ?></a>
<?php } ?>