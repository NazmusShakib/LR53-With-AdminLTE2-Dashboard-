<div class="row">
    <div class="col-md-12">
        @if(Session::has('message_success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <span id="alert-message">{{ Session::get('message_success') }}</span>
            </div>
        @endif
        @if(Session::has('message_error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                <span id="alert-message-error">{{ Session::get('message_error') }}</span>
            </div>
        @endif
    </div>
</div>