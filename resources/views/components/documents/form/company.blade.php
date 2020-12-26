<div class="accordion">
    <div class="card border-1 box-shadow-none">
        <div class="card-header background-none collapsed" id="accordion-company-header" data-toggle="collapse" data-target="#accordion-company-body" aria-expanded="false" aria-controls="accordion-company-body">
            <h4 class="mb-0">{{ trans_choice('general.companies', 1) }}</h4>
        </div>

        <div id="accordion-company-body" class="collapse hide" aria-labelledby="accordion-company-header">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        @if (!$hideLogo)
                            {{ Form::fileGroup('company_logo', trans('settings.company.logo'), 'file-image-o', [], setting('company.logo')) }}
                        @endif
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        @if (!$hideDocumentTitle)
                            {{ Form::textGroup($inputNameType . '_title', trans('settings.' . $type . '.title'), 'font', [], setting($type . '.title'), 'col-md-12') }}
                        @endif

                        @if (!$hideDocumentSubheading)
                            {{ Form::textGroup($inputNameType . '_subheading', trans('settings.' . $type . '.subheading'), 'font', [], setting($type . '.subheading'), 'col-md-12') }}
                        @endif

                        @if (!$hideCompanyEdit)
                            <akaunting-company-edit company-id="{{ session('company_id') }}"
                            button-text="{{ trans('Edit your business address') }}"
                            taxt-number-text="{{ trans('general.tax_number') }}"
                            :company="{{ json_encode($company) }}"
                            :company-form="{{ json_encode([
                                'show' => true,
                                'text' => trans('Edit your business address'),
                                'buttons' => [
                                    'cancel' => [
                                        'text' => trans('general.cancel'),
                                        'class' => 'btn-outline-secondary'
                                    ],
                                    'confirm' => [
                                        'text' => trans('general.save'),
                                        'class' => 'btn-success'
                                    ]
                                ]
                            ])}}"
                            ></akaunting-company-edit>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
