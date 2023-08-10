@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div id="gallery">
                    <div class="box bg-transparent no-shadow b-0">
                        <div class="box-body text-center p-0">
                            <div class="btn-group">
                       <h4> The <span>{{$product->name }}</span> Product Gallery</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Default box -->
                    <div class="box bg-transparent no-shadow b-0">
                        <div class="box-body">
                            <div id="gallery-content">
                                <div id="gallery-content-center">
                                    @isset($gallery)
                                    @forelse ($gallery as $item)
                                    <a href="javascript:void(0)"  data-toggle="lightbox"
                                        data-gallery="multiimages" data-title="Image title will be apear here"><img
                                            src="{{ asset("storage/$item->image") }}" alt="gallery" class="all studio" /> </a>
                                    @empty
                                    No Images Found!
                                    @endforelse
                                    @endisset



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
        </div>
    </div>
@endsection
