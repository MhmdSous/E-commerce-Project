@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-xl-3 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div class="icon bg-primary-light rounded w-60 h-60">
                              <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">New Customers</p>
                              <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div class="icon bg-warning-light rounded w-60 h-60">
                              <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Sold Cars</p>
                              <h3 class="text-white mb-0 font-weight-500">3400 <small class="text-success"><i class="fa fa-caret-up"></i> +2.5%</small></h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div class="icon bg-info-light rounded w-60 h-60">
                              <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Sales Lost</p>
                              <h3 class="text-white mb-0 font-weight-500">$1,250 <small class="text-danger"><i class="fa fa-caret-down"></i> -0.5%</small></h3>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-6">
                  <div class="box overflow-hidden pull-up">
                      <div class="box-body">
                          <div class="icon bg-danger-light rounded w-60 h-60">
                              <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                          </div>
                          <div>
                              <p class="text-mute mt-20 mb-0 font-size-16">Inbound Call</p>
                              <h3 class="text-white mb-0 font-weight-500">1,460 <small class="text-danger"><i class="fa fa-caret-up"></i> -1.5%</small></h3>
                          </div>
                      </div>
                  </div>
              </div>


              </div>




              <div class="col-12">
                  <div class="box">
                      <div class="box-header">
                          <h4 class="box-title align-items-start flex-column">
                              New Arrivals
                              <small class="subtitle">More than 400+ new members</small>
                          </h4>
                      </div>
                      <div class="box-body">
                          <div class="table-responsive">
                              <table class="table no-border">
                                  <thead>
                                      <tr class="text-uppercase bg-lightest">
                                          <th style="min-width: 250px"><span class="text-white">products</span></th>
                                          <th style="min-width: 100px"><span class="text-fade">pruce</span></th>
                                          <th style="min-width: 100px"><span class="text-fade">deposit</span></th>
                                          <th style="min-width: 150px"><span class="text-fade">agent</span></th>
                                          <th style="min-width: 130px"><span class="text-fade">status</span></th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($orders as $prod )


                                      <tr>
                                          <td class="pl-0 py-8">
                                              <div class="d-flex align-items-center">
                                                  <div class="flex-shrink-0 mr-20">
                                                      <div class="bg-img h-50 w-50" style="background-image: url(../images/gallery/creative/img-1.jpg)"></div>
                                                  </div>

                                                  <div>
                                                      <a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16"> Alise Product</a>
                                                      <span class="text-fade d-block">Pharetra, Nulla , Nec, Aliquet</span>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <span class="text-fade font-weight-600 d-block font-size-16">
                                                  Paid
                                              </span>
                                              <span class="text-white font-weight-600 d-block font-size-16">
                                                 ${{ $prod->grand_total }}
                                              </span>
                                          </td>
                                          <td>
                                              <span class="text-fade font-weight-600 d-block font-size-16">
                                                  Paid
                                              </span>
                                              <span class="text-white font-weight-600 d-block font-size-16">
                                                ${{ $prod->grand_total }}
                                              </span>
                                          </td>
                                          <td>
                                              <span class="text-fade font-weight-600 d-block font-size-16">
                                                {{ $prod->last_name }}
                                              </span>
                                              <span class="text-white font-weight-600 d-block font-size-16">
                                                {{ $prod->first_name }}
                                              </span>
                                          </td>
                                          <td>
                                              <span class="badge badge-primary-light badge-lg">{{ $prod->status }}</span>
                                          </td>

                                      </tr>

                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
</div>
@endsection
