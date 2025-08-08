 @props(['product'])

 @php
     $firstImage = product_image($product->category, $product->images->first()?->image, 300);
     $secondImage = product_image($product->category, $product->images->skip(1)->first()?->image, 300);
     $originalPrice = $product->price;
     $upPrice = $originalPrice + $originalPrice * (discount_percentage() / 100); // 10% higher
     $viewLink = route('products.show', ['type' => $product->type, 'slug' => $product->slug]);
 @endphp

 <div class="card-product style-1">
     <div class="card-product-wrapper">
         <a href="product-detail.html" class="image-wrap">
             <img class="lazyload img-product" data-src="{{ $firstImage }}" src="{{ $firstImage }}" alt="image-product">
             <img class="lazyload img-hover" data-src="{{ $secondImage }}" src="{{ $secondImage }}" alt="image-product">
         </a>
         <div class="list-product-btn">
             <x-add-to-wishlist :productId="$product->id" />

             <a href="#quickView{{ $product->id }}" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                 <span class="icon icon-eye"></span>
                 <span class="tooltip">Quick View</span>
             </a>
         </div>
         <div class="list-btn-main">
             <a href="{{ $viewLink }}" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
         </div>
     </div>
     <div class="card-product-info ">
         <a href="{{ $viewLink }}" class="title link line-clamp-1">{[$product->name]}</a>
         <div class="price text-body-default "><span
                 class="text-caption-1 old-price">${{ $upPrice }}</span>${{ $originalPrice }}</div>
     </div>
 </div>
