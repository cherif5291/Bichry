<div class="d-flex justify-content-center ">

    <div class="card-body pb-0">
        <div class=" col-md-12 d-flex justify-content-center">

            <div class="col-md-3 p-3 m-1  card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                <div>
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.invoices')}}
                        ({{getFactures()->where('type', "facture")->count()}})</h6>
                    <h3 class="fw-normal text-700" style="color: white !important"> {!!
                        formatpriceth(getFactures()->where('type', "facture")->sum('total'), getCurrency()) !!}</h3>
                </div>
            </div>

            <div class="col-md-3 p-3 m-1 card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                <div>
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.receipts')}}
                        ({{getFactures()->where('type', "recu")->count()}})</h6>
                    <h3 class="fw-normal text-700" style="color: white !important">{!!
                        formatpriceth(getFactures()->where('type', "recu")->sum('total'), getCurrency()) !!} </h3>
                </div>
            </div>
            <div class="col-md-3 p-3 m-1 card h-100 bg-success" style="width: 24.4% !important">
                <div>
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.payments')}}</h6>
                    <h3 class="fw-normal text-700" style="color: white !important"> {!!
                        formatpriceth(getReglements()->sum('montant_recu'), getCurrency()) !!}</h3>
                </div>
            </div>
            <div class="col-md-3 p-3 m-1 card h-100 bg-danger" style="width: 24.4% !important">
                <div>
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.amount_due')}}</h6>
                    <h3 class="fw-normal text-700" style="color: white !important"> {!!
                        formatpriceth((getFactures()->sum('total') - getReglements()->sum('montant_recu')),
                        getCurrency()) !!}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
