import $ from 'jquery';

export default class ModalConfirm {
    static initModalConfirm() {
        $(document).on('click', 'a[data-confirm-message]', (e) => {
            e.preventDefault();
            const element = $(e.currentTarget);
            const $modal = $('#modal-confirm');

            $modal.find('.modal-body').html(element.attr('data-confirm-message'));
            $modal.find('.modal-footer a').attr('href', element.attr('href'));
            $modal.modal('show');
        });
    }
}
