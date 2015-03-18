<?php
/* @var $this MonitorController */
/* @var $projects \Project[] */
?>
<h1>Монитор проектов</h1>
<style>
    #monitor .data{
        float: left;
        width: 65%;
        text-align: justify;
    }
    #monitor .legend{
        float: right;
        width: 30%;
    }
    #monitor .item{
        border:1px solid grey;
        padding: 0px 5px;
        border-radius: 3px;
    }
    #monitor .item.code-301{
        background-color: green;
        color:white;
    }
    #monitor .item.code-404{
        background-color: red;
        color:white;
    }
    #monitor .item.code-403{
        background-color: yellow;
    }
    #monitor .item.code-504{
        background-color: red;
        color:white;
        font-weight: bold;
    }
</style>
<div id="monitor">
    <div class="data">
        <?php foreach ($projects as $project) { ?>
            <span class="item code-<?= $project->siteHelper->httpCode ?>"><?= $project ?></span>
        <?php } ?>
    </div>
    <div class="legend">
        <ul>
            <li><span class="item">Доступен</span></li>
            <li><span class="item code-301">Переехал</span></li>
            <li><span class="item code-404">Страница не найдена</span></li>
            <li><span class="item code-403">Заблокирован</span></li>
            <li><span class="item code-504">Сервер не отвечает</span></li>
        </ul>
    </div>
</div>

