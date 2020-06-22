function showLoadingPortlet(strId) {
    var objPortlet = new KTPortlet(strId);

    KTApp.block(objPortlet.getSelf(), {
        overlayColor: '#ffffff',
        type: 'loader',
        state: 'brand',
        opacity: 0.5,
        size: 'lg'
    });
}

function hideLoadingPortlet(strId) {
    var objPortlet = new KTPortlet(strId);

    KTApp.unblock(objPortlet.getSelf());
}

function showAlertDeleteRegister(strRoute) {
    swal.fire({
        title: 'Você tem certeza?',
        text: 'O registro será excluído e não poderá ser revertido!',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sim, exclua-o!'
    }).then(function(objResult) {
        if (objResult.value) {
            $('#delete-register').attr('action', strRoute).submit();
            /*swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )*/
        }
    });
}
