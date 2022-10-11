@extends('layouts.admin.admin')

@section('styles')
@include('layouts.admin.required.extensions.styles.datatable')
@endsection

@section('content')


  <div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor">{{$PageName??""}}</h5>
        </div>
      </div>
    </div>
    <div class="card-body bg-light">
        @include('admin.parametres.index')
          <div class="tab-content border-x border-bottom p-3" id="myTabContent">

            <div class="tab-pane fade show active" id="tab-website" role="tabpanel" aria-labelledby="website-tab">
                <div class="row g-0">
                    <div class="col-lg-12 pe-lg-2">
                      <div class="card mb-3">

                        <div class="card-body col-md-12 row">
                           <form action="{{route('admin.website.update')}}" class="row g-3 needs-validation" novalidate="" method="POST" enctype="multipart/form-data"> @csrf
                            <div class="col-md-6">
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="debut">Mot début</label>
                                        <input class="form-control" value="{{$Website->debut}}" name="debut" id="debut" type="text"  />
                                    </div>

                                    <div class="col-md-4-12">
                                        <label class="form-label" for="complement">Complément</label>
                                        <input class="form-control" value="{{$Website->complement}}" name="complement" id="complement" type="text"  />
                                    </div>
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="btn1">Nom boutton</label>
                                        <input class="form-control" value="{{$Website->btn1}}" name="btn1" id="btn1" type="text"  />
                                    </div>
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="link1">Lien du boutton</label>
                                        <input class="form-control" value="{{$Website->link1}}" name="link1" id="link1" type="text"  />
                                    </div>

                            </div>

                            <div class="col-md-6">
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea name="description"  class="form-control" id="" cols="30" rows="5">{{$Website->description}}</textarea>
                                    </div>


                                    <div class="col-md-4-12">
                                        <label class="form-label" for="image1">Image</label>
                                        <input class="form-control" name="image1" id="image1" type="file"  />
                                    </div>

                            </div>
                            <br>
                            <hr>

                            <div class="col-md-6">
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="packIntro">Package texte intro</label>
                                        <input class="form-control" name="packIntro" value="{{$Website->packIntro}}" id="packIntro" type="text"  />
                                    </div>

                                    <div class="col-md-4-12">
                                        <label class="form-label" for="packText">Package texte description</label>
                                        <input class="form-control" name="packText" value="{{$Website->packText}}" id="packText" type="text"  />
                                    </div>
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="serviceIntro">Service text intro</label>
                                        <input class="form-control" name="serviceIntro" value="{{$Website->serviceIntro}}" id="serviceIntro" type="text"  />
                                    </div>
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="serviceText">Service texte image </label>
                                        <input class="form-control" name="serviceText" id="serviceText" type="text"  />
                                    </div>

                            </div>

                            <div class="col-md-6">
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="content2">Description</label>
                                        <input class="form-control" value="{{$Website->content2}}" name="content2" id="content2" type="text"  />
                                    </div>
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="btn4">Nom boutton</label>
                                        <input class="form-control" value="{{$Website->btn4}}" name="btn4" id="btn4" type="text"  />
                                    </div>
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="link4">Lien du boutton</label>
                                        <input class="form-control" value="{{$Website->link4}}" name="link4" id="link4" type="text"  />
                                    </div>



                                    <div class="col-md-4-12">
                                        <label class="form-label" for="image4">Image4</label>
                                        <input class="form-control" name="image4" id="image4" type="file"  />
                                    </div>

                            </div>
                            <br>
                            <hr>



                            <div class="col-md-6">
                                <div class="col-md-4-12">
                                    <label class="form-label" for="content2">Description</label>
                                    <input class="form-control" value="{{$Website->content2}}" name="content2" id="content2" type="text"  />
                                </div>
                                <div class="col-md-4-12">
                                    <label class="form-label" for="btn2">Nom boutton</label>
                                    <input class="form-control" value="{{$Website->btn2}}" name="btn2" id="btn2" type="text"  />
                                </div>
                                <div class="col-md-4-12">
                                    <label class="form-label" for="link2">Lien du boutton</label>
                                    <input class="form-control"  value="{{$Website->link2}}" name="link2" id="link2" type="text"  />
                                </div>



                                <div class="col-md-4-12">
                                    <label class="form-label" for="image2">Image4</label>
                                    <input class="form-control" name="image2" id="image2" type="file"  />
                                </div>

                            </div>

                            <div class="col-md-6">
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="content3">Description</label>
                                        <input class="form-control" value="{{$Website->content3}}" name="content3" id="content3" type="text"  />
                                    </div>
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="btn3">Nom boutton</label>
                                        <input class="form-control" value="{{$Website->btn3}}" name="btn3" id="btn3" type="text"  />
                                    </div>
                                    <div class="col-md-4-12">
                                        <label class="form-label" for="link3">Lien du boutton</label>
                                        <input class="form-control" value="{{$Website->link3}}" name="link3" id="link3" type="text"  />
                                    </div>



                                    <div class="col-md-4-12">
                                        <label class="form-label" for="image3">Image4</label>
                                        <input class="form-control" name="image3" id="image3" type="file"  />
                                    </div>

                            </div>




                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Mettre a jour</button>
                            </div>
                        </form>

                        </div>
                      </div>


                    </div>

                  </div>
            </div>
          </div>

    </div>
  </div>

</div>

@endsection

@section('scripts')
@include('layouts.admin.required.extensions.js.datatable')
@endsection
