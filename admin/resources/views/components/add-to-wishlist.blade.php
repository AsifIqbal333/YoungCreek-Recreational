 @props(['productId'])

 <form action="{{ route('wish-list.store') }}" method="post">
     @csrf
     <input type="hidden" name="product_id" value="{{ $productId }}">
     <button type="submit" {{ $attributes->merge(['class' => 'box-icon wishlist btn-icon-action']) }}>
         <span class="icon icon-heart"></span>
         <span class="tooltip">Wishlist</span>
     </button>
 </form>
