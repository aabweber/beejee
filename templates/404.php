<?php
use core\Site;
/**@var Site $this */
$this->setTitle('404 Страница не найдена - TikTool');
$this->setKeywords('tikTool,404');
$this->setDescription('Запрашиваемая страница не найдена, проверьте правильность адреса');
echo '
    <div class="row block">
        <div class="col block-inner">
            <div class="title">Страница не найдена - 404<hr></div>
            Запрашиваемая страница не существует. Проверьте правильность запроса.
        </div>
    </div>
';