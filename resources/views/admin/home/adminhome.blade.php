@extends('admin.master')


@section('body')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white">{{ $totalCategory }}</h1>
                    <h6 class="text-white">All Category</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white">{{ $publishCategory }}</h1>
                    <h6 class="text-white">Publish Category</h6>
                </div>
            </div>
        </div>
         <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white">{{ $totalBrand }}</h1>
                    <h6 class="text-white">Total Brand</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">{{ $publishBrand }}</h1>
                    <h6 class="text-white">Publish Brand</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">{{ $totalUser }}</h1>
                    <h6 class="text-white">Total User</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">{{ $totalProduct }}</h1>
                    <h6 class="text-white">Total Product</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">{{ $publishProduct }}</h1>
                    <h6 class="text-white">Publish Product</h6>
                </div>
            </div>
        </div>
         <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white">{{ $totalOrder }}</h1>
                    <h6 class="text-white"> Total Order </h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                    <h6 class="text-white">Calnedar</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white">{{ $totalAdmin }}</h1>
                    <h6 class="text-white">Admin</h6>
                </div>
            </div>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">{{ $totalProduct }}</h1>
                    <h6 class="text-white">Total Product</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">{{ $totalProduct }}</h1>
                    <h6 class="text-white">Total Product</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white">{{ $totalProduct }}</h1>
                    <h6 class="text-white">Total Product</h6>
                </div>
            </div>
        </div>
         <!-- Column -->

    </div>
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Recent comment and chats -->
    <!-- ============================================================== -->
</div>
@endsection
