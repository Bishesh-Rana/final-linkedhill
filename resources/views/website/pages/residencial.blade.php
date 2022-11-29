@extends('website.layouts.app')
 @section('meta')
     {{-- @include('website.shared.meta') --}}
 @endsection
 @section('content')
 <section id="property_character_list">
     <div class="container">
         <div class="row">
             <div class="col-lg-6">
                <div class="character_list_title">
                 <h1>List of Residencial Property</h1>
                 <p>Find different Accommodation/Property </p>
                </div>
             </div>
         </div>
     </div>
     <div class="property_worth_wrapper">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <h2>Know your property’s worth in today’s market. <span>Ask the team today.</span></h2>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="row">
             @foreach ($data as $pro)

             <div class="col-lg-4">
                <div class="new_gallery_box">
                    <a href="">
                        <div class="new_gallery_thumbnail">
                            <div class="new_gallery_images">
                               <a href="{{ route('property.detail', ['id' => $pro->id, 'slug' => $pro->slug]) }}"> <img src="{{ optional($pro->images->first())->name }}" alt=""></a>
                            </div>
                            <div class="new_gallery_content">
                                <h3>{{ $pro['title'] }}</h3>
                                <span>{{ $pro['property_address'] }}</span>
                                <span>{{ $pro->total_area . ' ' . $pro->area_unit->name }}</span>
                                <p><span>Rs.{{ $pro['start_price'] }}</p>
                                <span>Property facing {{ $pro['property_facing'] }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
             @endforeach
         </div>
     </div>
 </section>
 @endsection

