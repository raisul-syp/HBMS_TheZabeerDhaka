@extends('layouts.guest')
@foreach ($pages as $page)
@if ($page->name == 'About Us')
@section('title', "$page->meta_title")
@section('meta_decription', "$page->meta_decription")
@section('meta_keyword', "$page->meta_keyword")
@endif
@endforeach

@section('content')
<section id="about_section" class="about_section content_section" style="padding: 40px 0;">
    <div class="about_section_inner">
        <div class="container">
            @foreach ($pages as $page)
            @if ($page->name == 'About Us')
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h4>{{ $page->name }}</h4>
                    </div>
                    <div class="section_breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $page->name }}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="image_box">
                        <div class="card">
                            <div class="card-body">
                                <div class="image">
                                    <img src="{{ asset('frontend/images/pages/'.$page->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-0 mb-lg-0">
                    <div class="content_box">
                        <div class="card">
                            <div class="card-body">
                                <div class="content">
                                    <h2>"{{ $page->title }}"</h2>
                                    <h4><span class="decor-1"></span> {{ $page->sub_title }}</h4>
                                    {!! html_entity_decode($page->long_description) !!}
                                    <a href="{{ url('/rooms') }}" class="btn btn-primary btn-read">
                                        <span>Book A Room</span>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
