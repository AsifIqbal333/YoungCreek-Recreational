 @props(['title', 'image' => asset('theme/images/page-title/page-title-8.jpg'), 'items'])
 <div class="page-title relative">
     <div class="paralaximg" data-parallax="scroll" data-image-src="{{ $image }}">
     </div>
     <div class="content">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <h3 class="title">{{ $title }}</h3>
                     <ul class="breadcrumb">
                         <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                         @foreach ($items as $item)
                             <li><a href="{{ $item['href'] }}">{{ $item['title'] }}</a></li>
                         @endforeach
                         <li>{{ $title }}</li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </div>
