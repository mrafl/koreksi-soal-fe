<div>
    <a href="{{ $routeCreate }}" class="btn btn-tigerEyes btn-block">
        <span class="btn-inner--icon">
            <i class="fa fa-plus me-2" aria-hidden="true"></i>
        </span>
        <span class="btn-inner--text">@lang('dashboard.button.add') {{ $entityName }}</span>
    </a>
    <a href="{{ $routeHistory }}" class="btn btn-warning btn-block">
        <span class="btn-inner--icon">
            <i class="fa-solid fa-rotate-right me-2" aria-hidden="true"></i>
        </span>
        <span class="btn-inner--text">@lang('dashboard.button.history') {{ $entityName }}</span>
    </a>
</div>