<?php
/**
 * Created by PhpStorm.
 * User: aabweber
 * Date: 16/01/2020
 * Time: 17:26
 */
use core\Site;
/**@var Site $this */
?>
<div class="tr">
    <div class="td footer">
        <div class="container">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="dlg-modal" tabindex="-1" role="dialog" aria-labelledby="dlg-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dlg-modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="get">
                <input type="hidden" name="hidden">
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo _l(L::mainClose);?></button>
                    <button type="submit" class="btn btn-primary submit"><?php echo _l(L::mainOK);?></button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
