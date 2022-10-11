@extends('layouts.admin.admin')

@section('content')
<div class="row g-3 mb-3">
    <div class="col-md-6 col-xxl-3">
      <div class="card h-md-100 ecommerce-card-min-width">
        <div class="card-header pb-0">
          <h6 class="mb-0 mt-2 d-flex align-items-center fs-1">Abonnement Actif<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
        </div>
        <div class="card-body d-flex flex-column justify-content-end">
          <div class="row">
            <div class="col">
              <p class="font-sans-serif lh-1 mb-1 fs-8">@if (getAbonnements()->count()<9 ) 0{{getAbonnements()->count()}}   @else {{getAbonnements()->count()}} @endif</p>
            </div>
            <div class="col-auto ps-0">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card h-md-100 ecommerce-card-min-width">
            <div class="card-header pb-0">
              <h6 class="mb-0 mt-2 d-flex align-items-center fs-1">Entreprises<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-end">
              <div class="row">
                <div class="col">
                  <p class="font-sans-serif lh-1 mb-1 fs-8">@if (getEntreprises()->where('type', "entreprise")->count()<9 ) 0{{getEntreprises()->where('type', "entreprise")->count()}}   @else {{getEntreprises()->where('type', "entreprise")->count()}} @endif</p>
                </div>
                <div class="col-auto ps-0">

                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card h-md-100 ecommerce-card-min-width">
            <div class="card-header pb-0">
              <h6 class="mb-0 mt-2 d-flex align-items-center fs-1">Cabinets Comptables<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-end">
              <div class="row">
                <div class="col">
                  <p class="font-sans-serif lh-1 mb-1 fs-8">@if (getEntreprises()->where('type', "cabinet")->count()<9 ) 0{{getEntreprises()->where('type', "cabinet")->count()}}   @else {{getEntreprises()->where('type', "cabinet")->count()}} @endif</p>
                </div>
                <div class="col-auto ps-0">

                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="col-md-6 col-xxl-3">
        <div class="card h-md-100 ecommerce-card-min-width">
            <div class="card-header pb-0">
              <h6 class="mb-0 mt-2 d-flex align-items-center fs-1">Utilisateurs<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
            </div>
            <div class="card-body d-flex flex-column justify-content-end">
              <div class="row">
                <div class="col">
                  <p class="font-sans-serif lh-1 mb-1 fs-8">@if (getUsers()->count()<9 ) 0{{getUsers()->count()}}   @else {{getUsers()->count()}} @endif</p>
                </div>
                <div class="col-auto ps-0">

                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
  <div class="row g-0">
    <div class="col-lg-6  mb-3">
        <div class="card h-100" id="table" data-list="{&quot;valueNames&quot;:[&quot;path&quot;,&quot;views&quot;,&quot;time&quot;,&quot;exitRate&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true,&quot;fallback&quot;:&quot;pages-table-fallback&quot;}">
          <div class="card-header">
            <div class="row flex-between-center">
              <div class="col-auto col-sm-6 col-lg-7">
                <h6 class="mb-0 text-nowrap py-2 py-xl-0">Liste des commandes récentes</h6>
              </div>
              <div class="col-auto col-sm-6 col-lg-5">
                <div class="h-100">
                  <form>
                    <div class="input-group">
                      <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Search for a page" aria-label="search">
                      <div class="input-group-text bg-transparent"><svg class="svg-inline--fa fa-search fa-w-16 fs--1 text-600" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg><!-- <span class="fa fa-search fs--1 text-600"></span> Font Awesome fontawesome.com --></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 py-0">
            <div class="table-responsive scrollbar">
              {{-- <table class="table fs--1 mb-0 overflow-hidden">
                <thead class="bg-200 text-900">
                  <tr>
                    <th class="sort pe-1 align-middle white-space-nowrap" data-sort="path">Entreprises</th>
                    <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="views">Abonnements</th>
                    <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="time">Montant</th>
                    <th class="sort pe-card align-middle white-space-nowrap text-end" data-sort="exitRate">Date</th>
                  </tr>
                </thead>
                <tbody class="list"><tr class="btn-reveal-trigger">
                    <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">/sparrow/landing-page</a></td>
                    <td class="align-middle white-space-nowrap views text-end">1455</td>
                    <td class="align-middle white-space-nowrap time text-end">2m:25s</td>
                    <td class="align-middle text-end exitRate text-end pe-card">20.4%</td>
                  </tr><tr class="btn-reveal-trigger">
                    <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">/falcon/pages/starter.html</a></td>
                    <td class="align-middle white-space-nowrap views text-end">1422</td>
                    <td class="align-middle white-space-nowrap time text-end">2m:14s</td>
                    <td class="align-middle text-end exitRate text-end pe-card">52.4%</td>
                  </tr><tr class="btn-reveal-trigger">
                    <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">/pages/falcon-webapp-theme</a></td>
                    <td class="align-middle white-space-nowrap views text-end">1378</td>
                    <td class="align-middle white-space-nowrap time text-end">2m:23s</td>
                    <td class="align-middle text-end exitRate text-end pe-card">25.1%</td>
                  </tr><tr class="btn-reveal-trigger">
                    <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">/product/sparrow-bootstrap-theme</a></td>
                    <td class="align-middle white-space-nowrap views text-end">1144</td>
                    <td class="align-middle white-space-nowrap time text-end">2m:2s</td>
                    <td class="align-middle text-end exitRate text-end pe-card">6.3%</td>
                  </tr><tr class="btn-reveal-trigger">
                    <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">/themes/falcon/components</a></td>
                    <td class="align-middle white-space-nowrap views text-end">11047</td>
                    <td class="align-middle white-space-nowrap time text-end">1m:16s</td>
                    <td class="align-middle text-end exitRate text-end pe-card">49.3%</td>
                  </tr><tr class="btn-reveal-trigger">
                    <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">/themewagon.com/themes/free-website-template</a></td>
                    <td class="align-middle white-space-nowrap views text-end">1007</td>
                    <td class="align-middle white-space-nowrap time text-end">0m:34s</td>
                    <td class="align-middle text-end exitRate text-end pe-card">35.9%</td>
                  </tr><tr class="btn-reveal-trigger">
                    <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">/mailbluster.com/about</a></td>
                    <td class="align-middle white-space-nowrap views text-end">997</td>
                    <td class="align-middle white-space-nowrap time text-end">1m:5s</td>
                    <td class="align-middle text-end exitRate text-end pe-card">87.3%</td>
                  </tr><tr class="btn-reveal-trigger">
                    <td class="align-middle white-space-nowrap path"><a class="text-primary fw-semi-bold" href="#!">/technext.it/services</a></td>
                    <td class="align-middle white-space-nowrap views text-end">983</td>
                    <td class="align-middle white-space-nowrap time text-end">1m:16s</td>
                    <td class="align-middle text-end exitRate text-end pe-card">74.3%</td>
                  </tr></tbody>
              </table> --}}
            </div>
            <div class="text-center d-none" id="pages-table-fallback">
              <p class="fw-bold fs-1 mt-3">No Page found</p>
            </div>
          </div>
          <div class="card-footer">
            <div class="row align-items-center">
              <div class="pagination d-none"><li class="active"><button class="page" type="button" data-i="1" data-page="8">1</button></li><li><button class="page" type="button" data-i="2" data-page="8">2</button></li></div>
              <div class="col">
                <p class="mb-0 fs--1"><span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info">1 to 8 of 13</span></p>
              </div>
              <div class="col-auto d-flex">
                <button class="btn btn-sm btn-primary disabled" type="button" data-list-pagination="prev" disabled=""><span>Previous</span></button>
                <button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-lg-6 ps-lg-2 mb-3">
      <div class="card h-lg-100">
        <div class="card-header">
          <div class="row flex-between-center">
            <div class="col-auto">
              <h6 class="mb-0">Diagramme de l'évolution des paiements au cours de l'année</h6>
            </div>
            <div class="col-auto d-flex">
              <select class="form-select form-select-sm select-month me-2">
                <option value="0">January</option>
                <option value="1">February</option>
                <option value="2">March</option>
                <option value="3">April</option>
                <option value="4">May</option>
                <option value="5">Jun</option>
                <option value="6">July</option>
                <option value="7">August</option>
                <option value="8">September</option>
                <option value="9">October</option>
                <option value="10">November</option>
                <option value="11">December</option>
              </select>
              <div class="dropdown font-sans-serif btn-reveal-trigger">
                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-total-sales" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-total-sales"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body h-100 pe-0">
          <!-- Find the JS file for the following chart at: src\js\charts\echarts\total-sales.js-->
          <!-- If you are not using gulp based workflow, you can find the transpiled code at: public\assets\js\theme.js-->
          <div class="echart-line-total-sales h-100" data-echart-responsive="true"></div>
        </div>
      </div>
    </div>
  </div>
  {{-- <div class="row g-0">
    <div class="col-lg-6 col-xl-7 col-xxl-8 mb-3 pe-lg-2 mb-3">
      <div class="card h-lg-100">
        <div class="card-body d-flex align-items-center">
          <div class="w-100">
            <h6 class="mb-3 text-800">Utilisations du stockage de la plateforme <strong class="text-dark">1775.06 MB </strong>of 2 GB</h6>
            <div class="progress mb-3 rounded-3" style="height: 10px;">
              <div class="progress-bar bg-progress-gradient border-end border-white border-2" role="progressbar" style="width: 43.72%" aria-valuenow="43.72" aria-valuemin="0" aria-valuemax="100"></div>
              <div class="progress-bar bg-info border-end border-white border-2" role="progressbar" style="width: 18.76%" aria-valuenow="18.76" aria-valuemin="0" aria-valuemax="100"></div>
              <div class="progress-bar bg-success border-end border-white border-2" role="progressbar" style="width: 9.38%" aria-valuenow="9.38" aria-valuemin="0" aria-valuemax="100"></div>
              <div class="progress-bar bg-200" role="progressbar" style="width: 28.14%" aria-valuenow="28.14" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="row fs--1 fw-semi-bold text-500 g-0">
              <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-primary"></span><span>Regular</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(895MB)</span></div>
              <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-info"></span><span>System</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(379MB)</span></div>
              <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-success"></span><span>Shared</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(192MB)</span></div>
              <div class="col-auto d-flex align-items-center"><span class="dot bg-200"></span><span>Free</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(576MB)</span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-xl-5 col-xxl-4 mb-3 ps-lg-2">
      <div class="card h-lg-100">
        <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
          <h5 class="text-warning">Running out of your space?</h5>
          <p class="fs--1 mb-0">Your storage will be running out soon. Get more space and powerful productivity features.</p><a class="btn btn-link fs--1 text-warning mt-lg-3 ps-0" href="#!">Upgrade storage<span class="fas fa-chevron-right ms-1" data-fa-transform="shrink-4 down-1"></span></a>
        </div>
      </div>
    </div>
  </div> --}}

@endsection
