<div class="d-flex justify-content-center ">
    <div class="card-body pb-0">
        <div class=" col-md-12 d-flex justify-content-center">

            <div class="col-md-3 p-3 m-1  card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                <div>
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.invoice_to_pay')}}
                        ({{$Depenses->where('type', "facture")->count()}})</h6>
                    <h3 class="fw-normal text-700" style="color: white !important">{!!
                        formatpriceth($Depenses->where('type', "facture")->sum('total'), getCurrency()) !!}</h3>
                </div>
            </div>

            <div class="col-md-3 p-3 m-1 card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                <div>
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.expense')}}
                        ({{$Depenses->where('type', "depense")->count()}})</h6>
                    <h3 class="fw-normal text-700" style="color: white !important">{!!
                        formatpriceth($Depenses->where('type', "depense")->sum('total'), getCurrency()) !!}</h3>
                </div>
            </div>

            <div class="col-md-3 p-3 m-1 card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                <div>
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.check')}}
                        ({{$Depenses->where('type', "cheque")->count()}})</h6>
                    <h3 class="fw-normal text-700" style="color: white !important">{!!
                        formatpriceth($Depenses->where('type', "cheque")->sum('total'), getCurrency()) !!}</h3>
                </div>
            </div>

            <div class="col-md-3 p-3 m-1 card h-100 bg-line-chart-gradient" style="width: 24.4% !important">
                <div>
                    <h6 class="text-700 text-white" style="color: white">{{__('messages.vendor_credit')}}
                        ({{$Depenses->where('type', "credit")->count()}})</h6>
                    <h3 class="fw-normal text-700" style="color: white !important">{!!
                        formatpriceth($Depenses->where('type', "credit")->sum('total'), getCurrency()) !!}</h3>
                </div>
            </div>


        </div>
    </div>
</div>
