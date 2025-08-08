 <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
     <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
     <div class="mb-canvas-content">
         <div class="mb-body">
             <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                 @foreach (menues() as $menu)
                     @if ($menu['title'] === 'Products')
                         <li class="nav-mb-item">
                             <a href="#dropdown-menu-two" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                                 aria-expanded="true" aria-controls="dropdown-menu-two">
                                 <span>{{ $menu['title'] }}</span>
                                 <span class="btn-open-sub"></span>
                             </a>
                             <div id="dropdown-menu-two" class="collapse">
                                 <ul class="sub-nav-menu">
                                     @foreach ($menu['items'] as $category)
                                         @php
                                             $menuId = str($category['title'])->slug();
                                         @endphp
                                         <li>
                                             <a href="#{{ $menuId }}" class="sub-nav-link collapsed"
                                                 data-bs-toggle="collapse" aria-expanded="true"
                                                 aria-controls="{{ $menuId }}">
                                                 <span>{{ $category['title'] }}</span>
                                                 <span class="btn-open-sub"></span>
                                             </a>
                                             <div id="{{ $menuId }}" class="collapse">
                                                 <ul class="sub-nav-menu sub-menu-level-2">
                                                     @foreach ($category['items'] as $item)
                                                         <li><a href="{{ route('products.index', ['type' => $category['type'], 'category' => $item['category']]) }}"
                                                                 class="sub-nav-link">{{ $item['title'] }}</a>
                                                         </li>
                                                     @endforeach

                                                 </ul>
                                             </div>
                                         </li>
                                     @endforeach
                             </div>
                         </li>
                     @else
                         @php
                             $menuId = str($menu['title'])->slug();
                         @endphp
                         <li class="nav-mb-item">
                             <a href="#{{ $menuId }}" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                                 aria-expanded="true" aria-controls="{{ $menuId }}">
                                 <span>{{ $menu['title'] }}</span>
                                 <span class="btn-open-sub"></span>
                             </a>
                             <div id="{{ $menuId }}" class="collapse">
                                 <ul class="sub-nav-menu">
                                     @foreach ($menu['items'] as $item)
                                         <li><a href="{{ $item['href'] }}"
                                                 class="sub-nav-link">{{ $item['title'] }}</a>
                                         </li>
                                     @endforeach
                                 </ul>
                             </div>
                         </li>
                     @endif
                 @endforeach


             </ul>
             <div class="mb-other-content">
                 <div class="group-icon">
                     <a href="{{ route('wish-list.index') }}" class="site-nav-icon">
                         <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987V4.60987Z"
                                 stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                         </svg>
                         Wishlist
                     </a>
                     <a href="javascript:void(0)" class="site-nav-icon">
                         <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                                 stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                             <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" />
                         </svg>
                         Search
                     </a>
                     <a href="{{ route('my-account.index') }}" class="site-nav-icon">
                         <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21"
                                 stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                             <path
                                 d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                                 stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                         </svg>
                         Login
                     </a>

                 </div>
                 <div class="mb-notice">
                     <a href="contact.html" class="text-need">Need help ?</a>
                 </div>
                 <ul class="mb-info">
                     <li>Address: 1234 Fashion Street, Suite 567, <br> New York, NY 10001</li>
                     <li>Email: <b>example@example.com</b></li>
                     <li>Phone: <b>(212) 555-1234</b></li>
                 </ul>
             </div>
         </div>
         <div class="mb-bottom">
             <div class="bottom-bar-language">
                 <div class="tf-currencies">
                     <select class="image-select center style-default type-currencies">
                         <option selected data-thumbnail="{{ asset('theme/images/country/us.svg') }}">USD</option>
                         {{-- <option data-thumbnail="images/country/vn.svg">VND</option> --}}
                     </select>
                 </div>
                 <div class="tf-languages">
                     <select class="image-select center style-default type-languages">
                         <option>English</option>
                         {{-- <option>Vietnam</option> --}}
                     </select>
                 </div>
             </div>
         </div>
     </div>
 </div>
