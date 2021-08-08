@if (count($errors) > 0)
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible d-flex align-items-center mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-alert-circle font-32"></i>
                <ul class="mt-3">
                    @foreach ($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible d-flex align-items-center mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-alert-circle font-32"></i>{{ session('error') }}
            </div>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible d-flex align-items-center mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-alert-circle font-32"></i>{{ session('success') }}
            </div>
        </div>
    </div>
@endif

@if (session('warning'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-warning alert-dismissible d-flex align-items-center mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-alert-circle font-32"></i>{{ session('warning') }}
            </div>
        </div>
    </div>
@endif

@if (session('info'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info alert-dismissible d-flex align-items-center mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-alert-circle font-32"></i>{{ session('info') }}
            </div>
        </div>
    </div>
@endif