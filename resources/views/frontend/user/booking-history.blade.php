@extends('layouts.guest')
@section('title', 'Booking History')

@section('content')
<section id="about_section" class="about_section content_section" style="padding: 40px 0;">
    <div class="about_section_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>Booking History</h4>
                    </div>
                    <div class="section_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Guest</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Booking History</a></li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <div class="card profile-card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <div class="header-title">
                                        <h4>Previous Booking History</h4>
                                        <div class="profile-buttons">
                                            <a href="{{ url('/') }}" class="btn btn-outline-primary">
                                                <i data-feather="chevron-left"></i>
                                                <span>Back To Home</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">                                
                                <livewire:frontend.booking.index />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
