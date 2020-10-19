<div id="{{ $id }}" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Внимание!</h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">Операцию обмена промокодов на скидку отменить нельзя. Продолжить?</div>
            <!-- Футер модального окна -->
            <div class="modal-footer">
                <form method="POST" action="{{ url('/codes/add-discount') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="value" value="{{ $value }}">
                    <button type="submit" class="btn btn-default">Да</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
                </form>
            </div>
        </div>
    </div>
</div>