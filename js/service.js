$(function(){
    var dlgModal = $('#dlg-modal');
    dlgModal.on('show.bs.modal', function(e){
        var button = $(e.relatedTarget);

        var title = dlgModal.find('.modal-title');
        var body = dlgModal.find('.modal-body');
        var form = dlgModal.find('form');
        var hidden = dlgModal.find('input[name="hidden"]');

        var _action = button.data('action');
        var _hidden = button.data('hidden');
        var _title = button.data('title');
        var _body = button.data('body')[0]=='#' ? $(button.data('body')).html() : button.data('body');

        title.html(_title);
        body.html(_body);
        form.attr('action', _action);
        hidden.val(_hidden);
    });

    $('.task-get form').on('submit', function(e){
        $('.task-get form input[name="task[text]"]').val($('.task-get form .editable').html());
    });
});

