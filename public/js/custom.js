

$(document).on("click", ".confirm-modal-button", function (e) {
    const button = $(this);

    const message = button.attr('data-message');
    console.log(message);

    const method = button.attr('data-method') ? button.attr('data-method') : 'post';
    const action = button.attr('data-action');
    const inputRaw = button.attr('data-input');
    const input = inputRaw ? JSON.parse(inputRaw) : {};


    let div = '';
    $.each(input, function (index, value) {
        div += `<input type="hidden" name="${index}" value="${value}">`;
    });

    // Update modal content
    $('#modal-confirm .modal-body').html(message);
    $('#modal-form').attr('method', method).attr('action', action);
    $('#modal-form #customInput').html(div);
    $('#modal-confirm-btn').attr('type', 'submit');
});



function toggleSection(from,to){
    "use strict";
    $(from).hide();
    $(to).show();

}




function notify(type,message) {
    "use strict";
    $(document).Toasts('create', {
        autohide: true,
        delay: 3000,
        class: 'bg-'+type,
        title: 'Notification',
        body: message
    })
}

function remove_readonly(e) {
    "use strict";
    e.removeAttribute('readonly');
}
